<?php
defined('APPPATH') OR exit();

class My_Model extends Core\Model
{
	public function hello()
	{
		return 'Hello, from the example model!';
	}

	public function get_all_animals()
	{
		return;
	}
}