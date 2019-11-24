<?php
defined('SYSPATH') OR exit();
/* core/Bootstrap.php */
/* Loads core classes and routes URL */

/* Include composer autoloader */
if (file_exists(ROOTPATH . '/vendor/autoload.php')) {
	require_once ROOTPATH . '/vendor/autoload.php';
} else {
	exit('Cannot locate autoload.php!');
}

//
//
/* Put below require statements into try/catch -- throw error if any of them are missing...
//
//
/* Config */
require_once APPPATH . '/config/Config.php';

/* BIMVC_Router class */
require_once 'Router.php';

// BIMVC_Controller -- base controller
require_once 'Controller.php';

// BIMVC_Model -- base model class
require_once 'Model.php';

// Instantiate router class and route url!
$BIMVC_RTR = new BIMVC_Router;