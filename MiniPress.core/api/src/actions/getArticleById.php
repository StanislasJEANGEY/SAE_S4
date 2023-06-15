<?php

namespace minipress\api\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use services\article\ArticleService;

class getArticleById
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new ArticleService();
        $article = $service->getArticlesById('idArticle');
        $data=["type"=>"article",
            "count"=>count($article),
            "article"=>$article
        ];

        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}