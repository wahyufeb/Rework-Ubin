<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != "admin"){
            redirect('Login');
        }

        $this->load->library('Template');
        $this->load->model('M_Admin');
        
        
    }
    
    public function index(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);
        $data['admin'] = $this->M_Admin->saiaAdmin($where);
        $this->template->admin('user_admin/home', $data);
    }

    // PRODUCTS
    public function products(){
        $id = $this->session->userdata('id_user');
        $where = array('id_user' => $id);

        // saia admin
        $data['admin'] = $this->M_Admin->saiaAdmin($where);

        // all products
        $data['products'] = $this->M_Admin->allProducts();
        $this->template->admin('user_admin/allproducts', $data);
    }

    public function addProduct(){
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

    public function getProductId(){
        $where = array('id_product' => $this->input->post('id'));
        $result = $this->M_Admin->getProductId($where);
        echo json_encode($result);
    }

    public function deleteProduct($id){
        $where = array('id_product' => $id);

        $getProduct = $this->M_Admin->getProductId($where);
        $image = $getProduct[0]->image;
        if(file_exists($file=FCPATH.'assets/img/'.$image)){
            unlink($file);
        }
        $this->M_Admin->deleteProduct($where);
        redirect('User_admin/products');
    }

    // END PRODUCTS



}

/* End of file User_admin.php */
