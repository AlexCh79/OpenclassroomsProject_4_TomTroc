<?php
/*
* Page d'accueil du site
*/
?>
<section class="welcome" role="region" aria-label="Présentation du site">
    <figure class="welcome-home">
        <caption><img src="./public/assets/images/hamza-photo.png" alt="Un lecteur au mileu de piles de livres" class="home-image"></caption>
        <legend class="welcome-legend">Hamza</legend>
    </figure>
    <div class="welcome-message">
        <h1>Rejoignez nos lecteurs passionnés</h1>
        <p class="welcome-message">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a href="index.php?action=books"><button role="button" aria-label="vers la liste des livres" class="dark-button">Découvrir</button></a>
    </div>
</section>

<section class="books-glass" role="region" aria-label="Aperçu des derniers livres ajoutés">
    <h2>Les derniers livres ajoutés</h2>
    <div class="grid-list">
        <?php foreach ($books as $book) { ?>
        <a href="index.php?action=book&id=<?= $book->getId() ?>" aria-label="Afficher les détails du livre" role="link">
            <ul class="card-book">
                <li><img aria-label="Couverture du livre" class="cover" src="<?= urldecode($book->getImage()) ?>"></li>
                <?php if(strlen($book->getTitle()) > 25) { ?>
                    <li class="title"><?= mb_substr($book->getTitle(), 0, 20) . '...' ?></li>
                <?php } else { ?>
                    <li class="title"><?= $book->getTitle() ?></li>
                <?php } ?>
                <li class="author"><?= $book->getAuthor() ?></li>
                <li class="user">Vendu par : <?= $book->getUserName() ?></li>
            </ul>
        <?php } ?>
    </div>
    <a href="index.php?action=books"><button class="desktop-menu dark-button" role="button" aria-label="vers la liste des livres">Voir tous les livres</button></a>
</section>

<section class="how-it-works" role="region" aria-label="Explications du fonctionnement du site">
    <h2>Comment ça marche ?</h2>
    <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
     <ul class="grid-boxes">
        <li class="box">Inscrivez-vous gratuitement sur notre plateforme.</li>
        <li class="box">Ajoutez les livres que vous souhaitez échanger à votre profil.</li>
        <li class="box">Parcourez les livres disponibles chez d'autres membres.</li>
        <li class="box">Proposez un échange et discutez avec d'autres passionnés de lecture.</li>
     </ul>
     <a href="index.php?action=books"><button class="light-button" role="button" aria-label="Liste des livres">Voir tous les livres</button></a>
</section>

<section class="banner" aria-hidden="true" alt="bannière décorative" role="img"></section>

<section class="values" aria-label="Les valeurs du site" role="region">
    <h2>Nos valeurs</h2>
    <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
    <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
    <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
    <legend>L'équipe Tom Troc</legend>
    <img src='./public/assets/images/icon_heart.svg' class="heart-icon" aria-hidden="true" alt="Un coeur">
</section>