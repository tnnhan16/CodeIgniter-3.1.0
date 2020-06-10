<?php 
class User extends My_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('userModel');
		$this->load->library('session');
		$this->load->library('breadcrumbs');
	
	}
	
	function index()
	{
		$config = array();
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
        $config["base_url"] = base_url() . "admin/user/index";
		$config["total_rows"] = $this->userModel->get_total();
        $config["per_page"] = 10;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['list'] = $this->userModel->get_list($config["per_page"], $page);
		$data['temp_view'] = 'admin/user/index';
		$this->load->view('admin/main', $data);
	}

	function register()
	{
		$data = array();
		// nếu submit form mà có dữ liệu post lên
		if($this->isPost())
		{   
            $this->form_validation->set_rules('username',"username",'required|callback_check_exist_username');
            $this->form_validation->set_rules('password',"password",'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('email',"email",'trim|required|valid_email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $data['data'] = array(
                        'username'=> $username,
                        'password'=> $password,
                        'email'=> $email
                    );      
			//khi nhập liệu chính xác
			if($this->form_validation->run())
			{
                $result = $this->userModel->create($data['data']);
                if($result){
                    $this->sendMail($data['data'], $email, "Đăng ký tài khoản người dùng");
                    redirect('admin/user/thongbao');
                }				
			}            
		}	
		$this->load->view('admin/register', $data);
    }

    function insert()
	{
		$data = array();
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
        // nếu submit form mà có dữ liệu post lên
        
		if($this->isPost())
		{
            $this->form_validation->set_rules('username',"username",'required|callback_check_exist_username');
            $this->form_validation->set_rules('password',"password",'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('email',"email",'trim|required|valid_email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $data['data'] = array(
                        'username'=> $username,
                        'password'=> $password,
                        'email'=> $email
                    );      
			//khi nhập liệu chính xác
			if($this->form_validation->run())
			{
                $result = $this->userModel->create($data['data']);
                if($result){
                    $this->session->set_flashdata('mess','Thêm mới thành công');
                    redirect('admin/user');
                }				
			}         
		}	
		$data['temp_view'] = 'admin/user/insert';
		$this->load->view('admin/main', $data);
	}

	function edit()
	{
		$id = $this->uri->segment(4);
		$id = intval($id);
        $info = $this->userModel->get_info($id);
        if(empty($id) || empty($info)){
			$this->session->set_flashdata('mess','Không tồn tại user');
			redirect('admin/user');
		}
		$data = array();
		$data['info'] = (array)$info;
		$data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		if($this->isPost())
		{
			$this->form_validation->set_rules('username',"username",'required|callback_check_exist_username');
            $this->form_validation->set_rules('password',"password",'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('email',"email",'trim|required|valid_email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $data['info'] = array(
                        'id'=> $id,
                        'username'=> $username,
                        'password'=> $password,
                        'email'=> $email
                    );		
			//khi nhập liệu chính xác
			if($this->form_validation->run())
			{
				$this->userModel->update($id, $data['info']);
				$this->session->set_flashdata('mess','Đã sửa thành công');
				redirect('admin/user');
			}		
		}
		$data['temp_view'] = 'admin/user/edit';		
		$this->load->view('admin/main', $data);
	}

	function delete()
	{
		$id = $this->uri->segment(4);
        $info = $this->userModel->get_info($id);
		if(empty($id) || empty($info)){
			$this->session->set_flashdata('mess','Không tồn tại user');
			redirect('admin/user');
		}
		$data['info'] = $info;
        $data['breadcrumb'] = $this->breadcrumbs->create($this->uri);
		if($this->isPost())
		{
			$this->userModel->delete($id);
			$this->session->set_flashdata('mess','Đã xóa thành công');
			redirect('admin/user');
		}
		$data['temp_view'] = 'admin/user/delete';
		$this->load->view('admin/main', $data);

    }
    
    function deleteAll(){

        $result = false;
        if($this->isPost())
		{
            $data = $this->input->post('data');
            if($data){
                $integerIDs = [];
                foreach ($data as $number) {
                    $integerIDs[] = (int) $number;
                }
                $result = $this->userModel->deleteMulti($integerIDs);
            }
        }
        if($result){
            $this->session->set_flashdata('mess','Đã xóa thành công'); 
        }else{
            $this->session->set_flashdata('mess','Xóa thất bại');
        }
	    echo json_encode($result);
    }

    function thongbao()
	{	
		$this->load->view('admin/thongbao');
    }

    public function sendMail($data, $userEmail, $subject){

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'tnnhan@ctu.edu.vn',
            'smtp_pass' => '******',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('tnnhan@ctu.edu.vn', 'Trần Ngọc Nhân');
        $this->email->to($userEmail); // replace it with receiver mail id
        $this->email->subject($subject); // replace it with relevant subject
        $body = $this->load->view('mail-template/register', $data,TRUE);
        $this->email->message($body); 
        if($this->email->send()){
            return true;
        }
        return false;
    
    }

    /**
     * check exist username
     * param $username
     */
    function check_exist_username($username){
        $id = $this->uri->segment(4);
        $id = intval($id);
        $where['username'] = $username;
        $where_not_in = array();
        if($id){
            $where_not_in['id'] = $id;
        }
        $result = $this->userModel->check_exists_not_in($where, $where_not_in);
        if($result){
            return false;
        }	
        return true;
    }
}