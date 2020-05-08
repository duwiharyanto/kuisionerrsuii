<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	
	function toasthapus($status,$action=null){
		if($status=='success'){
			$data=[
				'status'=>'success',
				'msg'=>'Data '.$action.' berhasil dihapus',
			];			
		}else{
			$data=[
				'status'=>'error',
				'msg'=>'Data '.$action.' gagal dihapus, kontak administrator',
			];			
		}
		return $data;
	}
	function toastsimpan($status,$action=null){
		if($status=='success'){
			$data=[
				'status'=>'success',
				'msg'=>'Data '.$action.' berhasil ditambahkan',
			];			
		}else{
			$data=[
				'status'=>'error',
				'msg'=>'Data '.$action.' gagal ditambahkan, kontak administrator',
			];			
		}
		return $data;
	}
	function toastupdate($status,$action=null){
		if($status=='success'){
			$data=[
				'status'=>'success',
				'msg'=>'Data '.$action.' berhasil diperbarui',
			];			
		}else{
			$data=[
				'status'=>'error',
				'msg'=>'Data '.$action.' gagal diperbarui, kontak administrator',
			];			
		}
		return $data;
	}	
?>