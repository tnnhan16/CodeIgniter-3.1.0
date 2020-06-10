<?php 
	class ImportUserCsv extends MY_Controller
	{
		function __construct()
		{
            parent::__construct();
            $this->load->model('userModel');
            $this->load->library('breadcrumbs');
            $this->load->library('upload');
        }

        function importcsv(){

            $data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
            // nếu submit form mà có dữ liệu post lên
            if($this->isPost())
            {
                $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/public/import/';
                $config = array(
                    'upload_path' => $uploadPath,
                    'allowed_types' => "csv",
                    'overwrite' => TRUE,
                    'max_size' => "2048",
                );
                $this->upload->initialize($config);
                if($this->upload->do_upload('importcsv'))
                {
                    $data = [];
                    $file = $_FILES['importcsv']['tmp_name'];
                    $handle = fopen($file, "r");
                    $index = 0;
                    $success = 0;
                    $error = 0;
                    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {                      
                        if($index > 0){
                            if(!empty($filesop[0]) && !empty($filesop[1]) && !empty($filesop[2])){
                                $data[]  = [
                                    "username"  => $filesop[0], 
                                    "email"     => $filesop[1],
                                    "password"  => $filesop[2],
                                    "active"    => $filesop[3],
                                ]; 
                                $success = $success + 1;
                            }else{
                                $error = $error + 1;
                            }                         
                        }
                        $index = $index + 1;
                    }
                    $this->userModel->insertSql($data);
                    $message = '';
                    if($success){
                        $message =  'Đã import  ' . $success . ' user thành công.';
                    }
                    if($error){
                        $message =  $message . ' <font color="red">Có  ' . $error . ' user import thất bại.</font> ';
                    }                
                    $this->session->set_flashdata('mess', $message);
                    redirect('admin/user');
                }
                else
                {
                    $data['error']  = $this->upload->display_errors();
                }             
            }	
            $data['temp_view'] = 'admin/user/importcsv';
		    $this->load->view('admin/main', $data);
        }
    }
?>