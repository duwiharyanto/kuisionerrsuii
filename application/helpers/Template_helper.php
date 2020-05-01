<?php
	function previewdata($data){	
		echo "<pre>";
		print_r($data);
	}
	function backend($data){
		$backend="_template/Backend";
		$CI =& get_instance();  
		$CI->load->view($backend,$data);
	}
	function notfound($data=null){
		$backend="_template/Notfound404";
		$CI =& get_instance();  
		$CI->load->view($backend,$data);
	}	
	function export($config){
		$backend="template/export";
		$CI =& get_instance();  
		return $CI->load->view($backend,$config,true);
	}	
?>