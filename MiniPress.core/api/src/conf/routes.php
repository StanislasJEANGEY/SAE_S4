<?php


use minipress\api\actions\getArticleApi;
use minipress\api\actions\getArticleByIdApi;
use minipress\api\actions\getArticlesByCategorieApi;
use minipress\api\actions\getArticleByAuteurApi;
use minipress\api\actions\getCategoriesApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('<center><h1>Minipress</h1></center>');
        return $response;
    })->setName('home');
$app->get('/api/categories[/]', getCategoriesApi::class)->setName('getCategoriesApi');
$app->get('/api/articles[/]', getArticleApi::class)->setName('getArticleApi');
$app->get('/api/categories/{id}/articles[/]', getArticlesByCategorieApi::class)->setName('getArticlesByCategorieApi');
$app->get('/api/article/{id}[/]', getArticleByIdApi::class)->setName('getArticleByIdApi');
$app->get('/api/auteur/{id}[/]', getArticleByAuteurApi::class)->setName('getArticleByAuteurApi');




};
