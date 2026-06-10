<?php
/*
* Controlleur de la classe User
*/

class UserController 
{
    // Affichage de la page de connexion
    public function login() : void
    {
        $view = new View("Connexion");
        $view->render("connexion");
    }

    // Affichage de la page d'inscription
    public function signUp() : void
    {
        $view = new View("Inscription");
        $view->render("signUp");
    }

    /*
    * Création d'un nouvel utilisateur
    */
    public function subscribe() : void
    {
        // Récupération des champs
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Adresse mail non vide et format valide
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email est invalide.");
        }

        // Mot de passe non vide
        if(empty($password)) {
            throw new Exception("Le mot de passe est requis.");
        }

        // Création du nouvel utilisateur
        $userManager = new UserManager();

        //On vérifie d'abord que l'email n'est pas déjà utilisé
        $check = $userManager->getUserByEmail($email);
        if ($check) {
            throw new Exception("Cet email est déjà utilisé.");
        }
    
        // Si l'email est disponible, on ajoute le nouvel utilisateur   
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password); 
        $userManager->addUser($user);

        // Redirection vers la page du profil de l'utilisateur pour qu'il puisse le compléter
        $view = new View("Profil");
        $view->render("profile", ['user' => $user]);
    }

    /*
    * Traitement de la connexion d'un utilisateur
    */
    public function logUser() : void
    {
        // Récupération des champs du formulaire de connexion
        $email = htmlspecialchars(Utils::request('email', NULL));
        $password = htmlspecialchars(Utils::request('password', NULL));

        // Adresse mail non vide et format valide
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email est manquante ou invalide.");
        }

        // Mot de passe non vide
        if(empty($password)) {
            throw new Exception("Le mot de passe est requis.");
        }

        // Vérification des identifiants de l'utilisateur
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if (!$user) {
            throw new Exception("L'adresse mail ne correspond à aucun utilisateur enregistrés");
        }

        $userPass = $user->getPassword();
        if ($userPass !== $password) {
            throw new Exception("Le mot de passe est erroné, veuillez vérifier votre saisie.");
        }

        // Paramétrage de la session utilisateur
        $_SESSION['user'] = $email;
        $_SESSION['idUser'] = $user->getId();

        // Redirection vers la page du compte utilisateur
        $view = new View("Mon Compte");
        $view->render("myAccount", ['user' => $user]);
    }
}