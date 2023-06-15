<?php


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write('<center><h1>Minipress</h1></center>');
        return $response;
    })->setName('home');
    $app->get('/inscription[/]', \App\Actions\InscriptionAction::class)->setName("inscription_get");
    $app->post('/inscription[/]', \App\Actions\InscriptionAction::class)->setName("inscription_post");
    $app->get('/connexion[/]', \minipress\appli\actions\ConnexionAction::class)->setName("connexion_get");
    $app->post('/connexion[/]', \minipress\appli\actions\ConnexionAction::class)->setName("connexion_post");
};
