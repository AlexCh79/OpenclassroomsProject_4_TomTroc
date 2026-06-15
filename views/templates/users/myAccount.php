<?php
/*
* Page "Mon Compte"
*/
?>
<div class="account-section">
    <h1>Mon Compte</h1>
    <div class="user-info-container">
        <section class="my-account">
            <div class="user-card">
                <img aria-label="image de profil utilisateur" class="user-photo" src="<?= $user->getPhoto()  ?>">
                <a alt="Modifier la photo de profil">modifier</a>
                <img aria-hidden src="./public/assets/images/Line 5.png" class="user-card-hr">
                <h2 class="user-name"><?= $user->getName() ?></h2>
                <p class="user-date"><?= $user->getSince() ?></p>
                <p class="user-nb-books">BIBLIOTHEQUE</p>
                <p class="nb-books"><img aria-hidden="" src="./public/assets/images/Vector.svg"> <?= $nbBooks ?> Livres</p>
            </div>
        </section>
        <section class="personal-info">
            <h2>Vos informations personnelles</h2>
            <form class="info-form" action="index.php?action=uploadUser" method="post">
                <ul>
                    <li class="user-info">
                        <label for="email">Adresse email</label>
                        <input id="email" name="email" type="email" value="<?= $user->getEmail() ?>">
                    </li>
                    <li class="user-info">
                        <label for="password">Mot de passe</label>
                        <input id="password" name="password" type="password" placeholder="••••••••••">
                    </li>
                    <li class="user-info">
                        <label for="pseudo">Pseudo</label>
                        <input id="pseudo" name="pseudo" value="<?= $user->getName() ?>">
                    </li>
                </ul>
                <button type="submit" class="light-button">Enregistrer</button>
            </form>
        </section>
    </div>
</div>
<div class="users-books">
    <ul class="list-books">
        <?php foreach ($books as $book) { ?>
            <li class="user-book">
                <div class="user-book-header">
                    <img class="user-book-cover" src="<?= $book->getImage() ?>" aria-hidden="">
                    <div class="user-book-info">
                        <span class="user-book-title"><?= $book->getTitle() ?></span>
                        <span class="user-book-author"><?= $book->getAuthor() ?></span>
                        <?php if ($book->getStatus()) { ?>
                            <span class="available">disponible</span>
                        <?php } else { ?>
                            <span class="unavailable">non dispo.</span>
                        <?php } ?>
                    </div>
                </div>
                <p class="user-book-description"><?= mb_substr($book->getDescription(), 0, 90) . '...' ?></p>
                <nav class="book-upload-links">
                    <a class="book-editing" href="index.php?action=book-upload">Editer</a>
                    <a class="book-erasing" href="index.php?action-book-erase">Supprimer</a>
                </nav>
            </li>
        <?php } ?>
    </ul>
</div>