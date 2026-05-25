<?php
/*
* Classe book pour gérer les livres
*/

class Book extends AbstractEntity
{
    // Propriétés
    private int $idUser;
    private string $title;
    private string $author;
    private string $description;
    private string $image;
    private bool $status;
    private DateTime $dateUpload;

    // ID et constructeur gérés par la classe parente

    // Setter et getter

    // IdUser - L'ID de l'utilisateur qui possède le livre
    public function setIdUser($int idUser) : void
    {
        $this->idUser = $idUser;
    }

    public function getIdUser() : int
    {
        return $this->idUser;
    }

    // Title
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    // Author
    public function setAuthor(string $author) : void
    {
        $this->author = $author;
    }

    public function getAuthor() : string
    {
        return $this->author;
    }

    // Description
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    // Lien de l'image
    public function setImage(string $image) : void
    {
        $this->image = $image;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    // Status (si le livre est dispo à l'échange, le statut est true)
    public function setStatus(bool $status) : void
    {
        $this->status = $status;
    }

    public function getStatus() : bool
    {
        return $this->status;
    }

    // Date de l'upload du livre par son propriétaire
    public function setDateUpload(DateTime $dateUpload) : void
    {
        $this->dateUpload = $dateUpload;
    }

    public function getDateUpload(): DateTime
    {
        return $this->dateUpload;
    }
}