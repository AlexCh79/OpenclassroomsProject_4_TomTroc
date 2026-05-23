<?php

/*
* Classe View générant les vues des différentes pages du site
*/

class View
{
    // Titre de la page
    private string $title;

    // Constructeur
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /*
    * Construction du chemin vers le template
    * La constante TEMPLATE_VIEW_PATH est définit dans le fichier config masqué
    */
    private function buildViewPath(string $viewName) : string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }

    /*
    * Récupération de la page à renvoyer
    */
    private function renderView(string $viewPath, array $params = []) : string
    {
        if (file_exists($viewPath)) {
            extract($params); //on récupère les paramètres

            ob_start();
            require($viewPath);
            return ob_get_clean(); //renvoie la page
        } else {
            throw new Exception("La vue '$viewPath' n'existe pas !"); // erreur si page introuvable
        }
    }


    //Renvoie la page demandée selon les paramètres du controlleur
    public function render(string $viewName, array $params = []) : void
    {
        $viewPath = $this->buildViewPath($viewName); // Construction du chemin

        //Génération de la vue que récupérera le template principal
        $content = $this->renderView($viewPath, $params);
        $title = $this->title;

        ob_start();
        require(MAIN_VIEW_PATH);
        echo ob_get_clean(); //Renvoie la page
    }
}