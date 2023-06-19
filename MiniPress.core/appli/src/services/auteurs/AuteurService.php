<?php

namespace minipress\appli\services\auteurs;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\appli\models\Auteur;
use minipress\appli\services\auth\AuthentificationService;
use minipress\appli\services\ServiceException;

class AuteurService {

	// Créer un auteur
	/**
	 * @throws ServiceException
	 */
	public function setAuteur($id): void {
		try {
			$auteur = new Auteur();
			$auteur->id = $id;
			$authService = new AuthentificationService();
			$user = $authService->getUserById($id);
			$auteur->nom = $user['nom'];
			$auteur->user_id = $user['id'];
			$auteur->save();
		} catch (ModelNotFoundException $e) {
			throw new ServiceException("Une erreur s'est produite lors de l'enregistrement de l'auteur");
		}
	}

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

	public function isAuteur($idUser): bool {
		try {
			return Auteur::findOrFail($idUser)->toArray();
		} catch (ModelNotFoundException $e) {
			return false;
		}
	}

}