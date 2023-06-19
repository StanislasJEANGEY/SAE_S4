<?php

namespace minipress\appli\actions\get;

use minipress\appli\services\article\ArticleService;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ArticleActionGet extends \minipress\appli\actions\AbstractAction
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
        $idArticle = $args['id'];
        $article = $service->getArticlesById($idArticle);

        $view = Twig::fromRequest($request);
        $view->render($response, 'ArticleView.twig', [
            'article' => $article, 'estConnecte' => $estConnecte
        ]);
        return $response;
    }
}