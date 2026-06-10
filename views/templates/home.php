<?php
/*
* Page d'accueil du site
*/
?>
<section class="welcome">
    <div class="welcome-home">
        <img src="./public/assets/images/hamza-photo.png" alt="Un lecteur au mileu de piles de livres" class="home-image">
        <legend class="welcome-legend">Hamza</legend>
</div>
    <div class="welcome-message">
        <h1>Rejoignez nos lecteurs passionnés</h1>
        <p class="welcome-message">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a href="index.php?action=books"><button class="dark-button">Découvrir</button></a>
    </div>
</section>

<section class="books-glass">
    <h2>Les derniers livres ajoutés</h2>
    <div class="grid-list">
        <?php foreach ($books as $book) { ?>
        <a href="index.php?action=book&id=<?= $book->getId() ?>" >
            <ul class="card-book">
                <li><img class="cover" src="<?= $book->getImage() ?>"></li>
                <li class="title"><?= $book->getTitle() ?></li>
                <li class="author"><?= $book->getAuthor() ?></li>
                <li class="user">Vendu par : <?= $book->getUserName() ?></li>
            </ul>
        <?php } ?>
    </div>
    <a href="index.php?action=books"><button class="desktop-menu dark-button">Voir tous les livres</button></a>
</section>

<section class="how-it-works">
    <h2>Comment ça marche ?</h2>
    <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
     <ul class="grid-boxes">
        <li class="box">Inscrivez-vous gratuitement sur notre plateforme.</li>
        <li class="box">Ajoutez les livres que vous souhaitez échanger à votre profil.</li>
        <li class="box">Parcourez les livres disponibles chez d'autres membres.</li>
        <li class="box">Proposez un échange et discutez avec d'autres passionnés de lecture.</li>
     </ul>
     <a href="index.php?action=books"><button class="light-button">Voir tous les livres</button></a>
</section>

<section class="banner" aria-hidden="true"></section>

<section class="values">
    <h2>Nos valeurs</h2>
    <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
    <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
    <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
    <legend>L'équipe Tom Troc</legend>
    <img src='./public/assets/images/icon_heart.svg' class="heart-icon">
</section>
