<?php
namespace Config;

defined('APPPATH') OR exit();

class Config
{
	const BASE_URL = 'http://localhost/bimvc'; // Root project folder WITHOUT trailing slash

	const BASE_CONTROLLER = 'Home'; // Default controller -- MUST be set

	const DB_CONFIG = array(
		'driver'		 => 'pdo_mysql', // Doctrine database driver
		'host'			 => 'localhost',
		'dbname'		 => 'bimvc',
		'user'			 => 'palmer',
		'password'		 => 'password',
	);

	const TWIG_DEBUG = 'true';

	const DOCTRINE_DEV_MODE = true;
}
