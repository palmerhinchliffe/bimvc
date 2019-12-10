<?php
namespace Config;

defined('APPPATH') OR exit();

class User
{
	const PERSIST_LOGIN_DURATION = (int) (60 * 60 * 24 * 365.25); // 1 Year by default
}
