<?php
	function buttonaksi($aksi,$id,$segmenturi){
		echo '<div class="btn-group mb-3" role="group" aria-label="Basic example">';
		if(isset($aksi['edit'])&&$aksi['edit']){
			echo '
			<button type="button"  id="'.$id.'" url="'. base_url($aksi['url']."/edit").'" class="edit btn btn-icon btn-md btn-warning" data-toggle="tooltip" title="Edit">
				<i class="fa fa-pencil-alt"></i>
			</button>
			';
		}
		if(isset($aksi['detail'])&&$aksi['detail']){
			echo '
			<a  href="'.base_url($aksi['url']."/detail/".md5($id)).'" class="btn btn-icon btn-primary btn-md" data-toggle="tooltip" title="Detail">
				<i class="fa fa-folder-open"></i>
			</a>
			';
		}
		if(isset($aksi['qrcode'])&&$aksi['qrcode']){
			echo '
			<button type="button" onclick="popuplaporan('.base_url($aksi['url']."qrcode/".md5($id)).')" class="btn btn-icon btn-success btn-md" data-toggle="tooltip" title="Share" >
				<i class="fa fa-qrcode"></i>
			</button>
			';
		}
		if(isset($aksi['hapus'])&&$aksi['hapus']){
			echo' 	
			<button type="button" data-toggle="tooltip" title="" class="hapus btn btn-icon btn-danger btn-md" data-original-title="Hapus" url="'.base_url($aksi['url']."/hapus").'"  id="'.$id.'">
				<i class="fa fa-times"></i>
			</button>
			'; 
		}
		echo '</div>';
	}
?>

