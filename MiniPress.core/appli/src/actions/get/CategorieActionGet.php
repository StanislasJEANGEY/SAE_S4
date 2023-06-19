<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\categorie\CategorieService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class CategorieActionGet extends AbstractAction
{

    /**
     * @throws SyntaxError
     * @throws ServiceException
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();

        $service = new ArticleService();
        $categService = new CategorieService();
        $idCateg = $args['id'];
        $categ = $categService->getCategorieById($idCateg);
        $article = $service->getArticlesByCategorie($idCateg);

        $view = Twig::fromRequest($request);
        $view->render($response, 'CategorieView.twig', [
            'articles' => $article, 'estConnecte' => $estConnecte, 'categorie' => $categ
        ]);
        return $response;
    }

}