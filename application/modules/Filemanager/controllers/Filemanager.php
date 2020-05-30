<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Filemanager extends MY_Controller {

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
			'submenu'=>'filemanager',
			'headline'=>'file manager',
			'url'=>'Filemanager',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'Filemanager',
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
}
