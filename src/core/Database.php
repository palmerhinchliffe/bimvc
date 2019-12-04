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
        $db_params = BIMVC_Config::DB_CONFIG;
        $config = Setup::createAnnotationMetadataConfiguration($path, BIMVC_Config::DOCTRINE_DEV_MODE);
        $entity_manager = EntityManager::create($db_params, $config);
        return $entity_manager;
    }
}