<?php
defined('APPPATH') OR exit();

class Public_Error extends \Core\Controller
{
	public function index() {
		$this->render('errors/404.html', array('error' => 'generic error index'));
	}

	public function not_found() {
		$this->render('errors/404.html', array('error' => '404 not found'));
	}
}