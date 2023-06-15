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

    function setArticle($data): void {
		$article = new Article();
		$article->titre = $data['titre'];
		$article->resume = $data['resume'];
		$article->contenu = $data['contenu'];
		$article->date_creation = $data['date_creation'];
		$article->image_url = $data['image_url'];
		$article->categorie_id = $data['categorie_id'];
		$article->auteur_id = $data['auteur_id'];
		$article->save();
    }

    public function getArticles() :array
    {
        return Article::all()->toArray();
    }
}