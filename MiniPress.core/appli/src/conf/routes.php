<?php

use minipress\appli\actions\get\ArticleAction;
use minipress\appli\actions\get\AccueilActionGet;
use minipress\appli\actions\get\ConnexionActionGet;
use minipress\appli\actions\get\DeconnexionActionGet;
use minipress\appli\actions\get\InscriptionActionGet;
use minipress\appli\actions\get\ListeArticlesAction;
use minipress\appli\actions\get\ProfilActionGet;
use minipress\appli\actions\post\ConnexionActionPost;
use minipress\appli\actions\post\InscriptionActionPost;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', AccueilActionGet::class)->setName("home");
    $app->get('/articles[/]', ListeArticlesAction::class)->setName("liste_articles_get");
    $app->get('/articles/{id}[/]', ArticleAction::class)->setName("article_get");
	$app->get('/add_articles[/]', \minipress\appli\actions\get\AddArticleAction::class)->setName("articles_get");
	$app->post('/add_articles[/]', \minipress\appli\actions\post\AddArticleAction::class)->setName("add_articles_post");
	$app->get('/appli/setArticleByCategorie',  minipress\appli\actions\post\setArticleByCategorie::class)->setName('setArticleByCategorie');

	/** Route Authentification */
    $app->get('/inscription[/]', InscriptionActionGet::class)->setName("inscription_get");
    $app->post('/inscription[/]', InscriptionActionPost::class)->setName("inscription_post");
    $app->get('/connexion[/]', ConnexionActionGet::class)->setName("connexion_get");
    $app->post('/connexion[/]', ConnexionActionPost::class)->setName("connexion_post");
    $app->get('/profil/{id}[/]', ProfilActionGet::class)->setName("profil_get");
    $app->get('/deconnexion[/]', DeconnexionActionGet::class)->setName("deconnexion_get");

};
