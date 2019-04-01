<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
    // Upload to database
    function upload($id, $data, $table){
        $this->db->where('id_user', $id);
        $this->db->update($table, $data);
        
    }
    // Remove File Upload
    function get_where($table, $token){
        return $this->db->get_where($table,$token);
    }

    function updateFile($table, $id, $data){
        $this->db->where('id_user', $id);
        $this->db->update($table, $data);
    }

    function getUser($where, $table){
        $this->db->where($where);
        return $this->db->get($table)->result();
        
    }

    function update_profile($data, $where, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // end 


    // function getUserajax($table, $where){
    //     $this->db->where($where);
    //     return $this->db->get($table);    
    // }

    // delete photo profile
    function getUserId($where, $table){
        return $this->db->get_where($table,$where);
    }

    function deletePhoto($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // end

    // Payment History
    function paymentHistory($whereId){
        $this->db->select('orders.id_user, orders.id_order, orders.id_invoice, orders.id_cost, orders.qty, orders.total, invoices.date, invoices.due_date, invoices.status, costs.total_cost, products.id_product, products.name, products.image, transaction.total_payment');
        $this->db->from('orders');
        $this->db->join('users', 'users.id_user = orders.id_user', 'left');
        $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');
        $this->db->join('products', 'products.id_product = orders.id_product', 'left');
        $this->db->join('transaction', 'transaction.id_user = users.id_user', 'left');
        $this->db->where($whereId);
        return $this->db->get()->result_array();
    }

    
    function transaction($where){
        $this->db->where($where);
        return $this->db->get('transaction')->result();
    }
        // $this->db->select('users.id_user, users.email, users.name, users.photo, users.telephone, orders.id_product, orders.qty, orders.total, invoices.date, invoices.due_date, invoices.status, costs.province, costs.city, costs.courier, costs.service, costs.postal_code, costs.street_adress, costs.total_cost, transaction.id_transaction, transaction.transaction_code, transaction.transaction_image, products.image, products.name as product_name');
        // $this->db->join('users', 'users.id_user = transaction.id_user', 'left');      
        // $this->db->join('orders', 'orders.id_user = transaction.id_user', 'left');      
        // $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');      
        // $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');
        // $this->db->join('products', 'products.id_product = orders.id_product', 'left');       
    function getCode($where){
        $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        $this->db->join('products', 'products.id_product = orders.id_product', 'left');
        $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');        
        return $this->db->get_where('orders', $where)->result();
    }

    // Uplaod Image proof of transaction
    function uploadTransactionImage($where, $data){
        $this->db->where($where);
        $this->db->update('transaction', $data);
    }

    // Confirmation transaction
    function confirmTransaction($where, $updateInv){
        $this->db->where($where);
        $this->db->update('invoices', $updateInv);
    }

    // get Transaction
    function codeTransaction($where){
        $this->db->where($where);
        return $this->db->get('transaction')->result_array();
    }





}

/* End of file M_User.php */
