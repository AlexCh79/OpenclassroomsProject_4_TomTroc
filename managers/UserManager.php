<?php

/*
* Manager des utilisateurs
*/

class UserManager extends AbstractManager
{
    // Inscription d'un nouvel utilisateur
    public function addUser(?User $user) : void
    {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $result = $this->db->prepare($sql);
        $result->execute([
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
        ]);
    }

    // Récupération d'un profil utilisateur par son email
    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $result = $this->db->prepare($sql);
        $result->execute([':email' => $email]);

        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    // Récupération d'un profil utilisateur par son id
    public function getUserById(int $id): ?User
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $result = $this->db->prepare($sql);
        $result->execute([':id' => $id]);

        $user = $result->fetch();

        if (!$user) {
            throw new exception("Aucun utilisateur trouvé avec cet id.");
        }

        return new User($user);
    }
}