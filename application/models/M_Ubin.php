<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ubin extends CI_Model {

    // get all products width no discount
    function getProducts(){
        //return $this->db->limit(12)->get('products')->result_array();
        $queryGet = $this->db->get('products');
        if($queryGet->num_rows() > 0){
            $rowProduct = $queryGet->row();
            // no doscount
            $where = array('discount' => 0);

            // no stock
            $noStock = 0;

            $this->db->where($where);
            $this->db->where_not_in('stock', $noStock);
            $query = $this->db->get('products',4);
            return $query->result_array();
            
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
        $this->db->from('products')
                    ->select('id_product,sold as total_sold, price, name, stock, image, discount')
                    ->order_by('total_sold',' DESC')
                    ->order_by('discount', 'DESC')
                    ->limit(4);

        $noStock = 0;
        $this->db->where_not_in('stock', $noStock);
        return $this->db->get()->result_array();  
    }

    //Discount
    function discount(){
        $noStock = 0;
        $this->db->where_not_in('stock', $noStock);
        $query = $this->db->from('products')
                            ->select('id_product, price, name, stock, image, sold, discount as discount')
                            ->order_by('discount', 'DESC')
                            ->limit(3);
        return  $query->get()->result_array();

    }



    

}

/* End of file M_Ubin.php */
