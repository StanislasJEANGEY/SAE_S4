<?php

namespace minipress\appli\actions\get;

use minipress\appli\services\article\ArticleService;
use minipress\appli\services\categorie\CategorieService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ArticlesByCategorieActionGet extends \minipress\appli\actions\AbstractAction
{

    /**
     * @throws SyntaxError
     * @throws ServiceException
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $articleService = new ArticleService();
        $articles = $articleService->getArticlesByCategorie($args['id']);
        $categorieService = new CategorieService();
        $categorie = $categorieService->getCategorieById($args['id']);
        $view = Twig::fromRequest($request);
        $view->render($response, 'ArticlesByCategorieView.twig', [
            'articles' => $articles, 'categorie' => $categorie
        ]);

        return $response;
    }
}