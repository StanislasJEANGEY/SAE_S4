<?php


use minipress\api\services\utils\Eloquent;
use Slim\Factory\AppFactory as Factory;
use Twig\Loader\FilesystemLoader;


$app = Factory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

Eloquent::init(__DIR__ . '/../conf/gift.db.conf.ini.dist');

return $app;        