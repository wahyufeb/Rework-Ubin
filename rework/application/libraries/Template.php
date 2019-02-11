<?php

class Template {
	protected $_ci;

	function __construct()
	{
		$this->_ci =&get_instance();
		}

	function komponen($template,$data=null)
	{
		$data['nav']		=	$this->_ci->load->view('template/nav',$data, TRUE);
		$data['content']    =	$this->_ci->load->view($template,$data, TRUE);
		$data['footer']		=	$this->_ci->load->view('template/footer',$data, TRUE);

		$this->_ci->load->view('index',$data);

	}

}
