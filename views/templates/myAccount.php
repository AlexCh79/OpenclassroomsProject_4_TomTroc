<?php
/*
* Page "Mon Compte"
*/
?>

<section class="my-account">
    <h1>Mon Compte</h1>
    <div class="user-card">
        <img class="user-photo" src="<?= $user->getPhoto()  ?>">
        <a alt="Modifier la photo de profil">modifier</a>
        <img aria-hidden src="./public/assets/images/Line 5.png" class="user-card-hr">
        <p class="user-name"><?= $user->getName() ?></p>
        <p class="user-date">Membre depuis le </p>
        <p>BIBLIOTHEQUE</p>
        <p>Livres</p>
    </div>
</section>