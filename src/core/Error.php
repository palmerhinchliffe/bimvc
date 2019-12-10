<?php
namespace Core;

defined('APPPATH') OR exit();

class Error
{
	/**
	 * Handles exceptions
	 *
	 **/
	public static function exception($exception)
	{
		if ($log) error_log($exception->get_message(), APPPATH . '/logs/errors.log' . '\n \n');
	}

	public static function error(...$error, $log = false) {

		// Is the error public?
		if (\Config\Config::ENVIRONMENT === 'production') {

		} elseif (\Config\Config::ENVIRONMENT === 'development') {

		}

		// else {}
		// dev error

		if ($log) error_log($error, 3, APPPATH . '/logs/errors.log');

		exit($error=>'development');
	}
}