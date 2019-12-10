<?php
defined('APPPATH') OR exit();

class Home extends Core\Controller
{
	public function __construct() {
		
	}

	public function index() {
		$products_model = $this->load_model('blogs');
		echo var_dump($blogs);
		echo 'Homepage';
	}
}