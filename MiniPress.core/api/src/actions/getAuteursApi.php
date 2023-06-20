<?php

namespace minipress\api\actions;

use minipress\api\services\auteur\AuteurService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getAuteursApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new AuteurService();
        $auteurs = $service->getAuteurs();
        $data=["type"=>"collection",
            "count"=>count($auteurs),
            "auteurs"=>$auteurs
        ];

        $data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus(200);
    }
}