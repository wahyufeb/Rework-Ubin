<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

    public function index(){
        $this->load->view('404_Not_Found');
    }

    function error(){
        $this->load->view('Error');
    }

}

/* End of file My404.php */
