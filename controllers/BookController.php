<?php
/*
* Controlleur de la classe book
*/

class BookController
{
    // Renvoie la liste de l'ensemble des livres de la base
    public function showBooks() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Nos livres");
        $view->render("books", ['books' => $books]);
    }
}