<?php

namespace minipress\appli\services\auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use minipress\appli\models\User;
use minipress\appli\services\ServiceException;

class AuthentificationService
{
    public function registerUser(string $username, string $email, string $password, ?string $role): bool
    {
        // Vérifier si l'utilisateur existe déjà
        if (User::where('username', $username)->orWhere('email', $email)->exists()) {
            return false;
        }

        // Créer un nouvel utilisateur
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->role = $role;
        $user->save();

        return true;
    }

    public function authenticateUser(string $username, string $password): bool
    {
        // Récupérer l'utilisateur par le nom d'utilisateur
        $user = User::where('username', $username)->first();

        if ($user && password_verify($password, $user->password)) {
            // Identifiant valide, connecte l'utilisateur (par exemple, en utilisant une session)
            $_SESSION['user_id'] = $user->id;
            return true;
        }

        return false;
    }

    public function logoutUser(): void
    {
        // Déconnecter l'utilisateur (par exemple, en effaçant les données de session)
        unset($_SESSION['user_id']);
    }

    public function getCurrentUser(): ?User
    {
        // Récupérer l'utilisateur actuellement connecté
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            return User::find($userId);
        }

        return null;
    }

	/**
	 * @throws ServiceException
	 */
	public function getUserById($id) {
		try {
			return User::findOrFail($id)->toArray();
		} catch (ModelNotFoundException $e) {
			throw new ServiceException("User $id n'existe pas", 404, $e);
		}
	}

}