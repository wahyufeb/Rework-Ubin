<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubin extends CI_Controller {
	public function index()
	{
		$this->template->komponen('home');
	}
}
