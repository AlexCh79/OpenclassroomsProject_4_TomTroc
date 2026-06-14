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
        <h2 class="user-name"><?= $user->getName() ?></h2>
        <p class="user-date"><?= $user->getSince() ?></p>
        <p class="user-nb-books">BIBLIOTHEQUE</p>
        <p class="nb-books"><img src="./public/assets/images/Vector.svg"> <?= $nbBooks ?> Livres</p>
    </div>
</section>