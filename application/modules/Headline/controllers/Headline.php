<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Headline extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='kategori';
	private $id='kategori_id';
	private $jumlahsoal=16;
	//private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'headline',
			'submenu'=>false,
			'headline'=>'headline kuisioner',
			'url'=>'Headline',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'Headline',
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
	public function tabel($param=null){
		// $q=[
		// 	'select'=>'a.*,b.level_nama',
		// 	'tabel'=>'user a',
		// 	'join'=>[['tabel'=>'level b','ON'=>'a.user_level=b.level_id','jenis'=>'INNER']]
		// ];
		$q=[
			'tabel'=>$this->tabel,

		];	
		$data=[
			'data'=>$this->Mdb->read($q)->result(),
			'setting'=>$this->setting(),
		];
		if($param['getdata']){
			return $data['data'];
		}else{
			$this->load->view('tabel',$data);
		}
		
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('kategori_kategori')){
			$data=[
				'kategori_kategori'=>$this->input->post('kategori_kategori'),
				'kategori_periode'=>$this->input->post('kategori_periode'),
			];
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
