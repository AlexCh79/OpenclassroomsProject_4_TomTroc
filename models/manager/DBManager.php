<?php

/*
* Classe DBManager pour la connexion à la base de données
*/

class DBManager 
{
    //Propriétés
    private static $instance;
    private $db;

    // Constructeur de la classe
    private function __construct()
    {
        $this->db = new PDO ('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS); // Connexion à la BDD
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // gestion des erreurs
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Récupération des données de la BDD dans un tableau associatif
    }

    // Méthode pour récupérer l'instance de la classe
    public static function getInstance() : DBManager
    {
        if (!self::$instance) {
            self::$instance = new DBManager();
        }

        return self::$instance;
    }

    // Méthode pour récupérer l'objet PDO
    public function getPDO() : PDO
    {
        return $this->db;
    }
}