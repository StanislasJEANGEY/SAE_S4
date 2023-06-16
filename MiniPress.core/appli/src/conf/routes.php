<?php

use minipress\appli\actions\get\AddUserActionGet;
use minipress\appli\actions\get\AddArticleActionGet;
use minipress\appli\actions\get\ArticleActionGet;
use minipress\appli\actions\get\AccueilActionGet;
use minipress\appli\actions\get\ConnexionActionGet;
use minipress\appli\actions\get\DeconnexionActionGet;
use minipress\appli\actions\get\InscriptionActionGet;
use minipress\appli\actions\get\ListeArticlesActionGet;
use minipress\appli\actions\post\AddArticleByCategoriePost;
use minipress\appli\actions\post\AddArticleActionPost;
use minipress\appli\actions\get\ProfilActionGet;
use minipress\appli\actions\post\AddUserActionPost;
use minipress\appli\actions\post\ConnexionActionPost;
use minipress\appli\actions\post\InscriptionActionPost;

return function (\Slim\App $app): void {
    $app->get('/', AccueilActionGet::class)->setName("home");
    $app->get('/articles[/]', ListeArticlesActionGet::class)->setName("liste_articles_get");
    $app->get('/articles/{id}[/]', ArticleActionGet::class)->setName("article_get");
	$app->get('/add_articles[/]', AddArticleActionGet::class)->setName("add_articles_get");
	$app->post('/add_articles[/]', AddArticleActionPost::class)->setName("add_articles_post");
	$app->get('/appli/setArticleByCategorie',  AddArticleByCategoriePost::class)->setName('add_articleByCategorie_get');
	$app->post('/appli/articleByCategorie', AddArticleByCategoriePost::class)->setName('add_articleByCategorie_post');

	/** Route Authentification */
    $app->get('/inscription[/]', InscriptionActionGet::class)->setName("inscription_get");
    $app->post('/inscription[/]', InscriptionActionPost::class)->setName("inscription_post");
    $app->get('/connexion[/]', ConnexionActionGet::class)->setName("connexion_get");
    $app->post('/connexion[/]', ConnexionActionPost::class)->setName("connexion_post");
    $app->get('/profil/{id}[/]', ProfilActionGet::class)->setName("profil_get");
    $app->get('/deconnexion[/]', DeconnexionActionGet::class)->setName("deconnexion_get");

    /** Route admin */
    $app->get('/addUser[/]', AddUserActionGet::class)->setName("add_user_get");
    $app->post('/addUser[/]', AddUserActionPost::class)->setName("add_user_post");
};
