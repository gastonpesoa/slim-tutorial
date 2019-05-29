<?php
require_once 'vendor/autoload.php';
$app = new \Slim\App();
$app->get('/', function (Request $req,  Response $res, $args = []) {
    return $res->withStatus(400)->write('Bad Request');
});
$app->run();
?>