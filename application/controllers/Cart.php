<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != "member"){
            redirect('Login');
        }

        // load model User
        $this->load->model('M_User');

        //load model Cart
        $this->load->model('M_Cart');
        
    }
    
    public function index(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['user'] = $this->M_User->getUser($where, 'users');

        $this->template->user('user/shopping_cart', $data);
    }

    function deleteProduct($id){
        $data = array('rowid' => $id,
                        'qty' => 0
                );
        $this->cart->update($data);
        redirect('Cart/index');
    }
    
    // clear Cart
    function clearCart(){
        $this->cart->destroy();
        redirect('Cart/index');
    }

    // add qty
    function addQty($id, $rowid, $qty, $weight, $image){
        $where      = array('id_product' => $id);
        $itemsId    = $this->M_Cart->getWeightId($where, 'products');
        $itemWeight = $itemsId[0]['weight'];

        $productId  = $this->M_Cart->getProductWhere($where);
        if($productId->num_rows() > 0 ){
            $rowId = $productId->row();
            $rowStock = $rowId->stock;

            if($rowStock ==  $qty){
                $this->session->set_flashdata('nostock', 'Sorry');
                redirect('Cart/index');
            }else{
                $data = array('rowid' => $rowid,
                                'qty' => $qty+1,
                                'options' => array('weight' => $weight + $itemWeight,
                                                    'image' => $image
                                )
                        );
                $cart = $this->cart->update($data);
                redirect('Cart/index');   
            }
        }


    }

    // min qty
    function minQty($id, $rowid, $qty, $weight, $image){
        $where      = array('id_product' => $id);
        $itemsId    = $this->M_Cart->getWeightId($where, 'products');
        $itemWeight =  $itemsId[0]['weight'];

        $data = array('rowid' => $rowid,
                        'qty' => $qty-1,
                        'options' => array('weight' => $weight - $itemWeight,
                                            'image' => $image
                        )
                );
        $cart = $this->cart->update($data);
        redirect('Cart/index');   
    }



}

/* End of file Cart.php */
