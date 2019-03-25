<?php

class Template {
	protected $_ci;

	function __construct()
	{
		$this->_ci =&get_instance();
		}

	function component($template,$data=null){
		$data['nav']		=	$this->_ci->load->view('template/nav',$data, TRUE);
		$data['content']    =	$this->_ci->load->view($template,$data, TRUE);
		$data['footer']		=	$this->_ci->load->view('template/footer',$data, TRUE);
		$data['script']		=	$this->_ci->load->view('template/script', $data, TRUE);

		$this->_ci->load->view('index',$data);
	}


	function user($template,$data=null){
		$data['nav']		=	$this->_ci->load->view('template/nav',$data, TRUE);
		$data['side']		=	$this->_ci->load->view('user/header',$data, TRUE);
		$data['content']    =	$this->_ci->load->view($template,$data, TRUE);
		$data['footer']		=	$this->_ci->load->view('template/footer',$data, TRUE);
		$data['script']		=	$this->_ci->load->view('template/script', $data, TRUE);

		$this->_ci->load->view('user/index',$data);
	}

	function admin($template,$data=null){
		$data['nav']		=	$this->_ci->load->view('user_admin/nav',$data, TRUE);
		$data['content']    =	$this->_ci->load->view($template,$data, TRUE);
		$data['footer']		=	$this->_ci->load->view('user_admin/footer',$data, TRUE);
		$this->_ci->load->view('user_admin/index',$data);
	}

}
