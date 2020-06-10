<?php 
	class My_controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}

		function isPost(){
			if($this->input->server('REQUEST_METHOD') == 'POST'){
				return true;
			}
			return false;
		}
		function isGet(){
			if($this->input->server('REQUEST_METHOD') == 'GET'){
				return true;
			}
			return false;
		}
	}
?>