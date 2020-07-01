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
	private $jumlahsoal=16;
	private $thereisupdate=1;
	//private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'kuisioner',
			'submenu'=>false,
			'headline'=>'responder kuisioner',
			'url'=>'Kuisioner',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>true,
				'edit'=>false,
				'detail'=>true,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'Kuisioner',
			],
			'update'=>$this->thereisupdate,
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
	public function tabel($param=null){
		// $q=[
		// 	'select'=>'a.*,b.level_nama',
		// 	'tabel'=>'user a',
		// 	'join'=>[['tabel'=>'level b','ON'=>'a.user_level=b.level_id','jenis'=>'INNER']]
		// ];
		//SET NILAI HASIL
		$rendah=0;
		$sedang=0;
		$tinggi=0;
		$q=[
			'select'=>'a.*,b.kategori_kategori,b.kategori_periode,c.departemen_nama',
			'tabel'=>'kuisioner a',
			'join'=>[['tabel'=>'kategori b','ON'=>'a.kuisioner_kategoriid=b.kategori_id','jenis'=>'INNER'],
				['tabel'=>'departemen c','ON'=>'a.kuisioner_departemenid=c.departemen_id','jenis'=>'INNER'],
				],

		];
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
				$rendah++;
				$warna='bg-success';
			}elseif($nilai==7 || $nilai <= 13){
				$status="Risiko Sedang Paparan Covid-19";
				$warna='bg-warning';
				$sedang++;
			}elseif($nilai>=14){
				$status="Risiko Tinggi Paparan Covid-19";
				$warna='bg-danger';
				$tinggi++;
			}else{
				$status="unkown";
				$warna='bg-secondary';
			}
			$kuisioner[$index]->status=$status;
			$kuisioner[$index]->warna=$warna;
			$nilai=0; //RESET
		}		
		$kluster=[
			'rendah'=>$rendah,
			'sedang'=>$sedang, 
			'tinggi'=>$tinggi,
		];
		$data=[
			'data'=>$kuisioner,
			'setting'=>$this->setting(),
			'kluster'=>$kluster,
		];
		if($param['getdata']){
			return $data['data'];
		}else{
			$this->load->view('tabel',$data);
		}
		
	}
	public function add(){
		if($this->input->post('kuisioner_nama')){
			$data=[
				'kuisioner_nama'=>$this->input->post('kuisioner_nama'),
				'kuisioner_unitkerja'=>$this->input->post('kuisioner_unitkerja'),
				'kuisioner_departemen'=>$this->input->post('kuisioner_departemen'),
				'kuisioner_alamatdomisili'=>$this->input->post('kuisioner_alamatdomisili'),
				'kuisioner_kategoriid'=>$this->input->post('kuisioner_kategoriid'),
			];
			for ($i=1; $i < 17; $i++) { 
				$data['kuisioner_j'.$i]=$this->input->post('j'.$i);
			}
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
			];
			$r=$this->Mdb->insert($q);
			$dt=toastsimpan($r,'user');
			return $this->output->set_output(json_encode($dt));
		}
		$departemen=[
			'tabel'=>'departemen',
		];
		$kategori=[
			'tabel'=>'kategori',
			'where'=>[['kategori_status'=>1]],
		];
		$q=[
			'tabel'=>'pertanyaan',
		];
		$data=[
			'data'=>$this->Mdb->read($q)->result(),
			'kategori'=>$this->Mdb->read($kategori)->row(),
			'departemen'=>$this->Mdb->read($departemen)->result(),
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view('add',$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('user_nama')){
			$data=[
				'user_nama'=>$this->input->post('user_nama'),
				'user_username'=>$this->input->post('user_username'),
				'user_email'=>$this->input->post('user_email'),
				'user_level'=>$this->input->post('user_level'),
				'user_dashboard'=>$this->input->post('user_dashboard'),
				'user_status'=>$this->input->post('user_status')
			];
			if($this->input->post('user_password')) $data['user_password']=md5($this->input->post('user_password'));
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($r){
				$data=toastupdate('success','User');
			}else{
				$data=toastupdate('error','User');
			}
			return $this->output->set_output(json_encode($data));
		}
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[[$this->id=>$id]],
		];
		$level=[
			'tabel'=>'level',
		];
		$result=$this->Mdb->read($q)->row();
		$data=[
			'setting'=>$this->setting(),
			'headline'=>'edit data',
			'level'=>$this->Mdb->read($level)->result(),
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
			$data=toasthapus('success','User');
		}else{
			$data=toasthapus('error','User');
		}
		$this->output->set_output(json_encode($data));
	}
	public function hapusall(){
		$id=$this->input->post('id');
		$q=[
			'tabel'=>$this->tabel,
		];
		$result=$this->Mdb->deleteall($q);
		if($result){
			$data=toasthapus('success','User');
		}else{
			$data=toasthapus('error','User');
		}
		$this->output->set_output(json_encode($data));
	}	
	public function cetak(){
		$param=[
			'getdata'=>true,
		];
		$data=$this->tabel($param);
		print_r($data);
	}
	public function detail(){
		//$id=25;
		$id=$this->input->post('id');
		$marking=[];
		$q_responden=[
			'tabel'=>'kuisioner',
			'where'=>[['md5(kuisioner_id)'=>$id]],
		];
		$responden=$this->Mdb->read($q_responden)->result();
		if(count($responden)==0) redirect(site_url('notfound')); //ERROR
		// $data=(object)[];
		$pertanyaan=[];
		$q_question=[
			'tabel'=>'pertanyaan',
		];
		foreach ($responden as $index => $val) {
			for($i=1;$i<=$this->jumlahsoal;$i++){
				$kolom='kuisioner_j'.$i;
				$jawaban[$i]=$val->$kolom; //ARAY JAWABAN
			}
		}
		//POLLING PERTANYAAN
		$r_pertanyaan=$this->Mdb->read($q_question)->result();	
		$i=1;	
		foreach($r_pertanyaan AS $index => $row){
			$pertanyaan[$index]=$row;
			$pertanyaan[$index]->jawaban=$jawaban[$i];
			$i++;
		}	
		$data=[
			'responden'=>$responden,
			'data'=>$pertanyaan,
			'setting'=>$this->setting(),
		];
		$this->load->view('detail',$data);
	}
	public function cetakdetail(){
		$id=$this->input->post('id');
		$marking=[];
		$q_responden=[
			'tabel'=>'kuisioner',
			'where'=>[['md5(kuisioner_id)'=>$id]],
		];
		$responden=$this->Mdb->read($q_responden)->result();
		if(count($responden)==0) redirect(site_url('notfound')); //ERROR
		// $data=(object)[];
		$pertanyaan=[];
		$q_question=[
			'tabel'=>'pertanyaan',
		];
		foreach ($responden as $index => $val) {
			for($i=1;$i<=$this->jumlahsoal;$i++){
				$kolom='kuisioner_j'.$i;
				$jawaban[$i]=$val->$kolom; //ARAY JAWABAN
			}
		}
		//POLLING PERTANYAAN
		$r_pertanyaan=$this->Mdb->read($q_question)->result();	
		$i=1;	
		foreach($r_pertanyaan AS $index => $row){
			$pertanyaan[$index]=$row;
			$pertanyaan[$index]->jawaban=$jawaban[$i];
			$i++;
		}		
		$data=array(
			'setting'=>$this->setting(),
			'responden'=>$responden,
			'data'=>$pertanyaan,
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'),
		);
		$print=[
			'konten'=>$this->load->view('cetakdetail',$data,TRUE), //VIEW HTML
		];
		$view=exportpdf($print);
		$cetak=[
			'judul'=>ucwords($data['setting']['headline']).'/'.date('d-m-Y'),
			'view'=>$view,
			'kertas'=>'A4',
		];
		$this->duwi->prosescetak($cetak);		
	}
	public function faker(){
		$faker=Faker\factory::create('id_ID');
		for ($i=0; $i < 20 ; $i++) {
			echo $faker->name.'<br>';
			echo $faker->date.'<br>';
		}
	}

}
