<?php

use minipress\appli\actions\get\ConnexionAction;
use minipress\appli\actions\get\InscriptionAction;
use minipress\appli\actions\get\ListeArticlesAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('<center><h1>Minipress</h1></center><a href="/inscription">Inscription</a>');
        return $response;
    })->setName('home');
    $app->get('/articles[/]', ListeArticlesAction::class)->setName("liste_articles_get");
    $app->get('/articles/{id}[/]', ArticleAction::class)->setName("article_get");
	$app->get('/add_articles[/]', \minipress\appli\actions\get\AddArticleAction::class)->setName("articles_get");
	$app->post('/add_articles[/]', \minipress\appli\actions\post\AddArticleAction::class)->setName("add_articles_post");
	$app->get('/appli/setArticleByCategorie',  minipress\appli\actions\post\setArticleByCategorie::class)->setName('setArticleByCategorie');

	/** Route Authentification */
    $app->get('/inscription[/]', InscriptionAction::class)->setName("inscription_get");
    $app->post('/inscription[/]', InscriptionAction::class)->setName("inscription_post");
    $app->get('/connexion[/]', ConnexionAction::class)->setName("connexion_get");
    $app->post('/connexion[/]', ConnexionAction::class)->setName("connexion_post");
};
