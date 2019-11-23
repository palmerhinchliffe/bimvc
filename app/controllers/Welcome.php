<?php
defined('SYSPATH') OR exit();

class Welcome extends BIMVC_Controller
{
	public function index() {
		$this->render('welcome.html');
	}

	public function display_name($name = 'Louise')
	{
		$this->render('names.html', array('name'=>$name));
	}
}