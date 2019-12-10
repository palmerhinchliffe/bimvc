<?php
namespace Core;

defined('APPPATH') OR exit();

class User
{
	/**
	* @var int
	*/
	public $id = $auth->getUserId();

	/**
	* @var int
	*/
	public $ip = $auth->getIpAddress();

	/**
	* @var string
	*/
	public $email = $auth->getEmail();

	/**
	* @var string
	*/
	public $username = $auth->getUsername();

	/**
	* @var bool
	*/
	public $is_logged_in = $auth->isLoggedIn();

	/**
	 * Instantiate Delight Auth class
	 */
	public funciton __construct()
	{
		$db = new \Delight\Db\PdoDsn('mysql:dbname=my-database;host=localhost;charset=utf8mb4', 'my-username', 'my-password');
		$auth = new \Delight\Auth\Auth($db);
	}

	public function login($email, $pwd, $remember = \Config\User::PERSIST_LOGIN_DURATION);
	{
		try {
		    $auth->login($email, $pwd, $remember);
		}
		catch (\Delight\Auth\InvalidEmailException $e) {
		    die('Wrong email address');
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
		    die('Wrong password');
		}
		catch (\Delight\Auth\EmailNotVerifiedException $e) {
		    die('Email not verified');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
		    die('Too many requests');
		}
	}

	public function reconfirm_pwd($pwd)
	{
		try {
		    if ($auth->reconfirmPassword($pwd) {
		        return true;
		    }
		    else {
		        return false;
		    }
		}
		catch (\Delight\Auth\NotLoggedInException $e) {
		    die('The user is not signed in');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
		    die('Too many requests');
		}
	}

	public function change_pwd()
	{

	}
}