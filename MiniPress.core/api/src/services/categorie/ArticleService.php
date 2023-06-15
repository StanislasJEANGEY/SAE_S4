<?php

use Illuminate\Database\Eloquent\Collection;
use minipress\api\models\Article;
use Slim\Exception\HttpBadRequestException;

class ArticleService
{
    function getArticle(): Collection
    {
        return Article::all();
    }

    function getArticleById(int $id)
    {
        return Article::findOrFail($id)->toArray();
    }

}