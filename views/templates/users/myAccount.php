<?php
/*
* Page "Mon Compte"
*/
?>
<div class="account-section">
    <h1>Mon Compte</h1>
    <div class="user-info-container">
        <section class="my-account" role="region" aria-label="Présentation de votre profil">
            <div class="user-card">
                <img aria-label="image du profil utilisateur" class="user-photo" role="img" src="<?= urldecode($user->getPhoto())  ?>">
                <a alt="Modifier la photo de profil">modifier</a>
                <img aria-hidden="true" src="./public/assets/images/Line 5.png" alt="" class="user-card-hr">
                <h2 class="user-name"><?= $user->getPseudo() ?></h2>
                <p class="user-date"><?= $user->getSince() ?></p>
                <p class="user-nb-books">BIBLIOTHEQUE</p>
                <p class="nb-books"><img aria-hidden="true" alt="icone de livre" src="./public/assets/images/Vector.svg"> <?= $nbBooks ?> Livres</p>
            </div>
        </section>
        <section class="personal-info" role="region" aria-label="Vos informations">
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
                        <input id="pseudo" name="pseudo" value="<?= $user->getPseudo() ?>">
                    </li>
                </ul>
                <button type="submit" class="light-button" aria-label="Enregistrez vos modifications">Enregistrer</button>
            </form>
        </section>
    </div>
</div>
<div class="new-book">
        <a href="index.php?action=new" aria-label="Ajout d'un nouveau livre" class="light-button new-book">Ajouter un livre</a>
</div>

<!-- Liste des livres version mobile -->
<div class="users-books">
    <ul class="list-books">
        <?php foreach ($books as $book) { ?>
            <li class="user-book">
                <div class="user-book-header">
                    <img class="user-book-cover" src="<?= urldecode($book->getImage()) ?>" alt="Couverture">
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
                <nav class="book-upload-links" aria-label="Actions pour modifier le livre" role="navigation">
                    <a class="book-editing" href="index.php?action=display&id=<?= $book->getId() ?>">Editer</a>
                    <a class="book-erasing" href="index.php?action=erase&id=<?= $book->getId() ?>">Supprimer</a>
                </nav>
            </li>
        <?php } ?>
    </ul>
</div>
<!-- Liste des livres version ordinateur -->
<div class="desktop-list">
    <table aria-label="Liste de vos livres">
        <thead>
            <tr>
                <th scope="col">PHOTO</th>
                <th scope="col">TITRE</th>
                <th scope="col">AUTEUR</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">DISPONIBILITE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) { ?>
            <tr>
                <th scope="row"><img  alt="Couverture du livre" class="user-book-cover" src="<?= urldecode($book->getImage()) ?>"></th>
                <?php if(strlen($book->getTitle() > 25)) { ?>
                    <td class="user-book-title"><?= mb_substr($book->getTitle(), 0, 20) . '...' ?></td>
                <?php } else { ?>
                    <td class="user-book-title"><?= $book->getTitle()?></td>
                <?php } ?>
                <td class="user-book-author"><?= $book->getAuthor() ?></td>
                <td class="user-book-description"><?= mb_substr($book->getDescription(), 0, 90) . '...' ?></td>
                <?php if ($book->getStatus()) { ?>
                    <th>
                        <span class="available">disponible</span>
                    </th>
                <?php } else { ?>
                    <th>
                        <span class="unavailable">non dispo.</span>
                    </th>
                <?php } ?>
                <th class="actions">
                    <a class="book-editing" href="index.php?action=display&id=<?= $book->getId() ?>">Editer</a>
                    <a class="book-erasing" href="index.php?action=delete&id=<?= $book->getId() ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?');">Supprimer</a>
                </th>              
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>