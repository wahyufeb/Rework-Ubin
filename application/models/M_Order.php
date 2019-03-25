<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model {
    function countId($where, $table){
        $this->db->select('COUNT(id_user) as count');
        return $this->db->get_where($table,$where)->result_array();
    }

    function orderNow($id, $invoice, $costs){
        
        // add to costs table
        $this->db->insert('costs', $costs);
        $id_costs = $this->db->insert_id();
        
        // Qty
        foreach($this->cart->contents() as $row){
            // add to invoice table
            $this->db->insert('invoices', $invoice);
            $id_invoice = $this->db->insert_id();

            $data = array('id_invoice' => $id_invoice,
                            'id_user' => $id,
                            'id_product' => $row['id'],
                            'qty' => $row['qty'],
                            'id_cost' => $id_costs
                        );
            $this->db->insert('orders', $data);
        }
        foreach($this->cart->contents() as $product){
            $where = array('id_product' =>$product['id']);
            $qty   = $product['qty'];

        $productTable = $this->db->get_where('products', $where);

            if($productTable->num_rows() > 0){
                $rowProduct = $productTable->row();
                
                //stock
                $stock = $rowProduct->stock;

                // id_product
                $id    = $rowProduct->id_product;

                // sold
                $sold = $rowProduct->sold;

                $whereId = array('id_product' => $id);
                $qtyResult = array( 'stock' => $stock - $qty, 
                                    'sold' => $sold + $qty 
                                );
                
                $this->db->where('id_product', $id);
                $this->db->update('products', $qtyResult);
            }
        }
        $this->cart->destroy();
        return TRUE;
    }

    function getOrdersId($where){
        return $this->db->get_where('orders', $where);
    }


    // ======================= Cancel Order ====================== //

    function getOrder($where){
        return $this->db->get_where('orders', $where)->result_array();
    }

    function stockBack($qty, $id_product){
        $product = $this->db->get_where('products', array('id_product' => $id_product))->result_array();
        $stock = $product[0]['stock'];

        $update = array('stock' => $stock + $qty);
        $this->db->where('id_product', $id_product);
        $this->db->update('products', $update);
    }

    // Invoices 
    function deleteInv($whereId){
        $this->db->where($whereId);
        $this->db->delete('invoices');
    }

    // end Invoices

    function cancelOrder($where){
        $this->db->where($where);
        $this->db->delete('orders');
    }

    // ============================================================= //

}

/* End of file M_Order.php */
