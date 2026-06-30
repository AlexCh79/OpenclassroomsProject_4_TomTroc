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
        $view->render("users/connexion");
    }

    // Affichage de la page d'inscription
    public function signUp() : void
    {
        $view = new View("Inscription");
        $view->render("users/signUp");
    }

    /*
    * Création d'un nouvel utilisateur
    */
    public function subscribe() : void
    {
        // Récupération des champs
        $pseudo = htmlspecialchars(Utils::request('pseudo'));
        $email = htmlspecialchars(Utils::request('email'));
        $password = htmlspecialchars(Utils::request('password'));

        // Pseudo non vide
        if (empty($pseudo)) {
            throw new Exception("Le pseudo est obligatoire");
        }

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

        // On vérifie que le pseudo n'existe pas
        $checkPseudo = $userManager->getByPseudo($pseudo);
        if ($checkPseudo) {
            throw new Exception("Ce pseudo existe déjà");
        }

        //On vérifie que l'email n'est pas déjà utilisé
        $check = $userManager->getUserByEmail($email);
        if ($check) {
            throw new Exception("Cet email est déjà utilisé.");
        }
    
        // Si l'email est disponible, on ajoute le nouvel utilisateur   
        $user = new User();
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
        $userManager->addUser($user);

        // Redirection vers la page du profil de l'utilisateur pour qu'il puisse le compléter
        $this->logUser();
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
        if (!password_verify($password, $userPass)) {
            throw new Exception("Le mot de passe est erroné, veuillez vérifier votre saisie.");
        }

        // Paramétrage de la session utilisateur
        $_SESSION['user'] = $user->getEmail();
        $_SESSION['idUser'] = $user->getId();
        $_SESSION['pseudo'] = $user->getPseudo();

        // Redirection vers la page du compte utilisateur
        $this->showAccount();
    }

    // Récupération des informations de l'utilisateur connecté et affichage du profil
    public function showAccount(): void
    {
        $id = $_SESSION['idUser'];
        $userManager = new UserManager();
        $user = $userManager->getUserById($id);

        if (!$user) {
            throw new exception ("Erreur dans la récupération de la session utilisateur");
        } 
        
        // Récupération des livres de l'utilisateur
        $bookManager = new BookManager();
        $books = $bookManager->getByUser($id);

        // Compte le nombre de livres possédés par l'utilisateur
        $nbBooks = $bookManager->countByUser($id);

        $view = new View("Mon Compte");
        $view->render("users/myAccount", ['user' => $user, 'books' => $books, 'nbBooks' => $nbBooks]);
    }

    // Déconnexion de l'utilisateur
    public function logout(): void
    {
        session_unset();
        session_destroy();

        // Redirection vers la page d'accueil
        $homeController = new HomeController();
        $homeController->showHome();
    }

    // Mise à jour des données utilisateur
    public function uploadProfile(): void
    {
        // Vérif. que l'utilisateur est bien connecté
        if(!isset($_SESSION['idUser'])) {
            throw new Exception("Vous devez vous connecter pour modifier les informations du profil");
        }

        // Récupération de l'id de l'utilisateur connecté
        $id = $_SESSION['idUser'];

        // Récupération des données depuis le formulaire
        $email = Utils::request('email');
        $password = Utils::request('password');
        $pseudo = Utils::request('pseudo');

        // Récupération de l'utilisateur de la BDD via l'id connecté
        $userManager = new UserManager();
        $user = $userManager->getUserById($id);

        // Mise à jour des données si modifiées

        // Email
        if (!empty($email) && $email !== $user->getEmail()) {
            $user->setEmail(htmlspecialchars($email));
        }

        // Mot de passe
        if (!empty($password) && !password_verify($password, $user->getPassword())) {
            $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
        }

        // Pseudo
        if (!empty($pseudo) && $pseudo !== $user->getPseudo()){
            $user->setPseudo(htmlspecialchars($pseudo));
        }

        // Mise à jour de l'utilisateur dans la base de données
        $userManager->modifyUser($user);

        // Actualisation de la page
        $this->showAccount();
    }

    /* 
    * Affichage du profil public utilisateur
    */
    public function displayProfile(): void
    {
        $id = (int) Utils::request('id');

        $userManager = new UserManager();
        $user = $userManager->getUserById($id);

        if (!$user) {
            throw new Exception("L'utilisateur n'existe pas !");
        }

        $bookManager = new BookManager();
        $books = $bookManager->getByUser($id);
        
        $nbBooks = $bookManager->countByUser($id);

        $view = new View("Compte public");
        $view->render('users/profile', ['user' => $user, 'books' => $books, 'nbBooks' => $nbBooks]);
    }
}