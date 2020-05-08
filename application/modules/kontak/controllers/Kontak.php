<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		// $this->duwi->cekadmin();
	}
	public function setting(){
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'kontak'
		];
		return $setting;
	}
	public function index()
	{
		$param ='hello model';
		$dt=$this->duwi->libmodel($param);
		//print_r($this->Mdb->testmodel($param));
		//$this->load->view('welcome_message');
		$data=[
			'konten'=>$this->load->view('Konten','',TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend(1),
		];
		backend($data);
	}
}
