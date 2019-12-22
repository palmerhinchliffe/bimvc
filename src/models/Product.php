<?php
defined('APPPATH') OR exit();

class Product extends Core\Model
{
	// Takes user ID and gets name
	public function get_name($id)
	{
		$entity_manager->find('Product', $id);

		return $user === null ? null : $user->get_name();
	}
}