<?php
/*
* Page "Profil public"
*/
?>
<div class="page-container">
    <div class="profile-section">
        <div class="user-info-container profile-info">
            <section class="my-account" role="region" aria-label="Présentation du profil">
                <div class="user-card">
                    <img aria-label="image du profil utilisateur" class="user-photo" src="<?= urldecode($user->getPhoto())  ?>">
                    <img aria-hidden="true" alt="" src="./public/assets/images/Line 5.png" class="user-card-hr">
                    <h2 class="user-name"><?= $user->getPseudo() ?></h2>
                    <p class="user-date"><?= $user->getSince() ?></p>
                    <p class="user-nb-books">BIBLIOTHEQUE</p>
                    <p class="nb-books"><img aria-hidden="true" alt="icone de livre" src="./public/assets/images/Vector.svg"> <?= $nbBooks ?> Livres</p>
                    <a href="index.php?action=messenger"><button class="light-button">Envoyer un message</button></a>
                </div>
            </section>
        </div>
    </div>

    <!-- Liste des livres version mobile -->
    <div class="users-books">
        <ul class="list-books">
            <?php foreach ($books as $book) { ?>
                <li class="user-book">
                    <div class="user-book-header">
                        <img class="user-book-cover" src="<?= urldecode($book->getImage()) ?>" aria-label="Couverture">
                        <div class="user-book-info">
                            <span class="user-book-title"><?= $book->getTitle() ?></span>
                            <span class="user-book-author"><?= $book->getAuthor() ?></span>
                        </div>
                    </div>
                    <p class="user-book-description"><?= mb_substr($book->getDescription(), 0, 90) . '...' ?></p>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- Liste des livres version ordinateur -->
    <div class="desktop-profile">
        <table aria-label="Liste des livres de l'utilisateur" class="table-books">
            <thead>
                <tr>
                    <th scope="col">PHOTO</th>
                    <th scope="col">TITRE</th>
                    <th scope="col">AUTEUR</th>
                    <th scope="col">DESCRIPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) { ?>
                <tr>
                    <th scope="row"><img  aria-label="Couverture" class="user-book-cover" src="<?= urldecode($book->getImage()) ?>"></th>
                    <?php if(strlen($book->getTitle() > 25)) { ?>
                        <td class="user-book-title"><?= mb_substr($book->getTitle(), 0, 20) . '...' ?></td>
                    <?php } else { ?>
                        <td class="user-book-title"><?= $book->getTitle()?></td>
                    <?php } ?>
                    <td class="user-book-author"><?= $book->getAuthor() ?></td>
                    <td class="user-book-description"><?= mb_substr($book->getDescription(), 0, 90) . '...' ?></td>            
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>