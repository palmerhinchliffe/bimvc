<?php
namespace Core;

defined('APPPATH') OR exit();

class Model
{
    /**
     * @var Database object
     */
	public $db;

	public function __construct()
	{
		if (file_exists(APPPATH . '/core/Database.php')) {
			require_once APPPATH . '/core/Database.php';
			$this->db = new Database;
		} else {
			Error::error('Cannot locate core Database.php');
		}
	}
}