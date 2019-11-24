<?php
defined('SYSPATH') OR exit();

class Public_Error extends BIMVC_Controller
{
	public function index() {
		$this->render('errors/404.html', array('error' => 'controller not found'));
	}
}