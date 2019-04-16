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

    function updateProduct($data, $where){
        $this->db->where($where);
        $this->db->update('products', $data);
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


    // ORDERS & TRANSACTION
    function orders(){
        $this->db->from('transaction');
        $this->db->select('transaction.id_transaction, transaction.transaction_code, users.email, users.photo, users.name, users.telephone, invoices.date, invoices.status');
        $this->db->join('users', 'users.id_user = transaction.id_user', 'left');
        $this->db->join('invoices', 'invoices.id_user = transaction.id_user', 'left');
        
        return $this->db->get()->result_array();
    }

    function getIdUser($where){
        $this->db->select('transaction.id_user');
        return $this->db->get_where('transaction', $where)->result_array();
    }

    function confirmTransaction($whereId, $dataInv){
        $this->db->where($whereId);
        $this->db->update('invoices', $dataInv);
    }
    // END ORDERS & TRANSACTION


    // TESTIMONIALS PAGE
    function getTesti(){
        $this->db->from('testimonials');
        $this->db->select('users.email, users.photo, users.name, products.image,  products.name as product, testimonials.id_comment, testimonials.comment, testimonials.date_created ');
        $this->db->join('users', 'users.id_user = testimonials.id_user', 'left');
        $this->db->join('products', 'products.id_product = testimonials.id_product', 'left');
        $this->db->order_by('date_created', 'desc');
        return $this->db->get()->result_array();
    }

    function deleteComment($where){
        $this->db->where($where);
        $this->db->delete('testimonials');
    }
    // END TESTIMONIALS PAGE

    // USER PROBLEMS PAGE
    function problems(){
        $this->db->order_by('date', 'DESC');
        return $this->db->get('contacts')->result_array();
    }
    // END USER PROBLEMS PAGE

    // COUNTS
    function countall($table){
        return $this->db->count_all($table);
    }
    // END COUNTS

    // ALL DASHBOARD
    function totalSales(){
        $this->db->select('transaction.id_user, transaction.total_payment, invoices.id_user, invoices.status, sum(total_payment) as total');
        $this->db->join('transaction', 'transaction.id_user = invoices.id_user', 'left');
        return $this->db->get('invoices')->result_array();
    }

    function sold(){
        $this->db->select('orders.id_user, orders.qty, invoices.status, sum(qty) as sold');
        $this->db->join('orders', 'orders.id_user = invoices.id_user', 'left');
        return $this->db->get('invoices')->result_array();
    }

    function totalOrd(){
        $this->db->select('sum(qty) as orders');
        return $this->db->get('orders')->result_array();
    }

    function totalPro(){
        $this->db->select('count(id_product) as products');
        return $this->db->get('products')->result_array();   
    }

    function totalUsers(){
        $this->db->select('count(id_user) as users');
        $this->db->where_not_in('level', 'admin');
        $this->db->where_not_in('level', 'super_admin');
        return $this->db->get('users')->result_array();
    }

    function totalTesti(){
        $this->db->select('count(comment) as comments');
        return $this->db->get('testimonials')->result_array();
    }
    // END ALL DASHBOARD

}

/* End of file M_Admin.php */
