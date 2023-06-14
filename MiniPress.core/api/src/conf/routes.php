<?php


use minipress\api\actions\getArticleByIdByApi;
use minipress\api\actions\getArticlesByApi;
use minipress\api\actions\getArticlesByCategorie;
use minipress\api\actions\getAuteurById;
use minipress\api\actions\getCategoriesByApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('<center><h1>Minipress</h1></center>');
        return $response;
    })->setName('home');
$app->get('/api/categories[/]', getCategoriesByApi::class)->setName('getCategoriesByApiAction');
$app->get('/api/articles[/]', getArticlesByApi::class)->setName('getArticlesByApiAction');
$app->get('/api/categories/{id}/articles', getArticlesByCategorie::class)->setName('getArticlesByCategorieAction');
$app->get('/api/articles/{id}', getArticleByIdByApi::class)->setName('getArticleByIdAction');
$app->get('/api/auteur/{id}', getAuteurById::class)->setName('getAuteurByIdAction');




};
