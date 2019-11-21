<?php
defined('SYSPATH') OR exit();
/* core/Bootstrap.php */
/* Loads core classes */

/* Include composer autoloader */
if (file_exists(ROOTPATH . 'vendor/autoload.php')) {
	require_once ROOTPATH . 'vendor/autoload.php';
} else {
	exit('Cannot locate autoload.php!');
}

/* Instantiate the BIMVC_Router class */
require_once 'Router.php';

// BIMVC_Controller
require_once 'Controller.php';

$BIMVC_RTR = new BIMVC_Router;