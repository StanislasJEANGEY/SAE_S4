<?php


use minipress\appli\services\utils\Eloquent;
use Slim\Factory\AppFactory as Factory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;


$app = Factory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

$twig = Twig::create(__DIR__ . '/../views/', ['cache' => false]);
$app->add (TwigMiddleware::create($app, $twig));

Eloquent::init(__DIR__ . '/../conf/conf.ini');

return $app;        