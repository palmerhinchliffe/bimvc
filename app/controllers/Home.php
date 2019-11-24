<?php
defined('SYSPATH') OR exit();

class Home extends BIMVC_Controller
{
	public function __construct() {
		//$this->example_model = $this->load_model('example');
	}

	public function index() {
		//echo $this->example_model->hello();
		$this->render('welcome.html');
	}
}