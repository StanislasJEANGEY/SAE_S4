<?php

namespace minipress\api\services\article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\api\models\Article;
use minipress\services\ServiceException;
use Slim\Exception\HttpBadRequestException;


class ArticleService
{
    function getArticlesById(int $idArticle)
    {
        try{
            return Article::findOrFail($idArticle);
        } catch (ModelNotFoundException $e) {
            throw new ServiceException("L'id de l'article n'est pas renseigné");
        }
    }
}