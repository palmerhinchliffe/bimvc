<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(
	array(__DIR__."/src/entities"),
	$isDevMode,
	$proxyDir,
	$cache,
	$useSimpleAnnotationReader
);

// Database configuration parameters
$conn = array(
	'driver'		 => 'pdo_mysql',
	'host'			 => 'localhost',
	'dbname'		 => 'bimvc',
	'user'			 => 'palmer',
	'password'		 => 'password',
);

// Obtain the doctrine entity manager
$entity_manager = EntityManager::create($conn, $config);