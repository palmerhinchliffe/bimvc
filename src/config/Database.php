<?php
namespace Config;

defined('APPPATH') OR exit();

class Database
{
	const DB_CONFIG = array(
		'driver'		 => 'pdo_mysql', // Doctrine database driver
		'host'			 => 'localhost',
		'dbname'		 => 'bimvc',
		'user'			 => 'palmer',
		'password'		 => 'password',
	);
	
	const DOCTRINE_DEV_MODE = true;
}
