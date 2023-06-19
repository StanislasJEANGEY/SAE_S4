<?php

namespace minipress\api\actions;
use minipress\api\services\categorie\CategorieService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getCategoriesApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new CategorieService();
        $cat = $service->getCategories();
        $data=["type"=>"collection",
            "count"=>count($cat),
            "categories"=>$cat
        ];


        $data = mb_convert_encoding($data, 'UTF-8');
        $data = json_decode( $data, true);
        $data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus(200);
    }
}