<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ubin extends CI_Model {

    // get all products
    function getProducts(){
        return $this->db->get('products')->result_array();
    }

    // get product by Id
    function productId($where){
        $result = $this->db->where($where)
                        ->limit(1)
                        ->get('products');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    // get Product where id_product
    function getProductId($whereProduct, $table){
        $this->db->where($whereProduct);
        $this->db->limit(1);
        $result = $this->db->get($table);

        if($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return false;
        }
    }



    

}

/* End of file M_Ubin.php */
