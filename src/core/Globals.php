<?php
namespace Core;

defined('APPPATH') OR exit();

/* Global functions */
function redirect($controller = \Config\Config::BASE_CONTROLLER, $method = "")
{
    $path = '/' . $controller . '/' . $method;
    header('Location: ' . \config\Config::BASE_URL . $path, true, 302);
    exit();
}