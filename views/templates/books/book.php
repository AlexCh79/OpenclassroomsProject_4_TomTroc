<?php
/*
* Page "Single Livre"
*/
?>
<section class="book-details" role="region">
    <img class="cover" src="<?= urldecode($book->getImage()) ?>" role="img" aria-label="Couverture du livre">
    <div class="book-info" aria-label="Informations du livre">
        <h1 aria-label="Titre du livre"><?= $book->getTitle() ?></h1>
        <legend aria-label="Auteur du livre">Par <?= $book->getAuthor() ?></legend>
        <img class="hr" src="./public/assets/images/Line 3.png" aria-hidden="true">
        
        <h3>DESCRIPTION</h3>
        <p aria-label="Description du livre" role="text"><?= nl2br($book->getDescription()) ?></p>

        <h3>PROPRIÉTAIRE</h3>
        <div class="cartouche">
            <a href="index.php?action=profile&id=<?= $user->getId() ?>"><img aria-hidden="" src="<?= urldecode($user->getPhoto()) ?>" class="photo-profile"> <span aria-label="Pseudo de l'utilisateur propriétaire du livre"><?= $user->getPseudo() ?></span></a>
        </div>
        <button class="dark-button" role="button" aria-label="Envoyer un message au propriétaire du livre"><a href="index.php?action=write&otherId=<?= $user->getId() ?>">Envoyer un message</a></button>        
    </div>
</section>