<?php
defined('SYSPATH') OR exit();

class BIMVC_Database
{
    /**
     * @var PDO object
     */
	public $conn;

	public function __construct()
	{
        // Attempt DB connection
        try {
            $this->conn = new PDO(
            	'mysql:host=' . BIMVC_Config::DB_HOST . ';dbname=' . BIMVC_Config::DB_NAME, BIMVC_Config::DB_USER, BIMVC_Config::DB_PWD
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            exit($e->getMessage());
        }
	}

	public function __destruct()
	{
        // Disconnect from DB
        $this->conn = null;
	}
}