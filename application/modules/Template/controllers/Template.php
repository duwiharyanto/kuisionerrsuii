<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{

	}
	public function notfound(){
		if($this->session->userdata('user_dashboard')){
			$url=$this->session->userdata('user_dashboard');
		}else{
			$url='Login';
		}
		$data=[
			'msg'=>'Halaman yang anda cari, tidak ditemukan',
			'url'=>site_url($url)
		];
		notfound($data);
	}
}
