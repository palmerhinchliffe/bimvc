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

/* Set constants for root, application, and system directories */
/***************************************************************/
$root_path = dirname(__DIR__, 1) . '/'; // domain.com/
$sys_path = $root_path . '/sys/'; // domain.com/src/sys
$app_path = $root_path . '/app/'; // domain.com/src/app

define('ROOTPATH', $root_path);
is_dir($sys_path) ? define('SYSPATH', $sys_path) : exit("Configuration error : /src/sys/ directory missing.");
is_dir($app_path) ? define('APPPATH', $app_path) : exit("Configuration error: /src/app/ directory missing.");

/* Load the bootstrap file to kick things off */
/**********************************************/
require_once SYSPATH . 'core/Bootstrap.php';