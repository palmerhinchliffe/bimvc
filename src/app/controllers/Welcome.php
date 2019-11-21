<?php
defined('SYSPATH') OR exit();

class Welcome extends BIMVC_Controller
{
	public function index() {
		$names = [
			'Hansel',
			'Gretal'
		];
		$this->twig->display('welcome.html', array('names' => $names));
	}
}