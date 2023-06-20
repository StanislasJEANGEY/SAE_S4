<?php

namespace minipress\appli\actions\post;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\auteurs\AuteurService;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class AddArticleByCategoriePost extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $auteurService = new AuteurService();
        $authService = new AuthentificationService();
        $estConnecte = $authService->getCurrentUser();
        $auteur = $auteurService->getAuteurByUserId($estConnecte['id']);
        var_dump($data);
        $data['categorie'] = filter_var($data['categorie'], FILTER_SANITIZE_NUMBER_INT);
        $data['titre'] = filter_var($data['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['contenu'] = filter_var($data['contenu'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['resume'] = filter_var($data['resume'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['date_creation'] = date("Y-m-d H:i:s");
        $data['auteur_id'] = $auteur['id'];

        $articleService = new ArticleService();

        try {
            $articleService->setArticleByCategorie($data);
        } catch (ServiceException $e) {
            $response->getBody()->write($e->getMessage());
        }

        $url = RouteContext::fromRequest($request)->getRouteParser()->urlFor('home');
        return $response->withStatus(302)->withHeader('Location', $url);
    }
}