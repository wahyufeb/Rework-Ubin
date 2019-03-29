<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model {
    function countId($where, $table){
        $this->db->select('COUNT(id_user) as count');
        return $this->db->get_where($table,$where)->result_array();
    }

    function orderNow($id, $invoice, $costs, $total){
        //  Transaction Table
        $length = 15;
        $code= "";
        $data = "A1B2C3D4E5F6G7H8I9J10K23L02M2N0O0P2Q1R2S3T4U5V6W7X8Y9Z10QWERTYUIOPLKJHGFDSAZXCVBNM";
        
            for($i = 0; $i < $length; $i++){
                $code .= substr($data, (rand()%(strlen($data))), 1);
            }
        $transaction = array('transaction_code' => $code,
                                'id_user' => $id,
                                'total_payment' => $total
        );
        $this->db->insert('transaction', $transaction);

        // add to costs table
        $this->db->insert('costs', $costs);
        $id_costs = $this->db->insert_id();
        // add to invoice table
        $this->db->insert('invoices', $invoice);
        $id_invoice = $this->db->insert_id();

        // Qty
        foreach($this->cart->contents() as $row){

            $data = array('id_invoice' => $id_invoice,
                            'id_user' => $id,
                            'id_product' => $row['id'],
                            'qty' => $row['qty'],
                            'id_cost' => $id_costs,
                            'total' => $row['subtotal'],
                            'transaction_code' => $code
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

    function countInv(){
        $this->db->select('count(id_invoice) as inv');
        return $this->db->get('invoices')->result_array();  
    }
    // end Invoices

    // Cost 
    function deleteCost($wherecost){
        $this->db->where($wherecost);
        $this->db->delete('costs');
    }

    function countCost(){
        $this->db->select('count(id_cost) as cost');
        return $this->db->get('costs')->result_array();  
    }
    // end Cost

    function cancelOrder($where){
        $this->db->where($where);
        $this->db->delete('orders');
    }

    // ============================================================= //

}

/* End of file M_Order.php */
