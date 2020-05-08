<?php
	function validationmsg($status){
		if($status=='required'){
			echo '
		            <div class="invalid-feedback">
		              Isian ini wajib diisi
		            </div>
	            ';
		}else if($status=='email'){
			echo '
		            <div class="invalid-feedback">
		              Isian ini wajib diisi format email
		            </div>
	            ';
		}else if($status=='number'){
			echo '
		            <div class="invalid-feedback">
		              Isian ini wajib diisi angka
		            </div>
	            ';
		}
	}
?>