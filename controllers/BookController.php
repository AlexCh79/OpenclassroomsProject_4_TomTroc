<?php
/*
* Controlleur de la classe book
*/
class BookController
{

    /*
    * Renvoie la liste de l'ensemble des livres de la base
    */
    public function showAll() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Nos livres");
        $view->render("books/books", ['books' => $books]);
    }

    /*
    * Renvoie les détails d'un livre à partir de son id
    */
    public function showDetails() : void
    {
        $id = (int) Utils::request('id', -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        
        $userManager = new UserManager();
        $user = $userManager->getUserById($book->getUserId());
        
        $view = new View("Single Livre");
        $view->render("books/book", ['book' => $book, 'user' => $user]);
    }

    /*
    * Affichage de la page de mise à jour d'un livre
    */
    public function displayDetails() : void
    {
        $id = (int) Utils::request('id', -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        $view = new View("Edition livre");
        $view->render("books/upload", ['book' => $book]);
    }

    /*
    * Mise à jour d'un livre de l'utilisateur
    */
    public function update() : void
    {
        $id = (int) Utils::request('id', -1);

        // Nettoyage des données du formulaire
        $title = htmlspecialchars(Utils::request('title'));
        $author = htmlspecialchars(Utils::request('author'));
        $description = htmlspecialchars(Utils::request('description', NULL));
        $availability = Utils::request('availability');

        // Récupération du livre dans la base de données
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        // Hydratation du livre avec les nouvelle données
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setDescription($description);
        if ($availability === 'available') {
            $book->setStatus(true);
        } else {
            $book->setStatus(false);
        }

        // Renvoi du livre vers la BDD
        $bookManager->updateById($book);

        // Redirection vers la page du compte utilisateur
        Utils::redirect('myAccount');
    }

    /*
    * Suppression d'un livre
    */
    public function delete(): void
    {
        $id = (int) Utils::request('id', -1);

        // Récupération du livre 
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        
        // Suppression de la base
        $bookManager->deleteById($book);

        // Redirection vers la page du compte utilisateur
        Utils::redirect('myAccount');        
    }
}