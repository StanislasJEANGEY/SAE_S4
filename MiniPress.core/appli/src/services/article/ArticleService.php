<?php

namespace minipress\appli\services\article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\appli\models\Article;
use minipress\appli\services\ServiceException;


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

    function setArticle($titre, $resume, $contenu, $date_creation, $image_url, $categorie_id, $auteur_id){
        $article = new Article();
        $article->titre = $titre;
        $article->resume = $resume;
        $article->contenu = $contenu;
        $article->date_creation = $date_creation;
        $article->image_url = $image_url;
        $article->categorie_id = $categorie_id;
        $article->auteur_id = $auteur_id;
        $article->save();
    }

    public function getArticles() :array
    {
        return Article::all()->toArray();
    }
}