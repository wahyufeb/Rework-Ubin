<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ubin extends CI_Model {

    function search($tittle){
        $this->db->like('name', $tittle);
        $this->db->or_like('catagory', $tittle);
        return $this->db->get('products')->result();
    }


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

    function count_all(){
        $query = $this->db->get('products');
        return $query->num_rows();
        
    }

    function fetch_details($limit, $start){
        $where = array('discount' => 0);
        $output = '';
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('name', 'asc');
        $this->db->limit($limit, $start);
        $this->db->where($where);
        $query = $this->db->get();
        $output .='<div class="free-shipping" style="color:#009ae1;" id="all-products"><h3>All Products</h3>';
        foreach ($query->result() as $row) {
            $output.=' <div class="col-lg-3 col-md-6 col-sm-6 col-6 product-free-shipping" style="color:#333;">
            <div class="card">
                <a href="'.base_url("Ubin/product/").''.$row->id_product.'">
                    <img src="'.base_url("assets/img/").''.$row->image.'" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">'.$row->name.'</h5>
                    <p>Rp. '.number_format($row->price, 0,',','.').'</p>
                    <p style="font-size:13px;">Stock : '. $row->stock.'</p>
                    <div class="row">
                        <a href="'. base_url("Ubin/addToCart/").''.$row->id_product.'" class="btn btn-success add-cart">Add to cart <i class="fas fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>';
        }
        $output .='</div>';
        return $output;
    }

    function sendContact($data){
        $this->db->insert('contacts', $data);
    }



    

}

/* End of file M_Ubin.php */
