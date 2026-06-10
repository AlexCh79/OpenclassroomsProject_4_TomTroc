<?php
/*
* Controlleur de la classe book
*/

class BookController
{
    // Renvoie la liste de l'ensemble des livres de la base
    public function showAll() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Nos livres");
        $view->render("books", ['books' => $books]);
    }

    // Renvoie les détails d'un livre à partir de son id
    public function showBookDetails() : void
    {
        $id = (int) Utils::request('id', -1);
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        
        $userManager = new UserManager();
        $user = $userManager->getUserById($book->getUserId());
        
        $view = new View("Single Livre");
        $view->render("book", ['book' => $book, 'user' => $user]);
    }
}