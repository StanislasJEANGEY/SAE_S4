<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('<center><h1>Minipress</h1></center><a href="/inscription">Inscription</a>');
        return $response;
    })->setName('home');
	$app->get('/articles[/]', \minipress\appli\actions\get\AddArticleAction::class)->setName("articles_get");
	$app->post('/articles[/]', \minipress\appli\actions\set\AddArticleAction::class)->setName("articles_post");

	/** Route Authentification */
    $app->get('/inscription[/]', \minipress\appli\actions\InscriptionAction::class)->setName("inscription_get");
    $app->post('/inscription[/]', \minipress\appli\actions\InscriptionAction::class)->setName("inscription_post");
    $app->get('/connexion[/]', \minipress\appli\actions\ConnexionAction::class)->setName("connexion_get");
    $app->post('/connexion[/]', \minipress\appli\actions\ConnexionAction::class)->setName("connexion_post");
};
