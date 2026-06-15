<?php

/*
* Classe User
*/

class User extends AbstractEntity 
{

    // Propriétés
    private ?string $name = null; // Vide au départ, rempli dans le profil après l'inscription
    private string $email;
    private string $password;
    private ?string $photo = './public/assets/images/icon_empty_profile.svg'; // Photo par défaut si l'utilisateur n'en a pas à uploader
    private DateTime $dateSubscribe;

    // Constructeur et ID géré par la classe parente

    // Setter et Getter

    //Username
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }

    public function getName() : ?string
    {
        return $this->name;
    }

    // Email
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    // Password
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    // Lien vers la photo de profil (avec photo par défaut si vide)
    public function setPhoto(?string $photo) : void
    {
        $this->photo = $photo ?: './public/assets/images/icon_empty_profile.svg';
    }

    public function getPhoto() : ?string
    {
        return $this->photo;
    }

    // Subscription date
    public function setDateSubscribe(string|DateTime $dateSubscribe) : void
    {
        //Convertit la chaine du tableau reçu en date
        if(is_string($dateSubscribe)){
            $dateSubscribe = new DateTime($dateSubscribe);
        }

        $this->dateSubscribe = $dateSubscribe;
    }

    public function getDateSubscribe() : DateTime
    {
        return $this->dateSubscribe;
    }

    // Calcul de l'ancienneté de l'utilisateur
    public function getSince() : string
    {
        $now = new DateTime();
        $interval = $this->dateSubscribe->diff($now);

        if ($interval->y > 0) {
        
            return "Membre depuis {$interval->y} an" . ($interval->y > 1 ? "s" : "");
        
        } elseif ($interval->m > 0) {
        
            return "Membre depuis {$interval->m} mois";

        } else {

            return "Membre depuis {$interval->d} jour" . ($interval->d > 1 ? "s" : "");
        }
    }
}