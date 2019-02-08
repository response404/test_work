<?php

define('DIR', __DIR__);
function autoLoader($className)
{
    //фикс для путей под линух
    $className = str_replace('\\', '/', $className);
    include DIR . '/../' . $className . '.php';
}

spl_autoload_register(__NAMESPACE__ . '\autoLoader');

$app = new \components\Application();
$app->run();
