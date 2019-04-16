<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Super extends CI_Model {

    function totalPro(){
        $this->db->select('count(id_product) as totalpro');
        return $this->db->get('products')->result_array();
    }

}

/* End of file M_Super.php */
