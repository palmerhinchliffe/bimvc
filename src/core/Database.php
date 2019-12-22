<?php
namespace Core;

defined('APPPATH') OR exit();

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Database
{
    public function __construct()
    {
        
    }

    // Doctrine entity manager
    public static function get_entity_manager()
    {
        $path = array(APPPATH . '/core/entities');
        $db_params = \Config\Database::DB_CONFIG;
        $config = Setup::createAnnotationMetadataConfiguration($path, \Config\Database::DOCTRINE_DEV_MODE);
        $entity_manager = EntityManager::create($db_params, $config);
        return $entity_manager;
    }

    // PDO Connection
    private function pdo()
    {
        $db_params = \Config\Database::DB_CONFIG;
        $pdo = new PDO(
            'mysql:dbname= ' . $db_params['dbname'] . ';host=' . $db_params['host'] . ';charset=utf8mb4',
            $db_params['user'],
            $db_params['pwd']
        );
        return $pdo;
    }
}