<?php
$container = $app->getContainer();

$container['logger'] = function($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $file_processor = new \Monolog\Processor\UidProcessor();
    $logger->pushProcessor($file_processor);
    $file_handler = new \Monolog\Handler\StreamHandler($settings['path']);
    $logger->pushHandler($file_handler, \Monolog\Logger::DEBUG);
    return $logger;
};

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
//pass the connection to global container (created in previous article)
$container['db'] = function ($container) use ($capsule){
   return $capsule;
};

?>