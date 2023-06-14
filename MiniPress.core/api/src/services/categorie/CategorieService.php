<?php

use minipress\api\models\Categorie;
use Slim\Exception\HttpBadRequestException;

class CategorieService{


    function getCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return Categorie::all();
    }

    function getCategorieById(int $id){
        try {
            return Categorie::findOrFail($id)->toArray();
        }catch(\minipress\services\categorie\ModelNotFoundException $e) {
            throw new \minipress\services\categorie\ModelNotFoundException( "L'id de la catégorie n'est pas renseigné", 404, $e);
        }
    }

}