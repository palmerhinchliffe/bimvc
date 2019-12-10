<?php
namespace Core;

defined('APPPATH') OR exit();

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Database
{
    // Doctrine entity manager
    public static function get_entity_manager() {
        $path = array(APPPATH . '/entities');
        try {
        	$db_params = \Config\Database::DB_CONFIG;
        	$config = Setup::createAnnotationMetadataConfiguration($path, \Config\Database::DOCTRINE_DEV_MODE);
        	$entity_manager = EntityManager::create($db_params, $config);
        }
        catch(exception $e) {
        	echo var_dump($e);
        }
        return $entity_manager;
    }
}