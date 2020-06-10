<?php 
	class Login extends MY_Controller
	{
		function __construct()
		{
            parent::__construct();
            $this->load->model('userModel');
        }

        function login(){
            // nếu submit form mà có dữ liệu post lên
            if($this->input->post())
            {   
                $this->form_validation->set_rules('username',"Username",'trim|required');
                $this->form_validation->set_rules('password',"Password",'trim|required');          
                //khi nhập liệu chính xác
                if($this->form_validation->run())
                {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $data = array(
                                'username'=> $username,
                                'password' => $password,
                            );
                    $result = $this->userModel->login($data);
                    if($result){
                        $this->session->set_userdata('logged_in', $data);
                        redirect('welcome/index');
                    }else{
                        $this->session->set_flashdata('mess','Vui lòng kiểm tra lại username và password');	
                    }                   
                }             
            }	
            $this->load->view('admin/login');
        }

        // Logout from admin page
        public function logout() {

            // Removing session data
            $sess_array = array(
                'username' => '',
                'password' => '',
            );
            $this->session->unset_userdata('logged_in', $sess_array);
            redirect('admin/login');
        }
    }
?>