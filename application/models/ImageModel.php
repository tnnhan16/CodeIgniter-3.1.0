<?php 
	class ImageModel extends My_model
	{
		function __construct()
		{
			parent::__construct();
			$this->table = 'image';
		}
	}
?>