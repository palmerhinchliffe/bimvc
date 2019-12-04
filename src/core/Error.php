<?php
namespace Core;

defined('APPPATH') OR exit();

class Error
{
	public static function error($error = 'Undefined error') {
		echo 'Error: ' . $error;
		exit();
	}

}