<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\auth\AuthentificationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ProfilActionGet extends AbstractAction
{


    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $view = Twig::fromRequest($request);
        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();


        return $view->render($response, 'ProfilView.twig', [
            'estConnecte' => $estConnecte,
        ]);
    }

}