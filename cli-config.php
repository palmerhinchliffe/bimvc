<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require dirname(__FILE__) . '/src/core/Bootstrap.php';

$entity_manager = BIMVC_Database::get_entity_manager();

return ConsoleRunner::createHelperSet($entity_manager);