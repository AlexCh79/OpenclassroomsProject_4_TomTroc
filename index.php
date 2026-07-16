<?php
/*
* Routeur
*/
require_once './config/autoload.php';
require_once './config/config.php';

$bookController = new BookController();
$userController = new UserController();
$messageController = new MessageController();

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
            $bookController->showDetails();
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

        // Affichage du profil public d'un utilisateur
        case 'profile':
            $userController->displayProfile();
            break;

        // Affichage de la page de profil de l'utilisateur si connecté
        case 'myAccount':
            if (isset($_SESSION['idUser'])) {
                $userController->showAccount();
                break;
            } else {
                // Renvoie vers la page de connexion si l'utilisateur n'est pas connecté
                $userController->login();
                break;
            }

        // Mise à jour des données utilisateurs
        case 'uploadUser':
            $userController->uploadProfile();
            break;

        // Affichage de la page d'ajout d'un livre
        case "new":
            $bookController->new();
            break;

        // Ajout d'un livre
        case 'add':
            $bookController->add();
            break;
            
        // Affichage de la page de modification d'un livre
        case 'display':
            $bookController->displayDetails();
            break;

        // Mise à jour des informations d'un livre
        case 'update':
            $bookController->update();
            break;

        // Suppression d'un livre
        case 'delete':
            $bookController->delete();
            break;

        // Déconnexion de l'utilisateur
        case 'logout':
            $userController->logout();
            break;

        // Affichage de la messagerie (liste des messages)
        case 'messenger':
            if(isset($_SESSION['idUser'])) {
                $messageController->getMessenger();
                break;
            } else {
                // Renvoie vers la page de connexion si l'utilisateur n'est pas connecté
                $userController->login();
                break;
            }
        
        // Affichage de la conversation
        case 'write':
            if(isset($_SESSION['idUser'])) {
                $messageController->displayConversation();
                break;
            } else {
                // Renvoie vers la page de connexion si l'utilisateur n'est pas connecté
                $userController->login();
                break;
            }            

        // Envoi d'un nouveau message
        case 'send':
            $messageController->send();
            break;

        default :
            throw new Exception("Page introuvable !");            
    }

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    $view = new View("Erreur");
    $view->render("errorPage", ['errorMessage' => $errorMessage]);
} 