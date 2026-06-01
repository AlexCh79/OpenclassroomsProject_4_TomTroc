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

    // Renvoie la liste des 4 derniers livres ajoutés
    public function ShowLastBooks() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getLastBooks();

        $view = new View("Accueil");
        $view->render("home", ['books' => $books]);
    }

    // Renvoie les détails d'un livre à partir de son id
    public function showBookDetails(int $id) : void
    {
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        $view = new View("Single Livre");
        $view->render("book", ['book' => $book]);
    }
}