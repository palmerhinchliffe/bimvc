<?php
namespace Config;

defined('APPPATH') OR exit();

class Database
{
	const DB_CONFIG = array(
		'driver'		 => 'pdo_mysql',
		'host'			 => 'localhost',
		'dbname'		 => '',
		'user'			 => '',
		'password'		 => '',
	);
	
	const DOCTRINE_DEV_MODE = false;
}
