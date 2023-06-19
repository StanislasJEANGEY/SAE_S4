<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class DeconnexionActionGet extends AbstractAction
{


    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $routeContext = RouteContext::fromRequest($request);
        $url = $routeContext->getRouteParser()->urlFor('home');

        $authService->logoutUser();
        return $response->withHeader('Location', $url)->withStatus(302);
    }

}