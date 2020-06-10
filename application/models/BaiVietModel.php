<?php 
	class BaiVietModel extends My_model
	{
		function __construct()
		{
			parent::__construct();
			$this->table = 'dm_baiviet';
		}
	}
?>