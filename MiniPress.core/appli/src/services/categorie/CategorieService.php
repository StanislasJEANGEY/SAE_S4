<?php

namespace minipress\appli\services\categorie;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\appli\models\Categorie;
use minipress\appli\services\ServiceException;

class CategorieService {


	function getCategories(): array
    {
		return Categorie::all()->toArray();
	}

	/**
	 * @throws ServiceException
	 */
	function getCategorieById(int $id) {
		try {
			return Categorie::findOrFail($id)->toArray();
		} catch (ModelNotFoundException $e) {
			throw new ServiceException("L'id de la catégorie n'est pas renseigné", 404, $e);
		}
	}

    function setCategories($categorie) {
        $categories = new Categorie();
        $categories->nom = $categorie['nom'];
        try {
            return $categories->save();
        } catch (\Exception $e) {
            throw new ServiceException("La catégorie n'a pas pu être ajoutée", 500, $e);
        }

    }

}