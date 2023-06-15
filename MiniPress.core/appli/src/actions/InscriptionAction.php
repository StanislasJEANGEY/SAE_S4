<?php

namespace minipress\appli\actions;

use minipress\appli\actions\AbstractAction;
use minipress\appli\models\User;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class InscriptionAction extends AbstractAction
{

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $view = Twig::fromRequest($request);

        if ($request->getMethod() === 'POST') {
            $data = $request->getParsedBody();

            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];

            // Enregistrer l'utilisateur
            $success = $authService->registerUser($username, $email, $password);

            if ($success) {
                // Rediriger l'utilisateur vers la page de connexion ou afficher un message de réussite
                return $response->withRedirect('/connexion');
            } else {
                // Afficher le formulaire d'inscription avec un message d'erreur
                return $view->render($response, 'InscriptionView.twig', ['error' => 'L\'utilisateur existe déjà']);
            }
        }

        return $view->render($response, 'InscriptionView.twig');
    }
}
