<?php
/*
* Page "Nos livres à l'échange"
*/
?>
<div class="books-container">
    <section class="title-list">
        <h1>Nos livres à l'échange</h1>
        <form action='search' method="POST" class="search-form">
            <input id="search-books" type="search" role="search" class="search-bar" placeholder="Rechercher un livre">
        </form>
    </section>
    <section class="grid-list">
        <?php foreach ($books as $book) { ?>
        <a href="index.php?action=book&id=<?= $book->getId() ?>">
            <ul class="card-book">
                <li>
                    <img class="cover" src="<?= $book->getImage() ?>">
                </li>
                <li class="title"><?= $book->getTitle() ?></li>
                <li class="author"><?= $book->getAuthor() ?></li>
                <li class="user">Vendu par : <?= $book->getUserName() ?></li>
            </ul>
        <?php } ?>
        </a>
    </section>
</div>