<?php
defined('SYSPATH') OR exit();

class Home extends BIMVC_Controller
{
	public function __construct() {
		$this->example_model = $this->load_model('example');
	}

	public function index() {
		$animals = $this->example_model->get_all_animals();
		$this->render('welcome.html', array('animals' => $animals));
	}
}