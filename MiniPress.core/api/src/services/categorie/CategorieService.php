<?php

use minipress\api\models\Categorie;
use minipress\services\ServiceException;
use Slim\Exception\HttpBadRequestException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategorieService{


    function getCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return Categorie::all();
    }

    function getCategorieById(int $id){
        try {
            return Categorie::findOrFail($id)->toArray();
        }catch(ModelNotFoundException $e) {
            throw new ServiceException( "L'id de la catégorie n'est pas renseigné", 404, $e);
        }
    }

}