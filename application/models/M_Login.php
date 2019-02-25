<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

    function process_login($email, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $this->db->where('password',md5($password));
        $this->db->limit(1);


        $query = $this->db->get();

        if ($query->num_rows()==1){
            return $query->result_array();
        }else {
            return false;
        }        
    }
}

/* End of file M_Login.php */
