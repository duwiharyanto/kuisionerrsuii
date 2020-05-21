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
		if($status=='success')$st=true;
		if($status){
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
	function toastcekuser($status,$action=null){
		if($status=='success')$st=true;
		if($status){
			$data=[
				'status'=>'success',
				'msg'=>'Data '.$action.' berhasil ditambahkan',
			];
		}else{
			$data=[
				'status'=>'error',
				'msg'=>'Data '.$action.' gagal ditambahkan, username sudah dipakai',
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
	function toastupload($status,$msg){
		if($status=='success'){
			$data=[
				'status'=>'success',
				'msg'=>'Upload berhasil',
			];
		}else{
			$data=[
				'status'=>'error',
				'msg'=>$msg,
			];
		}
		return $data;
	}
	function toastbackupdb($status,$action=null){
		if($status==1)$st=true;
		if($status){
			$data=[
				'status'=>'success',
				'msg'=>'Proses backup '.$action.' berhasil',
			];
		}else{
			$data=[
				'status'=>'error',
				'msg'=>'Proses backup '.$action.' gagal dilakukan',
			];
		}
		return $data;
	}
?>
