<?php 
class ExportCsv extends My_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('ExportModel');
		$this->load->library('breadcrumbs');
	}
	
	function index()
	{
		$data = $this->ExportModel->createData();
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		$data['temp_view'] = 'admin/export-csv/index';
		$this->load->view('admin/main', $data);
	}

	function downloadCsv(){

		$data = $this->ExportModel->createData();
		$filename = 'file_csv'.date('YmdHHmmss').'.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header('Content-Transfer-Encoding: binary');
		header("Content-Type: application/x-csv;");
		$file = fopen('php://output', 'w');
		$header = array("Id","Name","Name_kana","Email");
		$this->createFileCsv($header, $data['data'], $filename);
		fputcsv($file, $header);
		foreach ($data['data'] as $key => $line){
			fputcsv($file, array($line['id'], mb_convert_encoding($line['name'], "CP932", "UTF-8"), mb_convert_encoding($line['name_kana'], "CP932", "UTF-8"), $line['email']));
			
        }
		fclose($file);
        exit;
	}

	/**
     * Create data to temp csv file
     * @param type $data
     */
    private function createFileCsv($header, $data, $filename)
    {
        $rowSuccess = 0;
        $fileName = $filename;
		$dirName = $_SERVER['DOCUMENT_ROOT'] . '/public/export/csv';
        if (!is_dir($dirName)) {
            mkdir($dirName);
            chmod($dirName, 0777);
        }
		
        $filePath = $dirName . '/' . $fileName;
        if(file_exists($filePath)){
            unlink($filePath);
        }
		
        $fp = fopen($filePath, 'a');
        if (filesize($filePath) == 0) {
            fputcsv($fp, $header,',','"');
        }

        foreach ($data as $value) {
            if (count($value) > 0) {
				$lineFormat = array();
				foreach ($value as $item) {
					$result = '"' . $item . '"';
					$lineFormat[] = $result;
				}
                if (count($lineFormat) > 0) {
                    fwrite($fp, implode(',', $lineFormat) . "\r\n");
                    $rowSuccess = $rowSuccess + 1;
                }
            }
        }
		fclose($fp);
		
	}
}
?>