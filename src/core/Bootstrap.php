<?php
namespace Core;

defined('APPPATH') OR exit();

/* core/Bootstrap.php */
/* Loads core classes */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/* Include composer autoloader */
if (file_exists(ROOTPATH . '/vendor/autoload.php')) {
	require_once ROOTPATH . '/vendor/autoload.php';
} else {
	exit('Cannot locate autoload.php!');
}

/* App Config */
require_once APPPATH . '/config/Config.php';

/* BIMVC core router */
require_once 'Router.php';

// BIMVC core controller
require_once 'Controller.php';

// BIMVC core model
require_once 'Model.php';

// BIMVC global helper functions
require_once 'Globals.php';

/* BIMVC core error handler */
require_once 'Error.php';

// Load doctrine ORM
//$entity_manager = Database::get_entity_manager();

// Instantiate router class and route url!
$BIMVC_RTR = new Router;