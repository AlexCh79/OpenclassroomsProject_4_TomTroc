<?php

/*
* Manager des utilisateurs
*/

class UserManager extends AbstractManager
{
    /*
    * Inscription d'un nouvel utilisateur
    */
    public function addUser(?User $user) : void
    {
        $sql = "INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)";
        $result = $this->db->prepare($sql);
        $result->execute([
            ':pseudo' => $user->getPseudo(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
        ]);
    }

    /*
    * Récupération d'un profil utilisateur par son email
    */
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

    /*
    * Récupération d'un profil utilisateur par son pseudo
    */
    public function getByPseudo(string $pseudo): ?User
    {
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
        $result = $this->db->prepare($sql);
        $result->execute(['pseudo' => $pseudo]);

        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    /*
    * Récupération d'un profil utilisateur par son id
    */
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

    /*
    * Mise àpseudo jour de l'utilisateur
    */
    public function modifyUser(?User $user): void
    {
        $sql = "UPDATE users SET pseudo = :pseudo, email = :email, password = :password WHERE id = :id";
        $result = $this->db->prepare($sql);
        $result->execute([
            ':id' => $user->getId(),
            ':' => $user->getPseudo(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
        ]);
    }
}