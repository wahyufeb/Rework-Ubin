<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ubin extends CI_Model {

    // get all products width no discount
    function getProducts(){
        //return $this->db->limit(12)->get('products')->result_array();
        $queryGet = $this->db->get('products');
        if($queryGet->num_rows() > 0){
            $rowProduct = $queryGet->row();
            $noDiscount = 0;
            // no doscount
            $where = array('discount' => $noDiscount);
            return $this->db->limit(12)->get_where('products', $where)->result_array();
        }
        
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

    // Top 4 products
    function top(){
        $this->db->from('products');
        $this->db->select('id_product,sold as total_sold, price, name, stock, image, ');         
        $this->db->order_by('total_sold',' DESC');
        $this->db->limit(4);
        return $this->db->get()->result_array();  
    }

    //Discount
    function discount(){
        $this->db->from('products');
        $this->db->select('id_product, price, name, stock, image, sold, discount as getdiscount');
        $this->db->order_by('getdiscount', 'DESC');
        $this->db->limit(3);
        return $this->db->get()->result_array();
    }



    

}

/* End of file M_Ubin.php */
