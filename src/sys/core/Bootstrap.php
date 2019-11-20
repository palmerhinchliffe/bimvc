<?php
defined(SYSPATH) OR exit();

/* core/Bootstrap.php */
/* Loads core classes */

/* Include composer autoloader */
if (file_exists(ROOTPATH . 'vendor/autoload.php')) {
	// Autoloader exists
	// load it...
} else {
	exit('Cannot locate ' . ROOTPATH . 'vendor/autoload.php!');
}

/* Load router */

// Test code
echo (parse_url($_SERVER['REQUEST_URI']));
