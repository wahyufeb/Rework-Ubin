<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != "admin"){
            redirect('Login');
        }
    }
    
    public function index(){
        
    }

}

/* End of file User_admin.php */
