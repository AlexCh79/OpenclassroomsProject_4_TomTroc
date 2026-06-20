<?php
/*
* Menu du site
*/
?>
<header role="banner">
    <nav class="menu">
        <button class="burger" aria-controls="phone-menu" aria-expanded="false">
            <img src="./public/assets/images/logo_without_text.png" class="logo-without-text">
            <img src="./public/assets/images/icon_menu.svg">
        </button>


        <!-- Gestion du menu burger sur mobile -->
        <nav class="mobile-menu" id="phone-menu" aria-expanded="true" aria-label="Main menu for smartphone">
            <ul>
                <li><a href="index.php?action=home">Accueil</a></li>
                <li><a href="index.php?action=books">Nos livres à l'échange</a></li>
                <li><a href="index.php?action=messages">Messagerie</a></li>
                <li><a href="index.php?action=myAccount">Mon compte</a></li>
                    <?php if (!isset($_SESSION['idUser'])) { ?>
                        <li><a href="index.php?action=login">Connexion</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?action=logout">Déconnexion</a></li>
                    <?php } ?>
            </ul>
        </nav>

        <!-- Gestion du menu sur écran ordinateur -->
        <nav class="desktop-menu" aria-label="Main menu for desktop">
            <ul>
                <div class="left-menu">
                    <li><img src="./public/assets/images/logo_desktop_menu.png" class="logo" aria-hidden=""></li>
                    <li><a href="index.php?action=home">Accueil</a></li>
                    <li><a href="index.php?action=books">Nos livres à l'échange</a></li>
                </div>
                <div class="right-menu">
                    <li><a href="index.php?action=messages"><img src= "./public/assets/images/Icon_messagerie.svg" aria-hidden=""> Messagerie</a></li>
                    <li><a href="index.php?action=myAccount"><img src= "./public/assets/images/Icon_mon_compte.svg" aria-hidden=""> Mon compte</a></li>
                    <?php if (!isset($_SESSION['idUser'])) { ?>
                        <li><a href="index.php?action=login">Connexion</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?action=logout">Déconnexion</a></li>
                    <?php } ?>
                </div>
            </ul>
        </nav>
    </nav>
</header>