<?php
/*
* Page "Single Livre"
*/
?>
<section class="book-details" aria-label="Présentation du livre">
    <img class="cover-single" src="<?= urldecode($book->getImage()) ?>" aria-label="Couverture du livre">
    <div class="book-info">
        <h1 aria-label="Titre du livre"><?= $book->getTitle() ?></h1>
        <h2 aria-label="Auteur du livre">Par <?= $book->getAuthor() ?></h2>
        <img class="hr" src="./public/assets/images/Line_3.png" aria-hidden="true" alt="petite ligne horizontale">
        
        <h3>DESCRIPTION</h3>
        <p><?= nl2br($book->getDescription()) ?></p>

        <h3>PROPRIÉTAIRE</h3>
        <div class="cartouche">
            <a href="index.php?action=profile&id=<?= $user->getId() ?>"><img aria-label="Profil du propriétaire du livre" src="<?= urldecode($user->getPhoto()) ?>" class="photo-profile"> <span><?= $user->getPseudo() ?></span></a>
        </div>
        <a class="dark-button" role="button" aria-label="Envoyer un message au propriétaire du livre" href="index.php?action=messenger&otherId=<?= $user->getId() ?>">Envoyer un message</a>
    </div>
</section>