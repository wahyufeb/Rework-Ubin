<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
    }
    
    function index(){
        $this->load->view('account/login');
    }

    function login(){
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $userLog = $this->db->get_where('users', ['email' => $email])->row_array();
        if($userLog){
            if($userLog['active'] == 0){
                redirect('My404/error');
            }else{
                if(password_verify($password, $userLog['password'])){
                    $data = array('id_user' => $userLog['id_user'],
                                    'email' => $userLog['email'],
                                    'level' => $userLog['level'],
                                    'active' => $userLog['active']
                    );
                $this->session->set_userdata($data);

                // redirect ke masing2 level
                    if($this->session->userdata('level')== "member"){
                        redirect('User/index');
                    }elseif($this->session->userdata('level') == "admin"){
                        redirect('User_admin/index');
                    }elseif($this->session->userdata('level') == "super_admin"){
                        redirect('User_super_admin/index');
                    }
                }else{
                    $this->session->set_flashdata('failed', 'Incorrect email or password.');
                    redirect('Login/index'); 
                }
            }
        }else{
            $this->session->set_flashdata('failed', 'Incorrect email or password.');
            redirect('Login/index'); 
        }
    }
}

/* End of file Login.php */
