<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Level extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='level';
	private $id='level_id';
	//private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'setting',
			'submenu'=>'level',
			'headline'=>'level user',
			'url'=>'Level',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>true,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'Level',
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
		if($this->input->post('setting_namasistem')){
			$id=$this->input->post('id');
			$data=[
				'setting_namasistem'=>$this->input->post('setting_namasistem'),
				'setting_namapemilik'=>$this->input->post('setting_namapemilik'),
				'setting_namatempat'=>$this->input->post('setting_namatempat'),
				'setting_alamat'=>$this->input->post('setting_alamat'),
				'setting_email'=>$this->input->post('setting_email'),
				'setting_notlp'=>$this->input->post('setting_notlp'),
			];
			//UPLOAD FILE
			$file='setting_logo';
			if($_FILES[$file]['name']){
				if($this->duwi->gambarupload($this->path,$file)){
					$fileupload=$this->upload->data('file_name');
					$data[$file]=$fileupload;
				}else{
					$msg=$this->upload->display_errors();
					$dt=toastupload('error',$msg);
					return $this->output->set_output(json_encode($dt));
				}
			}
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($q){
				$dt=toastupdate('success','sistem');
			}else{
				$dt=toastupdate('error','sistem');
			}
			$this->output->set_output(json_encode($dt));
		}else{
			// $q=[
			// 	'tabel'=>'log a',
			// 	'select'=>'a.*,b.user_nama',
			// 	'join'=>[['tabel'=>'user b','ON'=>'a.log_iduser=b.user_id','jenis'=>'INNER']],
			// 	'order'=>['kolom'=>'created_at','orderby'=>'DESC'],
			// ];
			$q=[
				'tabel'=>'level'
			];
			$data=[
				'data'=>$this->Mdb->read($q)->result(),
				'setting'=>$this->setting(),
			];
			$this->load->view('tabel',$data);
		}
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
				'data'=>$data,
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
		if($this->input->post('level_nama')){
			$data=[
				'level_nama'=>$this->input->post('level_nama'),
				'level_dashboard'=>ucwords($this->input->post('level_dashboard')),
				'level_status'=>$this->input->post('level_status')
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
}
