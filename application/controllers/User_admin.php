<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "admin"){
            redirect('Login');
        }

        $this->load->library('Template');
        $this->load->model('M_Admin'); 
        $this->load->model('M_User');
        
    }
    
    function index(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['admin'] = $this->M_Admin->saiaAdmin($where);

        // count orders
        $data['countOrders'] = $this->M_Admin->countall('orders');

        // Total Sales
        $data['salesTotal'] = $this->M_Admin->totalSales();

        // Total products sold
        $data['soldout'] = $this->M_Admin->sold();

        // Total Orders
        $data['totalorders'] = $this->M_Admin->totalOrd();

        // Total Product
        $data['totalpro'] = $this->M_Admin->totalPro();

        // Total Users
        $data['totalusers']  = $this->M_Admin->totalUsers();

        // Total testi
        $data['totaltesti'] = $this->M_Admin->totalTesti();
        
        $this->template->admin('user_admin/home', $data);
    }

    // PRODUCTS PAGE
    function products(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // saia admin
        $data['admin'] = $this->M_Admin->saiaAdmin($where);

        // all products
        $data['products'] = $this->M_Admin->allProducts();
        $this->template->admin('user_admin/allproducts', $data);
    }

    function addProduct(){
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('upload')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $filename = $data['upload_data']['file_name'];

            $data = array('name'            => $this->input->post('name'),
                            'image'         => $filename,
                            'price'         => $this->input->post('price'),
                            'weight'        => $this->input->post('weight'),
                            'stock'         => $this->input->post('stock'),
                            'discount'      => $this->input->post('discount'),
                            'catagory'      => $this->input->post('catagory'),
                            'description'   => $this->input->post('description')
            );
            $this->M_Admin->addProduct($data);
            $this->session->set_flashdata('add', 'add');
            redirect('User_admin/index');
        }
    }

    function getProductId(){
        $where = array('id_product' => $this->input->post('id'));
        $result = $this->M_Admin->getProductId($where);
        echo json_encode($result);
    }

    function deleteProduct($id){
        $where = array('id_product' => $id);

        $getProduct = $this->M_Admin->getProductId($where);
        $image = $getProduct[0]->image;
        if(file_exists($file=FCPATH.'assets/img/'.$image)){
            unlink($file);
        }
        $this->M_Admin->deleteProduct($where);
        redirect('User_admin/products');
    }
    function deleteImg(){
        //Ambil id image
        $id     =    $this->input->post('id');
        $where  =    array('id_product' => $id);
        $image  =    $this->M_Admin->get_where('products', $where);

        if($image->num_rows() > 0){
            $result     =   $image->row();
            $img        =   $result->image;
            
            if(file_exists($file=FCPATH.'/assets/img/'.$img)){
                unlink($file);
            }
        }
        echo "{}";
    }

    function updateImage(){
        $config['upload_path']   = FCPATH.'/assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
            $this->load->model('M_Admin');
            $id             = $this->input->post('id_product');
            $name           = $this->upload->data('file_name');
            $data           = array('image' => $name);       
            // id user, to add the model
            $where = array('id_product' => $id);
            $this->M_Admin->updateImage($where, $data);
        }
    }

    function remove_image(){
		//Ambil id image
        $id     =    $this->input->post('id');
        $where  =    array('id_product' => $id);
        $image  =    $this->M_Admin->get_where('products', $where);

        if($image->num_rows() > 0){
			$result     =   $image->row();
            $img        =   $result->image;
            
			if(file_exists($file=FCPATH.'/assets/img/'.$img)){
				unlink($file);
            }
            $data = array( 'image' => 'no picture');
            $this->M_Admin->updateFile('products', $data, $where);
		}
        echo "{}";

    }

    function updateProduct(){
        $data = array('name' => $this->input->post('update_name'),
                        'price' => $this->input->post('update_price'),
                        'weight' => $this->input->post('update_weight'),
                        'stock' => $this->input->post('update_stock'),
                        'discount' => $this->input->post('update_discount'),
                        'catagory' => $this->input->post('update_catagory'),
                        'description' => $this->input->post('update_description')
        );
        $where = array('id_product' => $this->input->post('update_idproduct'));
        $this->M_Admin->updateProduct($data, $where);
        redirect('User_admin/products');
    }

    // END PRODUCTS PAGE

    // ACCOUNTS PAGE

    // get all accounts
    function allAccounts(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // saia admin
        $data['admin'] = $this->M_Admin->saiaAdmin($where);

        $data['allaccounts'] = $this->M_Admin->allAccounts();

        $this->template->admin('user_admin/accounts', $data);
    }

    // get account id
    function getAccount(){
        $where = array('id_user' => $this->input->post('id_user'));
        $get = $this->M_Admin->getAccount($where);
        echo json_encode($get);
    }

    // suspend accounts
    function suspendAccount($id){
        $where      = array('id_user' => $id);
        $suspend    = array('active' => 0);

        $this->M_Admin->suspend($where, $suspend);
        redirect('User_admin/allAccounts');
    }

    // active accounts
    function activeAccount($id){
        $where      = array('id_user' => $id);
        $active    = array('active' => 1);

        $this->M_Admin->active($where, $active);
        redirect('User_admin/allAccounts');
    }
    // END ACCOUNTS PAGE


    // ORDERS & TRANSACTION PAGE
    function orders(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // saia admin
        $data['admin'] = $this->M_Admin->saiaAdmin($where);

        // get orders
        $data['orders'] = $this->M_Admin->orders();

        $this->template->admin('user_admin/orders', $data);
    }

    function getTransaction(){
        $where  = array('transaction_code' => $this->input->post('transaction_code'));
        $transaction = $this->M_User->transaction($where);
        echo json_encode($transaction);
    }

    function getCode(){
        $where = array('transaction_code' => $this->input->post('code'));
        $getCode = $this->M_User->getCode($where);
        echo json_encode($getCode);
    }

    function confirmationTransaction($code){
        $where  = array('transaction_code' => $code);
        $get = $this->M_Admin->getIdUser($where);
        $id_user = $get[0]['id_user'];

        $whereId = array('id_user' => $id_user);
        $dataInv = array('status' => 'paid');
        $this->M_Admin->confirmTransaction($whereId, $dataInv);
        redirect('User_admin/orders');
    }
    // END ORDERS & TRANSACTION PAGE

    // TESTIMONIALS PAGE
    function testimonials(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // saia admin
        $data['admin'] = $this->M_Admin->saiaAdmin($where);
        $data['testimonial'] = $this->M_Admin->getTesti();
        $this->template->admin('user_admin/testimonials', $data);
    }

    function deleteComment($id){
        $where = array('id_comment' => $id);
        $this->M_Admin->deleteComment($where);
        redirect('User_admin/testimonials');
    }
    // END TESTIMONIALS PAGE

    function userProblems(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // saia admin
        $data['admin'] = $this->M_Admin->saiaAdmin($where);
        $data['problems'] = $this->M_Admin->problems();
        $this->template->admin('user_admin/user_problems', $data);
    }


    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }


}

/* End of file User_admin.php */
