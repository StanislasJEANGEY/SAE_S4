<?php

namespace minipress\appli\services\categorie;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\api\models\Categorie;
use services\ServiceException;

class CategorieService {


	function getCategories(): \Illuminate\Database\Eloquent\Collection {
		return Categorie::all();
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

}