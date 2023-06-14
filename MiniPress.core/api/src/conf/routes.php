<?php



;

use minipress\api\actions\getCategoriesByApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
$app->get('/api/categories[/]', getCategoriesByApi::class)->setName('getCategoriesByApiAction');
$app->get('/api/articles[/]', getArticlesByApi::class)->setName('getArticlesByApiAction');
$app->get('/api/categories/{id}/articles', getArticlesByCategorie::class)->setName('getArticlesByCategorieAction');
$app->get('/api/articles/{id}', getArticleById::class)->setName('getArticleByIdAction');
$app->get('/api/auteur/{id}', getAuteurById::class)->setName('getAuteurByIdAction');




};
