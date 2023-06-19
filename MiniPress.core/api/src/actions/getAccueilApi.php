<?php

namespace minipress\api\actions;

use minipress\api\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getAccueilApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $links = "http://docketu.iutnc.univ-lorraine.fr:18086";
        $data = '
{
  "description": "L\'API Minipress permet d\'accéder aux articles, aux auteurs et aux catégories d\'articles d\'une plateforme de publication en ligne.",
  "links": [
    {
      "route": "'. $links .'/api/categories",
      "method": "GET",
      "description": "Récupère la liste complète des catégories disponibles.",
      "name": "getCategoriesApi"
    },
    {
      "route": "'. $links .'/api/articles",
      "method": "GET",
      "description": "Récupère la liste complète des articles disponibles.",
      "name": "getArticleApi"
    },
    {
      "route": "'. $links .'/api/categories/{id}/articles",
      "method": "GET",
      "description": "Récupère les articles d\'une catégorie spécifique identifiée par son ID.",
      "name": "getArticlesByCategorieApi"
    },
    {
      "route": "'. $links .'/api/article/{id}",
      "method": "GET",
      "description": "Récupère les détails d\'un article spécifique identifié par son ID.",
      "name": "getArticleByIdApi"
    },
    {
      "route": "'. $links .'/api/auteur/{id}/articles",
      "method": "GET",
      "description": "Récupère les articles d\'un auteur spécifique identifié par son ID.",
      "name": "getArticleByAuteurApi"
    }
  ]
}';
        $data = mb_convert_encoding($data, 'UTF-8');
        $data = json_decode($data, true);
        $data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $data = str_replace('\/', '/', $data);

        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus(200);

    }
}