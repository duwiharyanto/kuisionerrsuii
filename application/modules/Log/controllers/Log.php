<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));

		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='log';
	private $id='log_id';
	public function setting(){
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'log',
			'submenu'=>false,
			'headline'=>'data log sistem',
			'url'=>'Log',  //CASE SENSITIVE
			'aksi'=>[
				'add'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'url'=>'Log',
			],
		];
		return $setting;
	}
	public function index()
	{
		$data=[
			'konten'=>$this->load->view('Index',$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level),
		];
		backend($data);
	}
	public function tabel(){
		$q=[
			'tabel'=>'log a',
			'select'=>'a.*,b.user_nama',
			'join'=>[['tabel'=>'user b','ON'=>'a.log_iduser=b.user_id','jenis'=>'INNER']],
			'order'=>['kolom'=>'created_at','orderby'=>'DESC'],
		];
		$data=[
			'data'=>$this->Mdb->join($q)->result(),
			'setting'=>$this->setting(),
		];
		$this->load->view('tabel',$data);

	}
	public function add(){
		if($this->input->post('log_iduser')){
			$data=[
				'log_iduser'=>$this->input->post('log_iduser'),
				'log_aksi'=>$this->input->post('log_aksi')
			];
			return $this->output->set_output(json_encode($data));
		}
		$data=[
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view('add',$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('log_aksi')){
			$data=[
				'log_aksi'=>$this->input->post('log_aksi'),
			];
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$data,
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($r){
				$data=toastupdate('success','Log');
			}else{
				$data=toastupdate('error','Log');
			}
			return $this->output->set_output(json_encode($data));
		}
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[[$this->id=>$id]],
		];
		$result=$this->Mdb->read($q)->row();
		$data=[
			'setting'=>$this->setting(),
			'headline'=>'edit data',
			'data'=>$result,
		];
		$this->load->view('edit',$data);
	}
	public function hapus(){
		$id=$this->input->post('id');
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[$this->id=>$id]
		];
		$result=$this->Mdb->delete($q);
		if($result){
			$data=toasthapus('success','log');
		}else{
			$data=toasthapus('error','log');
		}
		$this->output->set_output(json_encode($data));
	}
	public function faker(){
		$faker=Faker\factory::create('id_ID');
		for ($i=0; $i < 20 ; $i++) {
			echo $faker->name.'<br>';
			echo $faker->date.'<br>';
		}
	}
	public function cetak(){
		$query=array(
			'select'=>'a.*, b.user_username',
			'tabel'=>'log a',
			'join'=>array(array('tabel'=>'user b','ON'=>'a.log_iduser=b.user_id','jenis'=>'INNER')),
			'order'=>array('kolom'=>'a.log_id','orderby'=>'DESC'),
		);
		$data=array(
			'setting'=>$this->setting(),
			'data'=>$this->Mdb->join($query)->result(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'),
		);
		$print=[
			'konten'=>$this->load->view('cetak',$data,TRUE), //VIEW HTML
		];
		$view=exportpdf($print);
		$cetak=[
			'judul'=>ucwords($data['setting']['headline']).'/'.date('d-m-Y'),
			'view'=>$view,
			'kertas'=>'A4',
		];
		$this->duwi->prosescetak($cetak);
	}
}
