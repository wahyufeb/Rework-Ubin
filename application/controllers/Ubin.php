<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		// Load Libraries
		$this->load->library('Template');
		$this->load->library('pagination');
		

		// Model User
		$this->load->model('M_User');
		$this->load->model('M_Ubin');	
		$this->load->model('M_Comment');
		
	}
	
	public function index(){	  
		// user login id
		$id = $this->session->userdata('id_user');
		$where = array('id_user' => $id);
		
		// get user by id
		$data['user'] = $this->M_User->getUser($where, 'users');
		
		// get products discount
		$data['discount'] = $this->M_Ubin->discount();
		
		
		// get products with no discount
		$data['products'] = $this->M_Ubin->getProducts();
		
		// top product
		$data['top'] = $this->M_Ubin->top(); 
	
		$this->template->component('home', $data);
	}

	function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_Ubin->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->name;
                echo json_encode($arr_result);
            }
        }
	}
	
	function search(){
		// user login id
		$id = $this->session->userdata('id_user');
		$where = array('id_user' => $id);
		
		// get user by id
		$data['user'] = $this->M_User->getUser($where, 'users');

		// search input
		$search  = $this->input->get('search');
		// get products discount
		$data['discount'] = $this->M_Ubin->discount();
		
		//result search
		$data['results'] = $this->M_Ubin->search($search);
		$this->template->component('user/search', $data);
	}

	function product($id_product){
		// user login id
		$id = $this->session->userdata('id_user');
		$where = array('id_user' => $id);
		// get user by id
		$data['user'] = $this->M_User->getUser($where, 'users');
		
		// id product
		$whereProduct = array('id_product' => $id_product);
		// get Product where id product 	
		$data['productid'] = $this->M_Ubin->getProductId($whereProduct, 'products');

		// show comment
		$data['comment'] = $this->M_Comment->getTestimonial($whereProduct);
		
		$this->template->component('products/review_products', $data);
	}

	// add products to CART
	function addToCart($id){
		//get product with id
		$where = array('id_product' => $id);
		$getProducts = $this->M_Ubin->productId($where);

		// put qty form cart library
		$cart = $this->cart->contents();
		foreach($cart as $row){
			$qtycart = $row['qty'];
		}

		// get stock in product
		$stockProduct = $getProducts->stock;

		// check stock
		if($stockProduct < 1){
			$this->session->set_flashdata('nostock', 'Sorry');
		}elseif($stockProduct <= $qtycart){
			$this->session->set_flashdata('nostock', 'Sorry');
		}else{
			//add to cart library
			$disc = $getProducts->discount;
			$price = $getProducts->price;
			$count = $price * $disc / 100;

			$data = array(
				'id'      => $getProducts->id_product,
				'qty'     => 1,
				'price'   => $price - $count,
				'name'    => $getProducts->name,
				'options' => array('weight' => $getProducts->weight,
									'image' => $getProducts->image
									)
						);
			$this->cart->insert($data);
		}
		redirect(base_url());
	}

	function pagination(){

		$this->load->library('pagination');
	
		$config['base_url'] = '#';
		$config['total_rows'] = $this->M_Ubin->count_all();;
		$config["per_page"] = 8;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];
		
		$output = array('pagination_link' => $this->pagination->create_links(),
						'data_products' => $this->M_Ubin->fetch_details($config['per_page'], $start)
		);
		echo json_encode($output);
	}

	function contactAdmin(){
		$this->template->component('contact');
	}

	function sendToAdmin(){
        date_default_timezone_set('Asia/Jakarta');
		$data = array('email' => htmlspecialchars($this->input->post('email')),
						'problem' => htmlspecialchars($this->input->post('problem')),
						'problem_detail' => htmlspecialchars($this->input->post('problem_detail')),
						'date' => date("d-M-Y h:i:s")
									);
		$this->M_Ubin->sendContact($data);
		$this->session->set_flashdata('flash', 'success');
		redirect('Login');
	}

	
}
