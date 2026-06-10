<?php
/*
* Classe book pour gérer les livres
*/

class Book extends AbstractEntity
{
    // Propriétés
    private int $userId;
    private ?string $userName = null;
    private string $title;
    private string $author;
    private string $description;
    private string $image;
    private bool $status;
    private DateTime $dateUpload;

    // ID et constructeur gérés par la classe parente

    // Setter et getter

    // UserId - L'ID de l'utilisateur qui possède le livre
    public function setUserId(int $userId) : void
    {
        $this->userId = $userId;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    // Nom de l'utilisateur qui possède le livre
    public function setUserName(string $userName) : void
    {
        $this->userName = $userName;
    }

    public function getUserName() : string
    {
        return $this->userName;
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
    public function setDateUpload(string|DateTime $dateUpload) : void
    {
        if (is_string($dateUpload)) {
        $dateUpload = new DateTime($dateUpload);
        }
        
        $this->dateUpload = $dateUpload;
    }

    public function getDateUpload(): DateTime
    {
        return $this->dateUpload;
    }
}