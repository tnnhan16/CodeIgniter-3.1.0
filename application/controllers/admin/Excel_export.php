<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
 
    function __construct()
	{
		parent::__construct();
		$this->load->library('excel');
        $this->load->model('excel_export_model');
        $this->load->library('breadcrumbs');
    }
    
    function index()
    {
        $data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
        $data["employee_data"] = $this->excel_export_model->fetch_data();
        $data['temp_view'] = 'admin/export-excel/excel_export_view';
		$this->load->view('admin/main', $data);
    }

    function exportexcel()
    {
        $filename = 'excel_' . date('YmdHms') . '.xls';
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Name", "Address", "Gender", "Designation", "Age");
        $column = 0;
        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $employee_data = $this->excel_export_model->fetch_data();
        $excel_row = 2;
        foreach($employee_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->address);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->gender);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->designation);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->age);
            $excel_row++;
        }
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        $object_writer->save('php://output');
    }

    function exportexcelmulti(){
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("creater");
        $objPHPExcel->getProperties()->setLastModifiedBy("Middle field");
        $objPHPExcel->getProperties()->setSubject("Subject");
        $objWorkSheet = $objPHPExcel->createSheet();
        $work_sheet_count = 3;//number of sheets you want to create
        $work_sheet = 0;
        $employee_data = $this->excel_export_model->fetch_data();
        while($work_sheet <= $work_sheet_count){ 
            if($work_sheet == 0){
                $objWorkSheet->setTitle("Worksheet $work_sheet");
                $this->excel_export_model->createExcel($objPHPExcel, $employee_data, $work_sheet);
            }
            if($work_sheet == 1){
                $objWorkSheet->setTitle("Worksheet $work_sheet");
                $this->excel_export_model->createExcel($objPHPExcel, $employee_data, $work_sheet);
            }
            if($work_sheet == 2){
                $objWorkSheet = $objPHPExcel->createSheet($work_sheet_count);
                $objWorkSheet->setTitle("Worksheet $work_sheet");
                $this->excel_export_model->createExcel($objPHPExcel, $employee_data, $work_sheet);
            }
            $work_sheet++;
        }

        $filename = 'excel_multi_' . date('YmdHms') . '.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age = 0'); //no cach

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
 
}