<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_super_admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "super_admin"){
            redirect('Login');
        }
        $this->load->library('Template');
        
        // load model
        $this->load->model('M_Admin');
        $this->load->model('M_Super');
    }
    
    public function index(){
        $this->template->super('super_admin/home');
    }

}

/* End of file User_super_admin.php */
