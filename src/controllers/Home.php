<?php
defined('APPPATH') OR exit();

class Home extends Core\Controller
{
	public function __construct() {
		
	}

	public function index() {
		$data = array(
			'message' => 'Rise and shine, Dr. Freeman...',
		);
		$this->render('welcome.html', $data);
	}
}