<?php
defined('SYSPATH') OR exit();

class BIMVC_Model
{
    /**
     * @var Database object
     */
	public $db;

	public function __construct()
	{
		if (file_exists(SYSPATH . '/core/Database.php')) {
			require_once SYSPATH . '/core/Database.php';
			$this->db = new BIMVC_Database;
		} else {
			exit('Missing /sys/core/Database.php!');
		}
	}
}