<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='kuisioner';
	private $id='kuisioner_id';
	public function setting(){
		$q=[
			'select'=>'a.*,b.*',
			'tabel'=>'kuisioner a',
			'join'=>[['tabel'=>'kategori b','ON'=>'a.kuisioner_kategoriid=b.kategori_id','jenis'=>'INNER']]
		];
		$d=$this->Mdb->join($q)->result();			
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'laporan',
			'submenu'=>'lap_kuisioner',
			'headline'=>'laporan pengisian kuisioner',
			'url'=>'Laporan/Kuisioner',  //CASE SENSITIVE
			'aksi'=>[
				'add'=>false,
				'edit'=>false,
				'detail'=>false,
				'hapus'=>false,
				'url'=>'Laporan/Kuisioner',
			],
			'kuisioner'=>$d,
		];
		return $setting;
	}
	public function index()
	{	
		$data=[

			'konten'=>$this->load->view('Kuisioner/Index',$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level),
		];
		backend($data);
	}
	public function tabel($nama=null,$param=null){
		// $q=[
		// 	'select'=>'a.*,b.level_nama',
		// 	'tabel'=>'user a',
		// 	'join'=>[['tabel'=>'level b','ON'=>'a.user_level=b.level_id','jenis'=>'INNER']]
		// ];
		// $nama=str_replace('_', ' ', $nama);
		$nama=$this->input->post('id');
		$q=[
			'select'=>'a.*,b.*',
			'tabel'=>'kuisioner a',
			'join'=>[['tabel'=>'kategori b','ON'=>'a.kuisioner_kategoriid=b.kategori_id','jenis'=>'INNER']]
		];		
		if($nama){
			$q['like']=['a.kuisioner_nama'=>$nama];
		}

		$d=$this->Mdb->join($q)->result();
		$kuisioner=[];
		$nilai=0;
		foreach ($d as $index => $row) {
			$kuisioner[$index]=$row;
			$nilai	+=$row->kuisioner_j1;		
			$nilai	+=$row->kuisioner_j2;
			$nilai	+=$row->kuisioner_j3;
			$nilai	+=$row->kuisioner_j4;
			$nilai	+=$row->kuisioner_j5;
			$nilai	+=$row->kuisioner_j6;
			$nilai	+=$row->kuisioner_j7;
			$nilai	+=$row->kuisioner_j8;
			$nilai	+=$row->kuisioner_j9;
			$nilai	+=$row->kuisioner_j10;
			$nilai	+=$row->kuisioner_j11;
			$nilai	+=$row->kuisioner_j12;
			$nilai	+=$row->kuisioner_j13;
			$nilai	+=$row->kuisioner_j14;
			$nilai	+=$row->kuisioner_j15;
			$nilai	+=$row->kuisioner_j16;
			$nilai	+=$row->kuisioner_j17;
			$kuisioner[$index]->nilai=$nilai;
			
			if($nilai==0 || $nilai <= 6){
				$status="Risiko Rendah Paparan Covid-19";
				$warna='bg-success';
			}elseif($nilai==7 || $nilai <= 13){
				$status="Risiko Sedang Paparan Covid-19";
				$warna='bg-warning';
			}elseif($nilai>=14){
				$status="Risiko Tinggi Paparan Covid-19";
				$warna='bg-danger';
			}else{
				$status="unkown";
				$warna='bg-secondary';
			}
			$kuisioner[$index]->status=$status;
			$kuisioner[$index]->warna=$warna;
			$nilai=0; //RESET
		}		
		$data=[
			'data'=>$kuisioner,
			'setting'=>$this->setting(),
		];
		//$this->load->view('Kuisioner/tabel',$data);
		if($param['getdata']){
			return $data['data'];
		}else{
			$this->load->view('Kuisioner/tabel',$data);
			//return $this->output->set_output(json_encode($kuisioner));
		}
		
	}
	public function cetaks(){
		$param=[
			'getdata'=>true,
		];
		$data=$this->tabel(false,$param);
		print_r($data);
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
	public function cetak($nama=null){
		if(!$nama){
			$nama=$this->input->post('nama');
		}else{
			$nama=str_replace('%20', ' ', $nama);
		}

		$q=[
			'select'=>'a.*,b.*',
			'tabel'=>'kuisioner a',
			'join'=>[['tabel'=>'kategori b','ON'=>'a.kuisioner_kategoriid=b.kategori_id','jenis'=>'INNER']]
		];		
		if($nama){
			$q['like']=['a.kuisioner_nama'=>$nama];
		}

		$d=$this->Mdb->join($q)->result();
		$kuisioner=[];
		$nilai=0;
		foreach ($d as $index => $row) {
			$kuisioner[$index]=$row;
			$nilai	+=$row->kuisioner_j1;		
			$nilai	+=$row->kuisioner_j2;
			$nilai	+=$row->kuisioner_j3;
			$nilai	+=$row->kuisioner_j4;
			$nilai	+=$row->kuisioner_j5;
			$nilai	+=$row->kuisioner_j6;
			$nilai	+=$row->kuisioner_j7;
			$nilai	+=$row->kuisioner_j8;
			$nilai	+=$row->kuisioner_j9;
			$nilai	+=$row->kuisioner_j10;
			$nilai	+=$row->kuisioner_j11;
			$nilai	+=$row->kuisioner_j12;
			$nilai	+=$row->kuisioner_j13;
			$nilai	+=$row->kuisioner_j14;
			$nilai	+=$row->kuisioner_j15;
			$nilai	+=$row->kuisioner_j16;
			$nilai	+=$row->kuisioner_j17;
			$kuisioner[$index]->nilai=$nilai;
			
			if($nilai==0 || $nilai <= 6){
				$status="Risiko Rendah Paparan Covid-19";
				$warna='bg-success';
			}elseif($nilai==7 || $nilai <= 13){
				$status="Risiko Sedang Paparan Covid-19";
				$warna='bg-warning';
			}elseif($nilai>=14){
				$status="Risiko Tinggi Paparan Covid-19";
				$warna='bg-danger';
			}else{
				$status="unkown";
				$warna='bg-secondary';
			}
			$kuisioner[$index]->status=$status;
			$kuisioner[$index]->warna=$warna;
			$nilai=0; //RESET
		}
		$data=array(
			'setting'=>$this->setting(),
			'data'=>$kuisioner,
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'),
		);
		$print=[
			'konten'=>$this->load->view('Kuisioner/cetak',$data,TRUE), //VIEW HTML
		];
		$view=exportpdf($print);
		$cetak=[
			'judul'=>ucwords($data['setting']['headline']).'/'.date('d-m-Y'),
			'view'=>$view,
			'kertas'=>'A4',
		];
		$this->duwi->prosescetak($cetak);
	}
}
