<?php

namespace minipress\appli\services\auth;

use minipress\appli\models\User;

class AuthentificationService
{
    public function registerUser(string $username, string $email, string $password): bool
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
}