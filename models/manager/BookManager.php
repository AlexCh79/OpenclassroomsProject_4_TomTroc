<?php

/*
* Manager de l'entité Book
*/

class BookManager extends AbstractManager
{
    // Liste de tous les livres de la base de données
    public function getAllBooks() : array
    {
        $sql = 'SELECT b.id as bookId, b.title, b.description, b.image, b.author, u.name as userName, u.photo as userPhoto  FROM books as b INNER JOIN users as u ON b.userId = u.id';
        $books = $this->db->prepare($sql);
        $books->execute();

        return $books->fetchAll();
    }

    // Liste des 4 derniers livres ajoutés à la base
    public function getLastBooks() : array
    {
        $sql = 'SELECT b.id as bookId, b.title, b.description, b.image, b.author, u.name as userName, u.photo as userPhoto  FROM books as b INNER JOIN users as u ON b.userId = u.id ORDER BY dateUpload DESC LIMIT 4';
        $books = $this->db->prepare($sql);
        $books ->execute();

        return $books->fetchAll();
    }

    // Récupère un livre à partir de son id
    public function getBookById(int $bookId) : array
    {
        $sql = 'SELECT b.id as bookId, b.title, b.description, b.image, b.author, u.name as userName, u.photo as userPhoto FROM books as b INNER JOIN users as u ON b.userId = u.id and b.id = :id';
        $book = $this->db->prepare($sql);
        $book->execute([':id' => $bookId]);

        return $book->fetch();
    }
}