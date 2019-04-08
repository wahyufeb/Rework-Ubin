<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_super_admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "super_admin"){
            redirect('Login');
        }
    }
    
    public function index(){
        
    }

}

/* End of file User_super_admin.php */
