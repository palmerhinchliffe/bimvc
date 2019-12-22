<?php
namespace Core;

defined('APPPATH') OR exit();

class Model
{
    /**
     * @var Doctrine entity manager object
     */
	public $entity_manager;

	public function __construct()
	{
		if (file_exists(APPPATH . '/core/Database.php')) {
			require_once APPPATH . '/core/Database.php';
			$this->entity_manager = Database::get_entity_manager();
		} else {
			Error::error('Cannot locate core Database.php');
		}
	}
}