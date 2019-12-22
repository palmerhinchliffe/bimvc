<?php
namespace Core;

defined('APPPATH') OR exit();

/* core/Bootstrap.php */
/* Loads core classes */

session_start();

/* Include composer autoloader */
if (file_exists(ROOTPATH . '/vendor/autoload.php')) {
	require_once ROOTPATH . '/vendor/autoload.php';
} else {
	exit('Cannot locate autoload.php!');
}

/* App Config */
require_once APPPATH . '/config/Auth.php';
require_once APPPATH . '/config/Config.php';
require_once APPPATH . '/config/Database.php';

/* BIMVC core router */
require_once 'Router.php';

// BIMVC core model
require_once 'Model.php';

// BIMVC core view
require_once 'View.php';

// BIMVC core controller
require_once 'Controller.php';

// BIMVC global helper functions
require_once 'Globals.php';

/* BIMVC core error handler */
require_once 'Error.php';

/* BIMVC core database class */
require_once 'Database.php';

// Instantiate router class and route url!
$router = new Router;