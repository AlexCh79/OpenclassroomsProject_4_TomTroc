<?php

/*
* Classe abstraite gérant la connexion à la base de données via le DBManager
*/

abstract class AbstractManager
{
    protected $db;

    //Constructeur de la classe
    public function __construct()
    {
        $this->db = DBManager::getInstance()->getPDO();
    }
}