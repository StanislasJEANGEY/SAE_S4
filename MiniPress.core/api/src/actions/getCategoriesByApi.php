<?php

namespace gift\api\getApi;
use actions\AbstractAction;
use CategorieService;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getCategoriesByApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new CategorieService();
        $cat = $service->getCategories();
        $routeContext = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        foreach ($cat as $key => $value) {
            $cat[$key]['links'] = $routeContext->urlFor('getCategoriesByIdAction', ['id' => $value['id']]);
        }
        $data=["type"=>"collection",
            "count"=>count($cat),
            "categories"=>$cat
        ];

        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}