<?php

namespace minipress\api\actions;

use minipress\api\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Closure;

class getArticleApi extends AbstractAction
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new ArticleService();
        $article = $service->getArticlePublished();
        $data = [
            "type" => "collection",
            "count" => count($article),
            "article" => $article
        ];
        if (isset($request->getQueryParams()['sort'])) {
            $sort = $request->getQueryParams()['sort'];
            switch ($sort){
                case 'date-asc':
                    usort($data['article'], function ($a, $b) {
                        return strtotime($a['date_creation']) - strtotime($b['date_creation']);
                    });
                    break;
                case 'date-desc':
                    usort($data['article'], function ($a, $b) {
                        return strtotime($b['date_creation']) - strtotime($a['date_creation']);
                    });
                    break;
                case 'auteur':
                    $article = $service->getArticlesWithAuteur();
                    $data = [
                        "type" => "collection",
                        "count" => count($article),
                        "article" => $article
                    ];
                    usort($data['article'], function ($a, $b) {
                        return $a['auteur_id'] - $b['auteur_id'];
                    });
                    break;
            }
        }

        $data = json_encode($data, JSON_PRETTY_PRINT);
        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
