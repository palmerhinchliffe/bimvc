<?php
defined('SYSPATH') OR exit();

class Example_Model extends BIMVC_Model
{
	public function hello()
	{
		return 'Hello, from the example model!';
	}

	public function get_all_animals()
	{
		return $this->db->select_all('animals');
	}
}