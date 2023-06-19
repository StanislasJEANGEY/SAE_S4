<?php
namespace minipress\appli\actions\post;
use minipress\appli\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;

class ListeArticlesActionPost extends \minipress\appli\actions\AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $articleService = new ArticleService();
        $articleService->modifyPubArticle($data['id']);

        $url = RouteContext::fromRequest($request)->getRouteParser()->urlFor('liste_articles_get');
        return $response->withHeader('Location', $url)->withStatus(302);
    }
}