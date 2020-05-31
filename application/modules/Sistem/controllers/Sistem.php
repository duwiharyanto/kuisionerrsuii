<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sistem extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='setting';
	private $id='setting_id';
	private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'setting',
			'submenu'=>'sistem',
			'headline'=>'setting sistem',
			'url'=>'Sistem',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
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
		if($this->input->post('setting_namasistem')){
			$id=$this->input->post('id');
			$data=[
				'setting_namasistem'=>$this->input->post('setting_namasistem'),
				'setting_namapemilik'=>$this->input->post('setting_namapemilik'),
				'setting_namatempat'=>$this->input->post('setting_namatempat'),
				'setting_alamat'=>$this->input->post('setting_alamat'),
				'setting_email'=>$this->input->post('setting_email'),
				'setting_notlp'=>$this->input->post('setting_notlp'),
				'setting_tagline'=>$this->input->post('setting_tagline'),
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
				'tabel'=>'setting'
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
