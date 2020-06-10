<?php 
class ExportPdf extends My_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('ExportModel');
		$this->load->library('breadcrumbs');
	}
	
	function index()
	{

		$data = $this->ExportModel->createData();


		// $this->pdf->load_view('admin/export-pdf/index', $data);
		// $this->pdf->render();
		// $this->pdf->stream("welcome.pdf", array('Attachment'=> 0));
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		$data['temp_view'] = 'admin/export-pdf/index';
		$this->load->view('admin/main', $data);
	}

	function downloadPdf(){
		$html = file_get_contents(base_url('admin/download-pdf'));
		$this->pdf->load_content($html);
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		$this->pdf->stream("download-".date('YmdHHmmss').".pdf", array('Attachment'=> 1));
	}

}