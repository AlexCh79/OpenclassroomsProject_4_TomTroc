<?php
/*
* Page "Nos livres à l'échange"
*/
?>
<div class="books-container">
    <section class="title-list" role="region" aria-label="Liste et recherche des livres du site">
        <h1>Nos livres à l'échange</h1>
        <form action="" class="search-form" role="search">
            <label class="hidden" for="search-books">Quel livre recherchez-vous ?</label>
            <input id="search-books" name="book wanted" type="search" role="search" class="search-bar" placeholder="Rechercher un livre">
        </form>
    </section>
    <section class="grid-list" role="region" aria-label="Liste des livres">
        <?php foreach ($books as $book) { ?>
        <a href="index.php?action=book&id=<?= $book->getId() ?>" aria-label="vers les détails du livre">
            <ul class="card-book">
                <li>
                    <img alt="couverture du livre" role="img" class="cover" src="<?= urldecode($book->getImage()) ?>">
                </li>
                <?php if(strlen($book->getTitle()) > 25) { ?>
                    <li class="title"><?= mb_substr($book->getTitle(), 0, 20) . '...' ?></li>
                <?php } else { ?>
                    <li class="title"><?= $book->getTitle() ?></li>
                <?php } ?>
                <li class="author"><?= $book->getAuthor() ?></li>
                <li class="user">Vendu par : <?= $book->getUserName() ?></li>
            </ul>
        <?php } ?>
        </a>
    </section>
</div>