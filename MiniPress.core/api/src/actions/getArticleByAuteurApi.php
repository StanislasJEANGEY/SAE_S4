<?php

namespace minipress\api\actions;

use minipress\api\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getArticleByAuteurApi extends AbstractAction
{


    public function __invoke(Request $request, Response $response, array $args): Response {
		$service = new ArticleService();
        $idAuteur = $args['id'];
        $article = $service->getArticlesByAuteur($idAuteur);
        $data = [
            "type" => "collection",
            "count" => count($article),
            "articles" => $article
        ];


        $data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $data = str_replace('\/', '/', $data);

		$response->getBody()->write($data);
		return $response->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus(200);
	}
}