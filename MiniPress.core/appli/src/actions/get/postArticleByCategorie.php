<?php

namespace minipress\appli\actions\set;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class postArticleByCategorie extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new ArticleService();
        $data = $request->getParsedBody();
        $data["titre"] = filter_var($data["titre"], FILTER_SANITIZE_STRING);
        $data["resume"] = filter_var($data["resume"], FILTER_SANITIZE_STRING);
        $data["contenu"] = filter_var($data["contenu"], FILTER_SANITIZE_STRING);
        $data["date_creation"] = filter_var($data["date_creation"], FILTER_SANITIZE_STRING);
        $data["image_url"] = filter_var($data["image_url"], FILTER_SANITIZE_STRING);
        $data["categorie_id"] = filter_var($data["categorie_id"], FILTER_SANITIZE_STRING);
        $data["auteur_id"] = filter_var($data["auteur_id"], FILTER_SANITIZE_STRING);
        $service->setArticle($data["titre"], $data["resume"], $data["contenu"], $data["date_creation"], $data["image_url"], $data["categorie_id"], $data["auteur_id"]);

        $view = Twig::fromRequest($request);
        return $view->render($response, 'AcceuilView.twig');
    }
}