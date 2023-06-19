<?php

namespace minipress\api\services\article;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\api\models\Article;
use minipress\api\services\ServiceException;


class ArticleService
{
    /**
     * @throws ServiceException
     */
    function getArticlesById(int $idArticle)
    {
        try{
            return Article::findOrFail($idArticle);
        } catch (ModelNotFoundException $e) {
            throw new ServiceException("L'id de l'article n'est pas renseigné");
        }
    }

    function getArticles(): array {
        return Article::all()->toArray();
    }

    function getArticlePublished(): array {
        return Article::where('publie', 1)->get()->toArray();
    }

    function getArticlesByCategorie(int $idCategorie): array {
        return Article::where('categorie_id', $idCategorie)->where('publie', 1)->get()->toArray();
    }

    function getArticlesByAuteur(int $idAuteur): array {
        return Article::where('auteur_id', $idAuteur)->where('publie', 1)->get()->toArray();
    }

    public function getArticlesWithAuteur()
    {
        return Article::with('auteur')->where('publie', 1)->get()->toArray();
    }
}