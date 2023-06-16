<?php

namespace minipress\appli\actions\post;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class AddUserActionPost extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $view = Twig::fromRequest($request);
        $estConnecte = $authService->getCurrentUser();


        if ($request->getMethod() === 'POST') {
            $data = $request->getParsedBody();

            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
            $role = $data['role'];


            //verifie si l'email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $view->render($response, 'AddUserView.twig', ['error' => 'Email invalide']);
            }

            $success = $authService->registerUser($username, $email, $password, $role);


            if ($success) {
                return $view->render($response, 'AddUserView.twig', ['valid' => 'Utilisateur créer avec succès', 'estConnecte' => $estConnecte]);
            } else {
                // Afficher le formulaire d'inscription avec un message d'erreur
                return $view->render($response, 'AddUserView.twig', ['error' => 'L\'utilisateur existe déjà']);
            }
        }

        return $response;
    }

}