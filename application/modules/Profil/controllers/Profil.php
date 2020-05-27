<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		$this->user_id=$this->session->userdata('user_id');
		// $this->duwi->cekadmin();
	}
	private $tabel='user';
	private $id='user_id';
	private $file_upload='user_foto';
	private $path='upload/sistem/foto/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'profil',
			'submenu'=>false,
			'headline'=>'profil user',
			'url'=>'Profil',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'Profil',
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
	private function hapus_file($id){
		$filename=$this->file_upload;
		$query=array(
			'tabel'=>$this->tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Mdb->read($query)->row();
		if(file_exists($this->path.$file->$filename)) unlink($this->path.$file->$filename);
	}
	public function tabel(){
		if($this->input->post('user_nama')){
			$id=$this->input->post('id');
			$data=[
				'user_nama'=>$this->input->post('user_nama'),
				'user_username'=>$this->input->post('user_username'),
				'user_email'=>$this->input->post('user_email'),
			];
			if($this->input->post('user_password')) $data['user_password']=md5($this->input->post('user_password'));
			//UPLOAD FILE
			$file='user_foto';
			if($_FILES[$file]['name']){
				if($this->duwi->gambarupload($this->path,$file)){
					$this->hapus_file($id);
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
				//UPDATE SESSION
				$this->session->set_userdata('user_foto',$data[$file]);
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
				'tabel'=>$this->tabel,
				'where'=>[[$this->id=>$this->user_id]]
			];
			$data=[
				'data'=>$this->Mdb->read($q)->row(),
				'setting'=>$this->setting(),
			];
			$this->load->view('tabel',$data);
		}
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
}
