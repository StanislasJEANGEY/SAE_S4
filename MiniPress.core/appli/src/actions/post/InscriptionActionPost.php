<?php

namespace minipress\appli\actions\post;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class InscriptionActionPost extends AbstractAction
{

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $view = Twig::fromRequest($request);
        $routeContext = RouteContext::fromRequest($request);
        $url = $routeContext->getRouteParser()->urlFor('connexion_get');

        if ($request->getMethod() === 'POST') {
            $data = $request->getParsedBody();

            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
            $repeatPassword = $data['repeat-password'];

            // Enregistrer l'utilisate ur
            if($password !== $repeatPassword){
                return $view->render($response, 'InscriptionView.twig', ['error' => 'Mot de passe différent']);
            }

            //verifie si l'email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $view->render($response, 'InscriptionView.twig', ['error' => 'Email invalide']);
            }

        $success = $authService->registerUser($username, $email, $password);



        if ($success) {
                // Rediriger l'utilisateur vers la page de connexion ou afficher un message de réussite
                return $response->withHeader('Location', $url);
            } else {
                // Afficher le formulaire d'inscription avec un message d'erreur
                return $view->render($response, 'InscriptionView.twig', ['error' => 'L\'utilisateur existe déjà']);
            }
    }

        return $view->render($response, 'InscriptionView.twig');
}
}