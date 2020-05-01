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
		$data=[
			'msg'=>'Halaman yang anda cari, tidak ditemukan',
		];
		notfound($data);
	}
}
