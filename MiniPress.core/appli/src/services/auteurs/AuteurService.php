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
	public function setAuteur($email): void {
		try {
            $auteur = new Auteur();
            $authentificationService = new AuthentificationService();
            $estConnecte = $authentificationService->getUserByEMail($email);
            $auteur->user_id = $estConnecte['id'];
            $auteur->nom = $estConnecte['username'];
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

    public function getAuteurByUserId($id) {
        try {
            return Auteur::where('user_id', $id)->firstOrFail()->toArray();
        } catch (ModelNotFoundException $e) {
            throw new ServiceException("Auteur $id n'existe pas", 404, $e);
        }
    }

	public function isAuteur($idUser): bool {
		try {
            Auteur::where('user_id', $idUser)->firstOrFail();
            return true;
        } catch (ModelNotFoundException $e) {
            return false;
        }
	}

}