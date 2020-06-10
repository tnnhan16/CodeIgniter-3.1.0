<?php 
class BaiViet extends My_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('BaiVietModel');
		$this->load->library('session');
		$this->load->library('breadcrumbs');
	
	}
	
	function index()
	{
		$config = array();
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
        $config["base_url"] = base_url() . "admin/baiviet/index";
		$config["total_rows"] = $this->BaiVietModel->get_total();
        $config["per_page"] = 10;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['list'] = $this->BaiVietModel->get_list($config["per_page"], $page);
		$data['temp_view'] = 'admin/baiviet/index';
		$this->load->view('admin/main', $data);
	}

	function insert()
	{
		$data = array();
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		// nếu submit form mà có dữ liệu post lên
		if($this->isPost())
		{   
			$this->form_validation->set_rules('name',"Tên danh mục",'required');     
			//khi nhập liệu chính xác
			if($this->form_validation->run())
			{
				$tendm = $this->input->post('name');
				$dulieu = array(
							'name'=> $tendm
						);
				$this->BaiVietModel->create($dulieu);
				$this->session->set_flashdata('mess','Đã thêm thành công');	
				redirect('admin/baiviet/index');
			}             
		}	
		$data['temp_view'] = 'admin/baiviet/insert';
		$this->load->view('admin/main', $data);
	}

	function edit()
	{
		$id = $this->uri->segment(4);
		$id = intval($id);
		$info = $this->BaiVietModel->get_info($id);
		if(empty($id) || empty($info)){
			$this->session->set_flashdata('mess','Không tồn tại bai viet');
			redirect('admin/baiviet');
		}
		$data = array();
		$data['info'] = (array)$info;
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		if($this->isPost())
		{
			$this->form_validation->set_rules('name',"Tên danh mục",'required');		
			//khi nhập liệu chính xác
			if($this->form_validation->run())
			{
				$tendm = $this->input->post('name');
				$data['info'] = array(
					'id' => $id,
					'name'=> $tendm
				);
				$this->BaiVietModel->update($id, $data['info']);
				$this->session->set_flashdata('mess','Đã sửa thành công');
				redirect('admin/baiviet/index');
			}		
		}
		$data['temp_view'] = 'admin/baiviet/edit';		
		$this->load->view('admin/main', $data);
	}

	function delete()
	{
		$id = $this->uri->segment(4);
		$info = $this->BaiVietModel->get_info($id);
		if(empty($id) || empty($info)){
			$this->session->set_flashdata('mess','Không tồn tại bài viết');
			redirect('admin/baiviet/index');
		}
		$data['info'] = $info;
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		if($this->isPost())
		{
			$this->BaiVietModel->delete($id);
			$this->session->set_flashdata('mess','Đã xóa thành công');
			redirect('admin/baiviet/index');
		}
		$data['temp_view'] = 'admin/baiviet/delete';
		$this->load->view('admin/main', $data);

	}

}
?>