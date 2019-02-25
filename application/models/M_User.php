<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
    // Upload to database
    function upload($id, $data, $table){
        $this->db->where('id_user', $id);
        $this->db->update($table, $data);
        
    }
    // Remove File Upload
    function get_where($table, $token){
        return $this->db->get_where($table,$token);
    }

    function updateFile($table, $id, $data){
        $this->db->where('id_user', $id);
        $this->db->update($table, $data);
    }

    function getUser($where, $table){
        $this->db->where($where);
        return $this->db->get($table)->result();
        
    }

    function update_profile($data, $where, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    // function getUserajax($table, $where){
    //     $this->db->where($where);
    //     return $this->db->get($table);    
    // }

    // delete photo profile
    function getUserId($where, $table){
        return $this->db->get_where($table,$where);
    }

    function deletePhoto($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }


}

/* End of file M_User.php */
