<?php

/*
* Manager de l'entité Book
*/

class BookManager extends AbstractManager
{
    // Liste de tous les livres de la base de données
    public function getAllBooks() : array
    {
        $sql = 'SELECT * FROM books as b INNER JOIN users as u WHERE b.userId = u.id';
        $books = $this->db->prepare($sql);
        $books->execute();

        return $books->fetchAll();
    }
}