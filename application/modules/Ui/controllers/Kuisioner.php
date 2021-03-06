<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kuisioner extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		// $this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='kuisioner';
	private $id='kuisioner_id';
	//private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Kuisioner',
			'menu'=>'kuisioner',
			'submenu'=>false,
			'headline'=>'responder kuisioner',
			'url'=>'Ui/Kuisioner',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>false,
				'edit'=>false,
				'detail'=>false,
				'hapus'=>false,
				'cetak'=>false,
				'url'=>'Ui/Kuisioner',
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
		frontend($data); //LOAD HELPER BACKEND
	}
	public function tabel(){
		// $q=[
		// 	'select'=>'a.*,b.level_nama',
		// 	'tabel'=>'user a',
		// 	'join'=>[['tabel'=>'level b','ON'=>'a.user_level=b.level_id','jenis'=>'INNER']]
		// ];
		$q=[
			'select'=>'a.*,b.*',
			'tabel'=>'kuisioner a',
			'join'=>[['tabel'=>'kategori b','ON'=>'a.kuisioner_kategoriid=b.kategori_id','jenis'=>'INNER']]
		];
		$d=$this->Mdb->join($q)->result();
		$kuisioner=[];
		$nilai=0;
		foreach ($d as $index => $row) {
			$kuisioner[$index]=$row;
			$nilai	+=$row->kuisioner_j1;		
			$nilai	+=$row->kuisioner_j2;
			$nilai	+=$row->kuisioner_j3;
			$nilai	+=$row->kuisioner_j4;
			$nilai	+=$row->kuisioner_j5;
			$nilai	+=$row->kuisioner_j6;
			$nilai	+=$row->kuisioner_j7;
			$nilai	+=$row->kuisioner_j8;
			$nilai	+=$row->kuisioner_j9;
			$nilai	+=$row->kuisioner_j10;
			$nilai	+=$row->kuisioner_j11;
			$nilai	+=$row->kuisioner_j12;
			$nilai	+=$row->kuisioner_j13;
			$nilai	+=$row->kuisioner_j14;
			$nilai	+=$row->kuisioner_j15;
			$nilai	+=$row->kuisioner_j16;
			$nilai	+=$row->kuisioner_j17;
			$kuisioner[$index]->nilai=$nilai;
			
			if($nilai==0 || $nilai <= 6){
				$status="Risiko Rendah Paparan Covid-19";
				$warna='bg-success';
			}elseif($nilai==7 || $nilai <= 13){
				$status="Risiko Sedang Paparan Covid-19";
				$warna='bg-warning';
			}elseif($nilai>=14){
				$status="Risiko Tinggi Paparan Covid-19";
				$warna='bg-danger';
			}else{
				$status="unkown";
				$warna='bg-secondary';
			}
			$kuisioner[$index]->status=$status;
			$kuisioner[$index]->warna=$warna;
			$nilai=0; //RESET
		}		
		$data=[
			'data'=>$kuisioner,
			'setting'=>$this->setting(),
		];
		$this->load->view('tabel',$data);
	}
	public function add(){
		if($this->input->post('kuisioner_nama')){
			$data=[
				'kuisioner_nama'=>$this->input->post('kuisioner_nama'),
				'kuisioner_unitkerja'=>$this->input->post('kuisioner_unitkerja'),
				'kuisioner_departemenid'=>$this->input->post('kuisioner_departemen'),
				'kuisioner_alamatdomisili'=>$this->input->post('kuisioner_alamatdomisili'),
				'kuisioner_kategoriid'=>$this->input->post('kuisioner_kategoriid'),
			];
			for ($i=1; $i < 17; $i++) { 
				$data['kuisioner_j'.$i]=$this->input->post('j'.$i);
			}
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
			];
			$r=$this->Mdb->insert($q);
			$dt=toastsimpan($r,$data['kuisioner_nama']);
			return $this->output->set_output(json_encode($dt));
		}
		$departemen=[
			'tabel'=>'departemen',
		];		
		$kategori=[
			'tabel'=>'kategori',
			'where'=>[['kategori_status'=>1]],
		];
		$q=[
			'tabel'=>'pertanyaan',
		];
		$data=[
			'data'=>$this->Mdb->read($q)->result(),
			'departemen'=>$this->Mdb->read($departemen)->result(),
			'kategori'=>$this->Mdb->read($kategori)->row(),
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view('add',$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('user_nama')){
			$data=[
				'user_nama'=>$this->input->post('user_nama'),
				'user_username'=>$this->input->post('user_username'),
				'user_email'=>$this->input->post('user_email'),
				'user_level'=>$this->input->post('user_level'),
				'user_dashboard'=>$this->input->post('user_dashboard'),
				'user_status'=>$this->input->post('user_status')
			];
			if($this->input->post('user_password')) $data['user_password']=md5($this->input->post('user_password'));
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($r){
				$data=toastupdate('success','User');
			}else{
				$data=toastupdate('error','User');
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
			'level'=>$this->Mdb->read($level)->result(),
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
			$data=toasthapus('success','User');
		}else{
			$data=toasthapus('error','User');
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
