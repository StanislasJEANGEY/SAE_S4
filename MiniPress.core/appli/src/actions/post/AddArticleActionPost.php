<?php

namespace minipress\appli\actions\post;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Routing\RouteContext;

class AddArticleActionPost extends AbstractAction {

	public function __invoke(Request $request, Response $response, array $args): Response {
		$articleService = new ArticleService();
		$routeContext = RouteContext::fromRequest($request);
		$url = $routeContext->getRouteParser()->urlFor('home');
        $idCateg = $args['id'];

		$data = $request->getParsedBody();
		$data['titre'] = filter_var($data['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$data['contenu'] = filter_var($data['contenu'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$data['resume'] = filter_var($data['resume'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['categorie'] = $idCateg;
		$data['date_creation'] = date("Y-m-d H:i:s");

		try {
			$articleService->setArticleByCategorie($data);
		} catch (ServiceException $e) {
			throw new HttpBadRequestException($request, $e->getMessage());
		}

		return $response->withHeader('Location', $url)->withStatus(302);
	}
}