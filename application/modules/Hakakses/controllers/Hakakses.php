<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hakakses extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='menu';
	private $id='menu_id';
	//private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'setting',
			'submenu'=>'hak_akses',
			'headline'=>'Hak akses user',
			'url'=>'Hakakses',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>false,
				'cetak'=>false,
				'url'=>'Hakakses',
			],
		];
		return $setting;
	}
	public function index()
	{
		$data=[
			'konten'=>$this->load->view('Index',$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level), //LOAD BACKEND MENU
		];
		backend($data); //LOAD HELPER BACKEND
	}
	public function tabel(){
		// $q=[
		// 	'tabel'=>'log a',
		// 	'select'=>'a.*,b.user_nama',
		// 	'join'=>[['tabel'=>'user b','ON'=>'a.log_iduser=b.user_id','jenis'=>'INNER']],
		// 	'order'=>['kolom'=>'created_at','orderby'=>'DESC'],
		// ];
		$q=[
			'tabel'=>$this->tabel,
			'order'=>['kolom'=>'menu_label','orderby'=>'ASC'],
		];
		$data=[
			'data'=>$this->Mdb->read($q)->result(),
			'setting'=>$this->setting(),
		];
		$this->load->view('tabel',$data);
	}
	public function add(){
		if($this->input->post('level_nama')){
			$data=[
				'level_nama'=>$this->input->post('level_nama'),
				'level_dashboard'=>ucwords($this->input->post('level_dashboard')),
				'level_status'=>$this->input->post('level_status')
			];
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
			];
			$r=$this->Mdb->insert($q);
			$dt=toastsimpan($r,'level');
			return $this->output->set_output(json_encode($dt));
		}
		$q=[
			'tabel'=>$this->tabel,
		];
		$data=[
			'dump'=>$this->Mdb->read($q)->result(),
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view('add',$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('menu_label')){
			$data=[
				'menu_label'=>$this->input->post('menu_label'),
				'menu_link'=>ucwords($this->input->post('menu_link')),
				'menu_status'=>$this->input->post('menu_status'),
				'menu_akses_level'=>$this->input->post('menu_akses_level'),
				'menu_ikon'=>$this->input->post('menu_ikon'),
			];
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$data,
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($r){
				$data=toastupdate('success','Akses');
			}else{
				$data=toastupdate('error','Akses');
			}
			return $this->output->set_output(json_encode($data));
		}
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[[$this->id=>$id]],
		];
		$level=[
			'tabel'=>'level',
		];
		$result=$this->Mdb->read($q)->row();
		$data=[
			'setting'=>$this->setting(),
			'headline'=>'edit data',
			'data'=>$result,
			'level'=>$this->Mdb->read($level)->result(),
		];
		$this->load->view('edit',$data);
	}
	public function modalleveluser(){
		$level=[
			'tabel'=>'level',
		];
		$data=[
			'setting'=>$this->setting(),
			'headline'=>'edit data',
			'level'=>$this->Mdb->read($level)->result(),
		];
		$this->load->view('modalleveluser',$data);
	}
	public function hapus(){
		$id=$this->input->post('id');
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[$this->id=>$id]
		];
		$result=$this->Mdb->delete($q);
		if($result){
			$data=toasthapus('success','Akses');
		}else{
			$data=toasthapus('error','Akses');
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
}
