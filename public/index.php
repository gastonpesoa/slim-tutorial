<?php
require_once __DIR__.'/../src/settings.php';
$settings = new Settings();
require_once $settings->vendor . '/autoload.php';
//require_once $settings->ormModels . '/User.php';

$config = $settings->config; 
$app = new \Slim\App($config);
require_once $settings->dependencies;
require_once $settings->routes;

$app->run();
?>