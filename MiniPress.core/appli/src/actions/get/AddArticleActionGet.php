<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AddArticleActionGet extends AbstractAction {

	/**
	 * @throws RuntimeError
	 * @throws SyntaxError
	 * @throws LoaderError
	 */
	public function __invoke(Request $request, Response $response, array $args): Response {
		$articleService = new ArticleService();
		$articleService->getArticles();
        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();


        $view = Twig::fromRequest($request);

		$view->render($response, 'AddArticleView.twig', ['articles' => $articleService, 'estConnecte' => $estConnecte]);

		return $response;
	}
}