<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class AddUserActionGet extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $view = Twig::fromRequest($request);
        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();
        $routeContext = RouteContext::fromRequest($request);
        $url = $routeContext->getRouteParser()->urlFor('home');

        if ($estConnecte['role'] != 2){
            return $response->withHeader('Location', $url)->withStatus(302);
        }

        return $view->render($response, 'AddUserView.twig', [
            'estConnecte' => $estConnecte,
        ]);
    }

}