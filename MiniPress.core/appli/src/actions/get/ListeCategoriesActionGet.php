<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\categorie\CategorieService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ListeCategoriesActionGet extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();

        $service = new CategorieService();
        $categories = $service->getCategories();
        $view = Twig::fromRequest($request);
        $view->render($response, 'ListeCategoriesView.twig', [
            'categories' => $categories, 'estConnecte' => $estConnecte
        ]);

        return $response;

    }

}