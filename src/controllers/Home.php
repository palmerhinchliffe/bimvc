<?php
defined('APPPATH') OR exit();

class Home extends Core\Controller
{
	public function __construct() {
		
	}

	public function index() {
		echo 'Homepage';
	}
}