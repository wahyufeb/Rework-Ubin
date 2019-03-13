<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registration extends CI_Model {

    function add_account($data){
        $this->db->insert('users', $data);
        return $this->db->insert_id();  
        
    }

    function verificationKey($key){
        $data = array('active' => 1);
        $this->db->where('md5(id_user)', $key);
        $this->db->update('users', $data);
        
    }
    
}

/* End of file M_Registration.php */
