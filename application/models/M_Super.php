<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Super extends CI_Model {

    function totalPro(){
        $this->db->select('count(id_product) as totalpro');
        return $this->db->get('products')->result_array();
    }

    function totaladmin(){
        $this->db->select('count(level) as admins');
        $this->db->where('level', 'admin');
        return $this->db->get('users')->result_array();
    }

    function alladmin(){
        $this->db->where('level', 'admin');
        return $this->db->get('users');
    }

    function allorders(){
        $this->db->select('invoices.date, invoices.status, costs.province, costs.city, costs.courier, costs.service, costs.postal_code, costs.street_adress, costs.total_cost, products.image, products.name as namapro, products.price, users.email, transaction.total_payment, orders.qty');
        $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');
        $this->db->join('products', 'products.id_product = orders.id_product', 'left');
        $this->db->join('users', 'users.id_user = orders.id_user', 'left');
        $this->db->join('transaction', 'transaction.transaction_code = transaction.transaction_code', 'left');
        return $this->db->get('orders');
    }

    function searchOrders($start, $end){
        $this->db->select('invoices.date, invoices.status, costs.province, costs.city, costs.courier, costs.service, costs.postal_code, costs.street_adress, costs.total_cost, products.image, products.name as namapro, products.price, users.email, transaction.total_payment, orders.qty');
        $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');
        $this->db->join('products', 'products.id_product = orders.id_product', 'left');
        $this->db->join('users', 'users.id_user = orders.id_user', 'left');
        $this->db->join('transaction', 'transaction.transaction_code = transaction.transaction_code', 'left');
        $this->db->where('invoices.date >=', $start);
        $this->db->where('invoices.date <=', $end);   
        return $this->db->get('orders')->result();
    }

    function searchDate($start, $end){
        $this->db->select('invoices.date, invoices.status, costs.province, costs.city, costs.courier, costs.service, costs.postal_code, costs.street_adress, costs.total_cost, products.image, products.name as namapro, products.price, users.email, transaction.total_payment, orders.qty');
        $this->db->join('invoices', 'invoices.id_invoice = orders.id_invoice', 'left');
        $this->db->join('costs', 'costs.id_cost = orders.id_cost', 'left');
        $this->db->join('products', 'products.id_product = orders.id_product', 'left');
        $this->db->join('users', 'users.id_user = orders.id_user', 'left');
        $this->db->join('transaction', 'transaction.transaction_code = transaction.transaction_code', 'left');
        $this->db->where('invoices.date >=', $start);
        $this->db->where('invoices.date <=', $end);   
        return $this->db->get('orders')->result_array();
    }

    function searchTransaction($start, $end){
        $this->db->from('transaction');
        $this->db->select('transaction.id_transaction, transaction.transaction_code,transaction.total_payment, users.email, users.photo, users.name, users.telephone, invoices.date, invoices.status');
        $this->db->join('users', 'users.id_user = transaction.id_user', 'left');
        $this->db->join('invoices', 'invoices.id_user = transaction.id_user', 'left');
        $this->db->where('invoices.date >=', $start);
        $this->db->where('invoices.date <=', $end);   
        return $this->db->get()->result_array();
    }

    // Total Transaction
    function totalTrans(){
        $this->db->select('count(transaction_code) as total');
        return $this->db->get('transaction')->result_array();
    }

    function totalPayment(){
        $this->db->select('SUM(total_payment) as payment');
        return $this->db->get('transaction')->result_array();
    }

    // MESSAGE
    function searchAdmin($key){
        $this->db->where("level", "admin");
        $this->db->like('name', $key);;
        return $this->db->get('users')->result();
    }

    function send($data){
        $this->db->insert('message', $data);
    }

    function chat($from, $to){
        $this->db->where('send_from', $from);
        $this->db->where('send_to', $to);
        return $this->db->get('message')->result();
    }
}

/* End of file M_Super.php */
