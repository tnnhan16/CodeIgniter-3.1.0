<?php 
	class ExportModel extends My_model
	{
		function __construct()
		{
			parent::__construct();
			$this->table = '';
		}

		function createData(){

			$data['data'] = [];
			for($i = 0;$i < 100; $i ++){
				$data['data'][$i] = ['id' => 'MS00'. ($i + 1),'name' => '重要なお知らせ' . ($i + 1),'name_kana' => 'フリガナ' . ($i + 1),'email' => 'tranvan'.($i + 1).'@gmail.com'];
			}

			return $data;
		}
	}
?>