<?php
/*
* Menu du site
*/
?>
<header role="banner">
    <nav class="menu" role="navigation" aria-label="main menu">
        <button class="burger" aria-controls="phone-menu" aria-expanded="false">
            <img aria-hidden="true" alt="Logo du site" src="./public/assets/images/logo_without_text.png" class="logo-without-text">
            <img aria-label="Bouton du menu burger" src="./public/assets/images/icon_menu.svg">
        </button>


        <!-- Gestion du menu burger sur mobile -->
        <nav class="mobile-menu" id="phone-menu" aria-expanded="true" aria-label="Main menu for smartphone" role="navigation">
            <ul>
                <li><a href="index.php?action=home" aria-label="Vers l'accueil du site">Accueil</a></li>
                <li><a href="index.php?action=books" aria-label="vers la liste des livres">Nos livres à l'échange</a></li>
                <li><a href="index.php?action=messenger" aria-label="vers la messagerie">Messagerie</a></li>
                <li><a href="index.php?action=myAccount" aria-label="vers mon compte">Mon compte</a></li>
                    <?php if (!isset($_SESSION['idUser'])) { ?>
                        <li><a href="index.php?action=login" aria-label="vers la page de connexion">Connexion</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?action=logout" aria-label="vers la déconnexion">Déconnexion</a></li>
                    <?php } ?>
            </ul>
        </nav>

        <!-- Gestion du menu sur écran ordinateur -->
        <nav class="desktop-menu" aria-label="Main menu for desktop" role="navigation">
            <ul>
                <div class="left-menu">
                    <li><img src="./public/assets/images/logo_desktop_menu.png" class="logo" aria-hidden="true" alt="TomTroc - Logo du site"></li>
                    <li><a href="index.php?action=home" aria-label="vers l'accueil du site">Accueil</a></li>
                    <li><a href="index.php?action=books" aria-label="vers la liste des livres">Nos livres à l'échange</a></li>
                </div>
                <div class="right-menu">
                    <li><a href="index.php?action=messenger" aria-label="vers la messagerie"><img src= "./public/assets/images/Icon_messagerie.svg" alt="icone message" aria-hidden="true"> Messagerie</a></li>
                    <li><a href="index.php?action=myAccount" aria-label="vers mon compte"><img src= "./public/assets/images/Icon_mon_compte.svg" alt="icone de profil" aria-hidden="true"> Mon compte</a></li>
                    <?php if (!isset($_SESSION['idUser'])) { ?>
                        <li><a href="index.php?action=login" aria-label="vers la page de connexion">Connexion</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?action=logout" aria-label="vers la déconnexion">Déconnexion</a></li>
                    <?php } ?>
                </div>
            </ul>
        </nav>
    </nav>
</header>