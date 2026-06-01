<?php
/*
* Routeur
*/
require_once './config/autoload.php';
require_once './config/config.php';

$bookController = new BookController();

// On récupère l'action demandée
// Si elle est vide, on renvoie vers la page d'accueil
$action = Utils::request('action','home');

switch ($action) {
    // Page d'accueil
    case 'home':
        $bookController->ShowLastBooks();
        break;
    
    // Liste des livres à l'échange
    case 'books':
        $bookController->showBooks();
        break;

    // Page de détails d'un livre
    case 'book':
        $id = (int) Utils::request('id', 0);
        $bookController->showBookDetails($id);
        break;
}