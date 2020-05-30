<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backup extends MY_Controller {

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
			'submenu'=>'backup',
			'headline'=>'backup database',
			'url'=>'Backup',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'Backup',
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
 public function backupdb(){
	 $this->load->dbutil();
	 $prefs = array(
		 'format' => 'zip',
		 'filename' => 'my_db_backup.sql'
	 );
	 $backup = $this->dbutil->backup($prefs);
	 $db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip'; // file name
	 $save  = 'filemanager/userfiles/' . $db_name; // dir name backup output destination

	 $this->load->helper('file');
	 $r=write_file($save, $backup);
	 $dt=toastbackupdb($r,$db_name);
	 return $this->output->set_output(json_encode($dt));
	 // $this->load->helper('download');
	 // force_download($db_name, $backup);
 }
 public function filemanager(){
	 define('FM_EMBED', true);
	 //define('FM_SELF_URL', UrlHelper::currentUrl()); // must be set if URL to manager not equal PHP_SELF
	 //define('FM_SELF_URL', $_SERVER['PHP_SELF']);
	 require 'berkasfilemanager.php';
 }
}
