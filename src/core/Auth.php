<?php
namespace Core;

defined('APPPATH') OR exit();

class Auth
{
	public function __construct()
	{
		$db = new Database;
		$pdo = $db->pdo();
		$this->auth = new \Delight\Auth\Auth($pdo);
	}

	public function login($email, $pwd, $remember = \Config\Auth::PERSIST_LOGIN_DURATION);
	{
		if ($auth->login($email, $pwd, $remember)) {
	        return true;
	    }
	    else {
	        return false;
	    }
	}

	public function reconfirm_pwd($pwd)
	{
	    if ($auth->reconfirmPassword($pwd)) {
	        return true;
	    }
	    else {
	        return false;
	    }
	}
}