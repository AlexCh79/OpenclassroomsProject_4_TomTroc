<?php
/*
* Controlleur de la classe User
*/

class UserController {
    //Renvoie vers la page d'accueil -- Test, cette fonction ne restera pas ici
    public function showHome(): void
    {
    $userManager = new UserManager();
    $users = $userManager->getUsers();

    $view = new View("Accueil");
    $view->render("home", ['users' => $users]);
    }
}