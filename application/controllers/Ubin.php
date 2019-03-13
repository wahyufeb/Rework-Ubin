<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Load Libraries
		$this->load->library('Template');


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
		
		// ger products discount
		$data['discount'] = $this->M_Ubin->discount();
		
		
		// get products with no discount
		$data['products'] = $this->M_Ubin->getProducts();
		
		// top product
		$data['top'] = $this->M_Ubin->top(); 
		  
		$this->template->component('home', $data);
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
}
