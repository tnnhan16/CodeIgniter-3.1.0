<?php 
use Codeigniter\Libraries\REST_Controller;

class User extends REST_Controller
{
	
    
    function deleteAll_post(){

        if($this->isPost())
		{
            $checkbox = $this->input->post('checkbox');
            // print_r($checkbox);
			// $this->userModel->delete($id);
			// $this->session->set_flashdata('mess','Đã xóa thành công');
		}
        $this->response($checkbox);
    }

}