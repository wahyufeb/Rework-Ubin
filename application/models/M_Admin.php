<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

    function saiaAdmin($where){
        return $this->db->get_where('users',$where)->result_array();        
    }

    // PRODUCTS

    // add product
    function addProduct($data){
        $this->db->insert('products', $data);
    }

    // get all product
    function allProducts(){
        $this->db->order_by('sold', 'desc');
        return $this->db->get('products')->result_array();
        
    }

    // get product id
    function getProductId($where){
        $this->db->where($where);
        return $this->db->get('products')->result();
    }

    // delete Product
    function deleteProduct($where){
        $this->db->where($where);
        $this->db->delete('products');
    }


}

/* End of file M_Admin.php */
