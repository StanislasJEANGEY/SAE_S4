<?php

namespace minipress\appli\actions\post;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\article\ArticleService;
use minipress\appli\services\auteurs\AuteurService;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Routing\RouteContext;

class AddArticleActionPost extends AbstractAction {

	/**
	 * @throws ServiceException
	 */
	public function __invoke(Request $request, Response $response, array $args): Response {
		$articleService = new ArticleService();

		$routeContext = RouteContext::fromRequest($request);
		$url = $routeContext->getRouteParser()->urlFor('home');
        $idCateg = $args['id'];

		$authentificationService = new AuthentificationService();
		$user = $authentificationService->getCurrentUser();

		$auteurService = new AuteurService();


        $auteur = $auteurService->getAuteurByUserId($user['id']);
		$idAuteur = $auteur['id'];

		$data = $request->getParsedBody();
		$data['titre'] = filter_var($data['titre']);
		$data['contenu'] = filter_var($data['contenu']);
		$data['resume'] = filter_var($data['resume']);
        $data['categorie'] = $idCateg;
		$data['auteur_id'] = $idAuteur;
		$data['date_creation'] = date("Y-m-d H:i:s");

		try {
			$data['user_id'] = $user['id'];
			$articleService->setArticleByCategorie($data);
		} catch (ServiceException $e) {
			throw new HttpBadRequestException($request, $e->getMessage());
		}

		return $response->withHeader('Location', $url)->withStatus(302);
	}
}