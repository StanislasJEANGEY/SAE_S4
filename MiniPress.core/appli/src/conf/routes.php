<?php


use minipress\appli\actions\InscriptionAction;
use minipress\api\actions\getArticleByIdByApi;
use minipress\api\actions\getArticlesByCategorie;
use minipress\api\actions\getAuteurById;
use minipress\api\actions\getCategoriesByApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('<center><h1>Minipress</h1></center><a href="/inscription">Inscription</a>');
        return $response;
    })->setName('home');
    $app->get('/appli/setArticleByCategorie',  minipress\appli\actions\set\setArticleByCategorie::class)->setName('setArticleByCategorie');
    $app->get('/inscription[/]', \App\Actions\InscriptionAction::class)->setName("inscription_get");
    $app->post('/inscription[/]', \App\Actions\InscriptionAction::class)->setName("inscription_post");
    $app->get('/connexion[/]', \minipress\appli\actions\ConnexionAction::class)->setName("connexion_get");
    $app->post('/connexion[/]', \minipress\appli\actions\ConnexionAction::class)->setName("connexion_post");
};
