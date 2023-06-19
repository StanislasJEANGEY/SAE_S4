<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\categorie\CategorieService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class articleByCategorie extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();

        $categorieService = new CategorieService();
        $categories = $categorieService->getCategories();


        $view = Twig::fromRequest($request);
        return $view->render($response, 'setArticleByCategorie.twig', ['categories'=>$categories, 'estConnecte' => $estConnecte]);

    }
}