<?php
/*
* Page "Single Livre"
*/
?>
<section class="book-details">
    <img class="cover" src="<?= $book['image'] ?>">
    <div class="book-info">
        <h1><?= $book['title'] ?></h1>
        <legend>Par <?= $book['author'] ?></legend>
        <img class="hr" src="./public/assets/image/Line 3.png" aria-hidden="true">
        
        <h3>DESCRIPTION</h3>
        <p><?= $book['description'] ?></p>

        <h3>PROPRIÉTAIRE</h3>
        <div class="cartouche">
            <img src="<?= $book['userPhoto'] ?>" class="photo-profile"> <span><?= $book['userName'] ?></span>
        </div>
        <button class="dark-button">Envoyer un message</button>        
    </div>
</section>