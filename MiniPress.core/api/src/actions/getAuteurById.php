<?php

namespace minipress\api\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use services\auteurs\AuteurService;

class getAuteurById extends AbstractAction
{

	public function __invoke(Request $request, Response $response, array $args): Response {
		$service = new AuteurService();
		$auteur = $service->getAuteurById($args['id']);
		$data = [
			"type" => "collection",
			"count" => count($auteur),
			"auteur" => $auteur
		];

		$response->getBody()->write(json_encode($data));
		return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
	}
}