<?php
defined('SYSPATH') OR exit();

class BIMVC_Error extends BIMVC_Controller
{
	public function index() {
		$msg = 'Page not found';
		$this->twig->display('404.html', array('error' => $msg));
	}
}