<?php

/*
* Fichier autoload pour récupérer les classes
*/

spl_autoload_register(function($className) {
    //Récupération des classes du dossier views
    if (file_exists('./views/' . $className . '.php')) {
        require_once './views/' . $className . '.php';
    }

    //Récupération des classes du dossier controllers
    if (file_exists('./controllers/' . $className . '.php')) {
        require_once './controllers/' . $className . '.php';
    }

    //Récupération des classes du dossier models
    if (file_exists('./models/' . $className . '.php')) {
        require_once './models/' . $className . '.php';
    }

    //Récupération des classes du dossiers services
    if (file_exists('./services/' . $className . '.php')) {
        require_once './services/' . $className . '.php';
    }
});