<?php 
class UploadFile extends My_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('ImageModel');
		$this->load->library('breadcrumbs');
	}

	function index()
	{
		$config = array();
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
        $config["base_url"] = base_url() . "admin/uploadfile/index";
		$config["total_rows"] = $this->ImageModel->get_total();
        $config["per_page"] = 10;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['list'] = $this->ImageModel->get_list($config["per_page"], $page);
		$data['temp_view'] = 'admin/upload-file/index';
		$this->load->view('admin/main', $data);
	}

	public function insert()
	{
		if($this->isPost())
		{
			$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/';
			$config = array(
				'upload_path' => $uploadPath,
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
				'max_size' => "204800000",
				'max_height' => "76800",
				'max_width' => "102400"
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile'))
			{
				$data = $this->upload->data();
				
				$dulieu = array(
							'name'=> $data['file_name'],
						);
				$this->ImageModel->create($dulieu);
				$this->session->set_flashdata('mess','Đã thêm thành công');
				redirect('admin/uploadfile');
			}
			else
			{
				$data['error']  = $this->upload->display_errors();
			}
		}
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		$data['temp_view'] = 'admin/upload-file/insert';
		$this->load->view('admin/main', $data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$id = intval($id);
		$info = $this->ImageModel->get_info($id);
		if(empty($info)){
			$this->session->set_flashdata('mess', $id. ' không tồn tại');	
			redirect('admin/uploadfile');
		}
		$data = array();
		$data['info'] = $info;
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		if($this->isPost())
		{
			if(empty($_FILES['userfile']['name'])){
				$data['error'] = 'Chưa chọn file image';
			}else{
				$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/';
				$config = array(
					'upload_path' => $uploadPath,
					'allowed_types' => "gif|jpg|png|jpeg|pdf",
					'overwrite' => TRUE,
					'max_size' => "204800000",
					'max_height' => "76800",
					'max_width' => "102400"
				);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile'))
				{
					$data = $this->upload->data();
					
					$dulieu = array(
								'name'=> $data['file_name'],
							);
					$result = $this->ImageModel->update($id, $dulieu);
					if($result){
						unlink($uploadPath.$info->name);
					}
					$this->session->set_flashdata('mess','Đã thêm thành công');	
					redirect('admin/uploadfile');
				}
				else
				{
					$data['error'] = array('error' => $this->upload->display_errors());
				}
			}			
		}
		$data['temp_view'] = 'admin/upload-file/edit';
		$this->load->view('admin/main', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$id = intval($id);
		$info = $this->ImageModel->get_info($id);
		if(empty($info)){
			$this->session->set_flashdata('mess', $id. ' không tồn tại');	
			redirect('admin/uploadfile');
		}
		$data = array();
		$data['info'] = $info;
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		if($this->isPost())
		{
			$data = $this->upload->data();
			$dulieu = array(
						'name'=> $data['file_name'],
					);
			$result = $this->ImageModel->delete($id);
			if($result){
				$this->session->set_flashdata('mess','Đã xóa thành công');	
				$uploadPath = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/';
				unlink($uploadPath.$info->name);
			}else{
				$this->session->set_flashdata('mess','Xóa không thành công');	
			}			
			redirect('admin/uploadfile');						
		}
		$data['temp_view'] = 'admin/upload-file/delete';
		$this->load->view('admin/main', $data);
	}

}