<?php

namespace minipress\appli\actions\set;

use minipress\appli\actions\AbstractAction;
use minipress\appli\models\User;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ConnexionAction extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $view = Twig::fromRequest($request);

        if ($request->getMethod() === 'POST') {
            $data = $request->getParsedBody();

            $username = $data['username'];
            $password = $data['password'];

            // Authentifier l'utilisateur
            $success = $authService->authenticateUser($username, $password);

            if ($success) {
                // Rediriger l'utilisateur vers la page d'accueil ou une autre page protégée
                return $response->withRedirect('/');
            } else {
                // Afficher le formulaire de connexion avec un message d'erreur
                return $view->render($response, 'ConnexionView.twig', ['error' => 'Identifiants invalides']);
            }
        }

        return $view->render($response, 'ConnexionView.twig');
    }
}