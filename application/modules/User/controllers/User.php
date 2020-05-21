<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='user';
	private $id='user_id';
	//private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'setting',
			'submenu'=>'user',
			'headline'=>'user sistem',
			'url'=>'User',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>true,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'User',
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
		$q=[
			'select'=>'a.*,b.level_nama',
			'tabel'=>'user a',
			'join'=>[['tabel'=>'level b','ON'=>'a.user_level=b.level_id','jenis'=>'INNER']]
		];
		$data=[
			'data'=>$this->Mdb->join($q)->result(),
			'setting'=>$this->setting(),
		];
		$this->load->view('tabel',$data);
	}
	public function add(){
		$cek_user=[
			'tabel'=>$this->tabel,
			'where'=>[['user_username'=>$this->input->post('user_username')]]
		];
		if(!$this->Mdb->read($cek_user)->row()){
			if($this->input->post('user_nama')){
				$data=[
					'user_nama'=>$this->input->post('user_nama'),
					'user_username'=>$this->input->post('user_username'),
					'user_password'=>md5($this->input->post('user_password')),
					'user_email'=>$this->input->post('user_email'),
					'user_level'=>$this->input->post('user_level'),
					'user_dashboard'=>$this->input->post('user_dashboard'),
					'user_status'=>$this->input->post('user_status')
				];
				$q=[
					'tabel'=>$this->tabel,
					'data'=>$this->security->xss_clean($data),
				];
				$r=$this->Mdb->insert($q);
				$dt=toastsimpan($r,'user');
				return $this->output->set_output(json_encode($dt));
			}
		}else{
			$r=false;
			$dt=toastcekuser($r,'user');
			return $this->output->set_output(json_encode($dt));
		}
		$q=[
			'tabel'=>$this->tabel,
		];
		$level=[
			'tabel'=>'level',
		];
		$data=[
			'dump'=>$this->Mdb->read($q)->result(),
			'level'=>$this->Mdb->read($level)->result(),
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
