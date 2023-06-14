<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\api\models\Auteur;

class AuteurService {

	public function getAuteurById($id) {
		try {
			return Auteur::findOrFail($id)->toArray();
		} catch (ModelNotFoundException $e) {
			throw new AuteurServiceException("Auteur $id n'existe pas", 404, $e);
		}
	}
}