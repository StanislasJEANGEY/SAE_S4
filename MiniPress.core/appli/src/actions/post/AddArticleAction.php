<?php

namespace minipress\appli\actions\post;

use minipress\appli\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class AddArticleAction extends AbstractAction {

	public function __invoke(Request $request, Response $response, array $args): Response {
		$routeContext = RouteContext::fromRequest($request);
		$url = $routeContext->getRouteParser()->urlFor('/');

		return $response->withHeader('Location', $url)->withStatus(302);
	}
}