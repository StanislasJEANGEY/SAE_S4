<?php

namespace minipress\api\actions;

use minipress\api\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getArticleApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new ArticleService();
        $article = $service->getArticles();
        $data=["type"=>"collection",
            "count"=>count($article),
            "article"=>$article
        ];

        $data = json_encode($data, JSON_PRETTY_PRINT);
        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}