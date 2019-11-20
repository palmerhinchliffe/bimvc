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
$root_path = dirname(__DIR__, 1); // domain.com/
$sys_path = $root_path . '/src/sys/'; // domain.com/src/sys
$app_path = $root_path . '/src/app/'; // domain.com/src/app

define('ROOTPATH', $root_path);

is_dir($sys_path) ? define('SYSPATH', $sys_path) : exit("Configuration error : /src/sys/ directory missing.");
is_dir($app_path) ? define('APPPATH', $app_path) : exit("Configuration error: /src/app/ directory missing.");


$url = parse_url($_SERVER['REQUEST_URI']);
$segments = explode('/', $url['path']);

$controller = isset($segments[1]) ? $segments[1] : null;
$action = isset($segments[2]) ? $segments[2] : null;

// Remove controller and method from split url
unset($segments[0], $segments[1], $segments[2]);

// Rebase array keys and store the URL params
$params = array_values($segments);


echo $controller;
echo $action;
echo var_dump($params);


/* Load the bootstrap file to kick things off */
/**********************************************/
//require_once(SYSPATH . '/core/Bootstrap.php');