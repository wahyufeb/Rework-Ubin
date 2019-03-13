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
        // return $this->db->get_where('orders', $where);
        // $this->db->select('DISTINCT(*)');
        // $this->db->from('orders');
        // $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        // $this->db->join('users', 'users.id_user = invoices.id_user', 'left'); 
        // $this->db->join('products', 'products.id_product = orders.id_product', 'left');
        // $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');
        // $this->db->where($whereName);
        // $this->db->distinct();
        $this->db->select('orders.id_user, orders.id_order, orders.id_invoice, orders.id_cost, orders.qty, invoices.date, invoices.due_date, invoices.status, costs.total, products.id_product, products.name, products.image');
        $this->db->from('orders');
        $this->db->join('users', 'users.id_user = orders.id_user', 'left');
        $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');
        $this->db->join('products', 'products.id_product = orders.id_product', 'left');
        
        $this->db->where($whereId);
        
        return $this->db->get()->result_array();
    }






}

/* End of file M_User.php */
