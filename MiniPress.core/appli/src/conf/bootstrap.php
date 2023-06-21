<?php


use minipress\appli\services\utils\Eloquent;
use Slim\Factory\AppFactory as Factory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Extra\Markdown\DefaultMarkdown;
use Twig\Extra\Markdown\MarkdownRuntime;
use Twig\RuntimeLoader\RuntimeLoaderInterface;
use Twig\Extra\Markdown\MarkdownExtension;



$app = Factory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

$twig = Twig::create(__DIR__ . '/../views/', ['cache' => false]);
$twig->addExtension(new MarkdownExtension());
$twig->addRuntimeLoader(new class implements RuntimeLoaderInterface {
    public function load($class) {
        if (MarkdownRuntime::class === $class) {
            return new MarkdownRuntime(new DefaultMarkdown());
        }
    }
});
$app->add (TwigMiddleware::create($app, $twig));

Eloquent::init(__DIR__ . '/../conf/conf.ini');

return $app;        