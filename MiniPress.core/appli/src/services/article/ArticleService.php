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
    function getArticlesById(int $idArticle) : array
    {
        try{
            return Article::findOrFail($idArticle)->toArray();
        } catch (ModelNotFoundException $e) {
            throw new ServiceException("L'id de l'article n'est pas renseigné");
        }
    }

    /**
     * @throws ServiceException
     */
    function setArticle($data): void {
        try {
            $article = new Article();
            $article->titre = $data['titre'];
            $article->resume = $data['resume'];
            $article->contenu = $data['contenu'];
            $article->save();
        }catch (ModelNotFoundException $e) {
            throw new ServiceException("Une erreur s'est produite lors de l'enregistrement de l'article");
        }

    }
    function setArticleByCategorie($data): void
    {
        try {
            $article = new Article();
            $article->titre = $data['titre'];
            $article->resume = $data['resume'];
            $article->contenu = $data['contenu'];
            $article->categorie_id = $data['categorie'];
            $article->save();
        }catch (ModelNotFoundException $e) {
            throw new ServiceException("Une erreur s'est produite lors de l'enregistrement de l'article");
        }
    }

    public function getArticles() :array
    {
        return Article::all()->toArray();
    }

    public function getArticlesByCategorie(mixed $id)
    {
        return Article::where('categorie_id', $id)->get()->toArray();
    }

    function modifyPubArticle($id){
        $article = Article::find($id);
        if($article->publie == 0){
            $article->publie = 1;
        }else{
            $article->publie = 0;
        }
        $article->save();
    }
}