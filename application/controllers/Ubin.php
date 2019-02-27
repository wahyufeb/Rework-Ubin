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
	}
	
	public function index()
	{	        
		// user login id
		$id = $this->session->userdata('id_user');
		$where = array('id_user' => $id);
		// get user by id
		$data['user'] = $this->M_User->getUser($where, 'users');
		// get products
		$data['products'] = $this->M_Ubin->getProducts();
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
		
		$this->template->component('products/review_products', $data);
	}

	// add products to CART
	function addToCart($id){
		$where = array('id_product' => $id);
		$getProducts = $this->M_Ubin->productId($where);

		$data = array(
			'id'      => $getProducts->id_product,
			'qty'     => 1,
			'price'   => $getProducts->price,
			'name'    => $getProducts->name,
			'options' => array('weight' => $getProducts->weight,
								'image' => $getProducts->image
								)
					);
		$this->cart->insert($data);
		redirect(base_url());
	}
}
