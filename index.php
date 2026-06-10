<?php
/*
* Routeur
*/
require_once './config/autoload.php';
require_once './config/config.php';

$bookController = new BookController();
$userController = new UserController();

// On récupère l'action demandée
// Si elle est vide, on renvoie vers la page d'accueil
$action = Utils::request('action','home');

// Try pour rediriger les messages d'erreur vers une page dédiée au besoin
try {
    switch ($action) {
        // Page d'accueil
        case 'home':
            $homeController = new HomeController();
            $homeController->showHome();
            break;

        // Liste des livres à l'échange
        case 'books':
            $bookController->showAll();
            break;

        // Page de détails d'un livre
        case 'book':
            $bookController->showBookDetails();
            break;

        // Page de connexion d'un utilisateur
        case 'login':
            $userController->login();
            break;

        // Traitement de la connexion utilisateur
        case 'logUser':
            $userController->logUser();
            break;

        // Page d'inscription d'un nouvel utilisateur
        case 'signUp':
            $userController->signUp();
            break;

        // Traitement de l'inscription d'un nouvel utilisateur
        case 'subscribe':
            $userController->subscribe();
            break;
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    $view = new View("Erreur");
    $view->render("errorPage", ['errorMessage' => $errorMessage]);
}