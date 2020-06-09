<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		//$this->duwi->listakses($this->session->userdata('user_level'));
		// $this->duwi->cekadmin();
		$this->leveluser=1;
	}
	public function setting(){
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'dokumentasi',
			'submenu'=>false,
			'url'=>base_url('Dokumentasi'),
		];
		return $setting;
	}
	public function index()
	{
		$data=[
			'konten'=>$this->load->view('Dokumentasi',$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->leveluser),
		];
		backend($data);
	}
	public function getdata(){
		$q_aksessistem="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal,log_aksi, COUNT(*) AS jumlah From log WHERE log_aksi='login' GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 7";
		$q_user="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From user GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 7";
		$d_aksessistem=$this->Mdb->hardcode($q_aksessistem)->result_array();
		$d_user=$this->Mdb->hardcode($q_user)->result_array();
		$usr=[
			'tabel'=>'user',
		];
		$log=[
			'tabel'=>'log',
		];
		$data=[
			$d_aksessistem,
			$d_user,
			count($this->Mdb->read($usr)->result_array()),
			'log'=>count($this->Mdb->read($log)->result_array()),
		];
		$this->output->set_output(json_encode($data));
	}
}
