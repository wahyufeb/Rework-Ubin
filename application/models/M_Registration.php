<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registration extends CI_Model {

    function add_account($data){
        return $this->db->insert('users', $data);
    }
    
}

/* End of file M_Registration.php */
