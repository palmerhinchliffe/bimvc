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
		// Log exception
		error_log($exception->get_message(), APPPATH . '/logs/errors.log' . '\n \n');
	}

	/**
	 * Handles errors
	 *
	 **/
	public static function error($error)
	{
		// Log error
		error_log($error, 3, APPPATH . '/logs/errors.log');

		// Is the error public?
		if (\Config\Config::ENVIRONMENT === 'production') {
			exit('404');
		} elseif (\Config\Config::ENVIRONMENT === 'development') {
			exit($error);
		}
	}

}