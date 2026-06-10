<?php
/*
* Controlleur de la page d'accueil
*/

class HomeController
{
    // Renvoie la page d'accueil avec les 4 derniers livres ajoutés
    public function showHome() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getLatestBooks();

        $view = new View("Accueil");
        $view->render("home", ['books' => $books]);
    }
}