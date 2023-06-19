<?php

namespace minipress\api\actions;

use minipress\api\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getArticlesByCategorieApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new ArticleService();
        $idCateg = $args['id'];
        $cat = $service->getArticlesByCategorie($idCateg);
        $data=["type"=>"collection",
            "count"=>count($cat),
            "categories"=>$cat
        ];

        $data = mb_convert_encoding($data, 'UTF-8');
        $data = json_decode($data, true);
        $data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus(200);
    }
}