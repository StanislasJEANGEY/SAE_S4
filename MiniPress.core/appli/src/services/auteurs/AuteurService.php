<?php

namespace minipress\appli\services\auteurs;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\api\models\Auteur;
use minipress\appli\services\ServiceException;

class AuteurService {

	/**
	 * @throws ServiceException
	 */
	public function getAuteurById($id) {
		try {
			return Auteur::findOrFail($id)->toArray();
		} catch (ModelNotFoundException $e) {
			throw new ServiceException("Auteur $id n'existe pas", 404, $e);
		}
	}
}