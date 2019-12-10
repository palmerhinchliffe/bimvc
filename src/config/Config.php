<?php
namespace Config;

defined('APPPATH') OR exit();

class Config
{
	const BASE_URL = 'http://localhost/bimvc'; // Root project dir WITHOUT trailing slash

	const BASE_CONTROLLER = 'Home'; // Default controller -- MUST be set

	const TWIG_DEBUG = 'true';
}
