<?php
/*
* Page "Single Livre"
*/
?>
<section class="book-details">
    <img class="cover" src="<?= urldecode($book->getImage()) ?>">
    <div class="book-info">
        <h1><?= $book->getTitle() ?></h1>
        <legend>Par <?= $book->getAuthor() ?></legend>
        <img class="hr" src="./public/assets/images/Line 3.png" aria-hidden="true">
        
        <h3>DESCRIPTION</h3>
        <p><?= nl2br($book->getDescription()) ?></p>

        <h3>PROPRIÉTAIRE</h3>
        <div class="cartouche">
            <img src="<?= urldecode($user->getPhoto()) ?>" class="photo-profile"> <span><?= $user->getPseudo() ?></span>
        </div>
        <button class="dark-button">Envoyer un message</button>        
    </div>
</section>