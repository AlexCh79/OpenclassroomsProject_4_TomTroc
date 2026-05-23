<?php
/*
* Routeur
*/
require_once './config/autoload.php';
require_once './config/config.php';

//On récupère l'action demandée
//Si elle est vide, on renvoie vers la page d'accueil
$action = Utils::request('action','home');

switch ($action) {
    //Page d'accueil
    case 'home':
        $userController = new UserController();
        $userController->showHome();
        break;
}