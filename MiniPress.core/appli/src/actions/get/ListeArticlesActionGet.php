<?php

namespace minipress\appli\actions\get;

use minipress\appli\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class ListeArticlesActionGet extends \minipress\appli\actions\AbstractAction
{

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new ArticleService();
        $articles = $service->getArticles();

        $view = Twig::fromRequest($request);
        $view->render($response, 'ListeArticlesView.twig', [
            'articles' => $articles
        ]);

        return $response;

    }
}