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

    // Update Image
    function updateImage($where, $data){
        $this->db->where($where);
        $this->db->update('products', $data);
    }

    function get_where($table, $where){
        return $this->db->get_where($table, $where);
        
    }

    function updateFile($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // END PRODUCTS


    // ACCOUNTS
    // get all acccounts
    function allAccounts(){
        $this->db->where('level', 'member');
        $this->db->order_by('name', 'asc');
        return $this->db->get('users')->result_array();
    }

    // get account id
    function getAccount($where){
        $this->db->where($where);
        return $this->db->get('users')->result();
    }

    // suspend account
    function suspend($where, $suspend){
        $this->db->where($where);
        $this->db->update('users', $suspend);
    }

    // active account
    function active($where, $active){
        $this->db->where($where);
        $this->db->update('users', $active);
    }

    // END ACCOUNTS

    // ORDERS

    function orders(){
        $this->db->from('orders');
        $this->db->join('users', 'users.id_user = orders.id_user', 'left');
        $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        $this->db->order_by('invoices.date', 'desc');
        return $this->db->get()->result_array();
    }

    // END ORDERS

    // TESTIMONIALS PAGE
    function getTesti(){
        $this->db->from('testimonials');
        $this->db->select('users.email, users.photo, users.name, products.image,  products.name as product, testimonials.id_comment, testimonials.comment, testimonials.date_created ');
        $this->db->join('users', 'users.id_user = testimonials.id_user', 'left');
        $this->db->join('products', 'products.id_product = testimonials.id_product', 'left');
        $this->db->order_by('date_created', 'desc');
        return $this->db->get()->result_array();
    }
    // END TESTIMONIALS PAGE

}

/* End of file M_Admin.php */
