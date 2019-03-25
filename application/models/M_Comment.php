<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Comment extends CI_Model {

    function addComment($data, $table){
        $this->db->insert($table, $data);
    }

    function getTestimonial($whereProduct){
        $this->db->limit(5);
        return $this->db->get_where('testimonials', $whereProduct)->result_array();
    }

    function delete($id){
        $this->db->where('id_comment', $id);
        $this->db->delete('testimonials');
    }

}

/* End of file M_Comment.php */
