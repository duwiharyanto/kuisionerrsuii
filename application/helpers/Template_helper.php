<?php
	function previewdata($data){	
		echo "<pre>";
		print_r($data);
	}
	function backend($data){
		$backend="_template/Backend";
		$TEMPLATE =& get_instance();  
		$TEMPLATE->load->view($backend,$data);
	}
	function notfound($data=null){
		$backend="_template/Notfound404";
		$TEMPLATE =& get_instance();  
		$TEMPLATE->load->view($backend,$data);
	}
	function login($data=null){
		$backend="_template/Auth";
		$TEMPLATE =& get_instance();  
		$TEMPLATE->load->view($backend,$data);
	}		
	function export($config){
		$backend="template/export";
		$TEMPLATE =& get_instance();  
		return $TEMPLATE->load->view($backend,$config,true);
	}	
?>