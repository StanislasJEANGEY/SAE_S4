<?php

namespace minipress\appli\actions\post;

use minipress\appli\actions\AbstractAction;
use minipress\appli\services\categorie\CategorieService;
use minipress\appli\services\ServiceException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class FormulaireCategories extends AbstractAction
{

    /**
     * @throws ServiceException
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $categories = new CategorieService();
        $data = $request->getParsedBody();
        $data['nom'] = filter_var($data['nom'], FILTER_SANITIZE_SPECIAL_CHARS);
        $success = $categories->setCategories($data);
        $view = Twig::fromRequest($request);
        $routeContext = RouteContext::fromRequest($request);
        $url = $routeContext->getRouteParser()->urlFor('home');
        if ($success) {
            $response = $response->withHeader('Location', $url)->withStatus(302);
        } else {
            // Afficher le formulaire de connexion avec un message d'erreur
            return $view->render($response, 'ConnexionView.twig', ['error' => 'Identifiants invalides']);
        }
        return $response;
    }
}


