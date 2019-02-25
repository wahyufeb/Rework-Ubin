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



}

/* End of file Cart.php */
