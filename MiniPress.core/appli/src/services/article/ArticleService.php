<?php

namespace services\article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\api\models\Article;
use services\ServiceException;


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
}