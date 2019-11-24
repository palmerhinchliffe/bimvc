<?php
defined('SYSPATH') OR exit();

class BIMVC_Database
{
    /**
     * @var PDO object
     */
	public $pdo;

	public function __construct()
	{
        // Attempt DB connection
        try {
            $dsn = 'mysql:host=' . BIMVC_Config::DB_HOST . ';dbname=' . BIMVC_Config::DB_NAME;
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
            ];
            $this->pdo = new PDO($dsn, BIMVC_Config::DB_USER, BIMVC_Config::DB_PWD, $options);
        }
        catch(PDOException $e) {
            exit($e->getMessage());
        }
	}

    public function select_all($table)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM animals');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

	public function __destruct()
	{
        // Disconnect from DB
        $this->conn = null;
	}
}