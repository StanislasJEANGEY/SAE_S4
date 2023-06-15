<?php

namespace minipress\api\actions;

use minipress\api\services\article\ArticleService;
use minipress\api\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class getArticleByIdApi
{

    /**
     * @throws ServiceException
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new ArticleService();
        $article = $service->getArticlesById($args['id']);
        $data=["type"=>"article",
            "article"=>$article
        ];

        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}