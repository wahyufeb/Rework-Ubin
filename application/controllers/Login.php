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

        $processlogin = $this->M_Login->process_login($email, $password);
        if($processlogin){
            foreach($processlogin as $row);
            if($row['active'] == 0){
                echo 'akun anda belum aktif';
            }else{
                $this->session->set_userdata('id_user', $row['id_user']);
                $this->session->set_userdata('name', $row['name']);
                $this->session->set_userdata('level', $row['level']);
                $this->session->set_userdata('acrive', $row['active']);

                
                //$output['mess'] = 'SUCCES';
                if($this->session->userdata('level')== "member"){
                    redirect('User/index');
                }elseif($this->session->userdata('level') == "admin"){
                    redirect('User_admin/index');
                }elseif($this->session->userdata('level') == "super_admin"){
                    redirect('User_super_admin/index');
                }
            }
        } else{
            $this->session->set_flashdata('failed', 'Incorrect email or password.');
            redirect('Login');
        }
    }
}

/* End of file Login.php */
