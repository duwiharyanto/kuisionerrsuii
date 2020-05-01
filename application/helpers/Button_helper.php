<?php
	function buttonaksi($aksi,$id,$segmenturi){
		if($aksi['edit']){
			echo '
			<button type="button"  id="'.$row->warga_id.'" url="'. base_url($aksi['url'].'"edit"').'" class="edit btn btn-primary btn-circle" data-toggle="tooltip" title="Edit">
				<i class="fa fa-pencil"></i>
			</button>
			';
		}
		if($aksi['detail']){
			echo '
			<a  href="'.base_url($segmenturi.'"/detail/"'.md5($id)).'" class="btn btn-primary btn-circle" data-toggle="tooltip" title="Detail">
				<i class="fa fa-folder-open"></i>
			</a>
			';
		}
		if(isset($aksi['qrcode'])){
			echo '
			<button type="button" onclick="popuplaporan('.base_url($aksi['url'].'"qrcode/"'.md5($id)).')" class="btn btn-success btn-circle" data-toggle="tooltip" title="Share" >
				<i class="fa fa-qrcode"></i>
			</button>
			';
		}
		if($aksi['hapus']){
			echo' 	
			<button type="button" data-toggle="tooltip" title="" class="hapus btn btn-danger btn-circle" data-original-title="Hapus" url="'.base_url($aksi['url'].'"hapus/"').'"  id="'.$id.'">
				<i class="fa fa-trash"></i>
			</button>
			'; 
		}
	}
?>

