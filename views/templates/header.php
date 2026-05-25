<?php
/*
* Menu du site
*/
?>
<header>
    <nav class="menu">
        <div class="left-menu">
            <img src="./public/assets/image/logo_desktop_menu.png" class="logo">
        </div>
        <button class="burger">
            <img src="./public/assets/image/icon_menu.svg">
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
                    <li><a href="index.php?action=messages"><img src= "./public/assets/image/Icon_messagerie.svg"> Messagerie</a></li>
                    <li><a href="index.php?action=myAccount"><img src= "./public/assets/image/Icon_mon_compte.svg"> Mon compte</a></li>
                    <li><a href="index.php?action=login">Connexion</a></li>
                </div>
            </ul>
        </nav>
    </nav>
</header>