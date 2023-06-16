<?php

namespace minipress\appli\actions\post;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class ConnexionActionPost extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $view = Twig::fromRequest($request);
        $routeContext = RouteContext::fromRequest($request);
        $url = $routeContext->getRouteParser()->urlFor('home');

        if ($request->getMethod() === 'POST') {
            $data = $request->getParsedBody();

            $username = $data['username'];
            $password = $data['password'];

            // Authentifier l'utilisateur
            $success = $authService->authenticateUser($username, $password);

            if ($success) {
                $response = $response->withHeader('Location', $url)->withStatus(302);
            } else {
                // Afficher le formulaire de connexion avec un message d'erreur
                return $view->render($response, 'ConnexionView.twig', ['error' => 'Identifiants invalides']);
            }
        }

        return $response;
    }

}