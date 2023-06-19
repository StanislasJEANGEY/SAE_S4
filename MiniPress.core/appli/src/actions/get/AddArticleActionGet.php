<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\auteurs\AuteurService;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AddArticleActionGet extends AbstractAction {

	/**
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 * @return Response
	 * @throws LoaderError
	 * @throws RuntimeError
	 * @throws SyntaxError
	 * @throws ServiceException
	 */
	public function __invoke(Request $request, Response $response, array $args): Response {
		$articleService = new ArticleService();
		$article = $articleService->getArticles();

        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();
        $idCateg = $args['id'];

		$auteurService = new AuteurService();
		$auteurs = $auteurService->getAuteurByUserId($estConnecte['id']);

        $view = Twig::fromRequest($request);

		$view->render($response, 'AddArticleView.twig', ['article' => $article, 'estConnecte' => $estConnecte, 'idCateg' => $idCateg, 'auteurs' => $auteurs]);

		return $response;
	}
}