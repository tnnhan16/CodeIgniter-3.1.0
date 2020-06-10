<?php
class Excel_export_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->order_by("id", "DESC");
  $query = $this->db->get("employee");
  return $query->result();
 }

 function createExcel($object, $employee_data, $work_sheet){

    $table_columns = array("Name", "Address", "Gender", "Designation", "Age");
    $column = 0;
    foreach($table_columns as $field)
    {
        $object->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow($column, 1, $field);
        $column++;
    }
    $excel_row = 2;
    foreach($employee_data as $row)
    {
        $object->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow(0,  $excel_row, $row->name);
        $object->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow(1,  $excel_row, $row->address);
        $object->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow(2,  $excel_row, $row->gender);
        $object->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow(3,  $excel_row, $row->designation);
        $object->setActiveSheetIndex($work_sheet)->setCellValueByColumnAndRow(4,  $excel_row, $row->age);
        $excel_row++;
    }
    return $object;
 }
 
}