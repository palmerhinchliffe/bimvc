<?php
/* PHP error settings */
define('ENVIRONMENT', isset($_SERVER['BIMVC_ENVIRONMENT']) ? $_SERVER['BIMVC_ENVIRONMENT'] : 'development');

switch(ENVIRONMENT) {
	case 'development':
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
	break;

	case 'production':
		ini_set('display_errors', 0);
	break;

	default:
		exit("Environment not configured correctly."); // EXIT_ERROR
	break;
}

/* Set constant for application directory */
/******************************************/
$root_path = dirname(__DIR__, 1); // domain.com/
$app_path = $root_path . '/src'; // domain.com/app

define('ROOTPATH', $root_path);
is_dir($app_path) ? define('APPPATH', $app_path) : exit("Configuration error: project directory missing.");

/* Load the bootstrap file to kick things off */
/**********************************************/
require_once APPPATH . '/core/Bootstrap.php';