<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Comment extends CI_Model {

    function addComment($data, $table){
        $this->db->insert($table, $data);
    }

    function getTestimonial($whereProduct){
        
        $this->db->join('users', 'users.id_user = testimonials.id_user', 'left');
        return $this->db->get_where('testimonials', $whereProduct)->result_array();
    }

    function delete($id){
        $this->db->where('id_comment', $id);
        $this->db->delete('testimonials');
    }

    function getComment($where){
        $this->db->where($where);
        return $this->db->get('testimonials')->result();        
    }

    function updateComment($where, $data){
        $this->db->where($where);
        $this->db->update('testimonials', $data);
    }









    
}

/* End of file M_Comment.php */
