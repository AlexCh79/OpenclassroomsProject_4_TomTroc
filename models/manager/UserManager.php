<?php

/*
* Manager des utilisateurs
*/

class UserManager extends AbstractManager
{
    // Liste de tous les utilisateurs pour vérifier la connexion à la BDD
    public function getUsers() : array
    {
        $sql = 'SELECT name FROM users';
        $result = $this->db->prepare($sql);
        $result->execute();

        return $result->fetchAll();
    }
}