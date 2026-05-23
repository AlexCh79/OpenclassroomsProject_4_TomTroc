<?php
/*
* Menu du site
*/
?>

<nav class="menu">
    <div class="left-menu">
        <img src="./assets/logo_desktop_menu.png" class="logo">
    </div>
    <button class="burger">
        <span></span>
        <span></span>
        <span></span>
    </button>


    <!-- Gestion du menu burger sur mobile -->
    <nav class="mobile-menu">
        <ul>
            <li><a href="index.php?action=home">Accueil</a></li>
            <li><a href="index.php?action=books">Nos livres à l'échange</a></li>
            <li><a href="index.php?action=messages">Messagerie</a></li>
            <li><a href="index.php?action=myAccount">Mon compte</a></li>
            <li><a href="index.php?action=login">Connexion</a></li>
        </ul>
    </nav>

    <!-- Gestion du menu sur écran ordinateur -->
    <nav class="desktop-menu">
        <ul>
            <div class="left-menu">
                <li><a href="index.php?action=home">Accueil</a></li>
                <li><a href="index.php?action=books">Nos livres à l'échange</a></li>
            </div>
            <div class="right-menu">
                <li><a href="index.php?action=messages"><img src= "./assets/Icon_messagerie.svg"> Messagerie</a></li>
                <li><a href="index.php?action=myAccount"><img src= "./assets/Icon_mon_compte.svg"> Mon compte</a></li>
                <li><a href="index.php?action=login">Connexion</a></li>
            </div>
        </ul>
    </nav>
</nav>