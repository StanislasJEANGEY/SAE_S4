<?php




use models\Categorie;
use Slim\Exception\HttpBadRequestException;

class CategorieService{


    function getCategories(){
        $categories = Categorie::all();
        return $categories;
    }

    function getCategorieById(int $id){
        try {
            return Categorie::findOrFail($id)->toArray();
        }catch(\gift\app\services\categorie\ModelNotFoundException $e) {
            throw new HttpBadRequestException($request, "L'id de la catégorie n'est pas renseigné");
        }
    }

}