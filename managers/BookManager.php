<?php

/*
* Manager de l'entité Book
*/

class BookManager extends AbstractManager
{
    /*
    * Liste de tous les livres de la base de données
    */
    public function getAllBooks() : array
    {
        $sql = 'SELECT b.id, b.title, b.description, b.image, b.author, u.name as userName, u.photo as userPhoto  FROM books as b INNER JOIN users as u ON b.userId = u.id';
        $result = $this->db->prepare($sql);
        $result->execute();
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /*
    * Liste des 4 derniers livres ajoutés à la base
    */
    public function getLatestBooks() : array
    {
        $sql = 'SELECT b.id, b.title, b.description, b.image, b.author, u.name as userName, u.photo as userPhoto  FROM books as b INNER JOIN users as u ON b.userId = u.id ORDER BY dateUpload DESC LIMIT 4';
        $result = $this->db->prepare($sql);
        $result ->execute();
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    /*
    * Récupère un livre à partir de son id
    */
    public function getBookById(int $id) : ?Book
    {
        $sql = 'SELECT * FROM books WHERE id = :id';
        $result = $this->db->prepare($sql);
        $result->execute([':id' => $id]);
        $book = $result->fetch();

        if ($book) {
            return new Book($book);
        }
        
        return null;
    }

    /*
    * Récupère les livres et le nombre de livres pour même utilisateur
    */
    public function getByUser(int $userId): array
    {
        $sql = 'SELECT * FROM books WHERE userId = :userId';
        $result = $this->db->prepare($sql);
        $result->execute(['userId' => $userId]);

        $books = [];
        while ($book = $result->fetch()){
            $books [] = new Book($book);
        }

        return $books;
    }

    /*
    * Compte le nombre de livres par utilisateur
    */
    public function countByUser(int $userId): int
    {
        $sql = 'SELECT COUNT(*) as nbBooks FROM books WHERE userId = :userId';
        $result = $this->db->prepare($sql);
        $result->execute(['userId' => $userId]);

        $counter = $result->fetch();
        return (int) $counter['nbBooks'];
    }

    /*
    * Met à jour un livre
    */
    public function updateById(?Book $book): void
    {
        $sql = 'UPDATE books SET title = :title, author = :author, description = :description, status = :status WHERE id = :id';
        $result = $this->db->prepare($sql);
        $result->execute([
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'description' => $book->getDescription(),
            'status' => $book->getStatus(),
        ]);
    }

    /*
    * Supprimer un livre
    */
    public function deleteById(?Book $book): void
    {
        $sql = 'DELETE FROM books WHERE id = :id';
        $result = $this->db->prepare($sql);
        $result->execute(['id' => $book->getId()]);
    }
}