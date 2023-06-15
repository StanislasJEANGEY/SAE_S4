<?php

namespace minipress\appli\actions\get;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AddArticleAction extends AbstractAction {

	/**
	 * @throws RuntimeError
	 * @throws SyntaxError
	 * @throws LoaderError
	 */
	public function __invoke(Request $request, Response $response, array $args): Response {
		$articleService = new ArticleService();
		$view = Twig::fromRequest($request);

		$data = $request->getParsedBody();
		$data['titre'] = filter_var($data['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$data['contenu'] = filter_var($data['contenu'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$data['resume'] = filter_var($data['resume'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		try {
			$articleService->setArticle($data);
		} catch (ServiceException $e) {
			throw new HttpBadRequestException($request, $e->getMessage());
		}

		$view->render($response, 'AddArticleView.twig');

		return $response;
	}
}