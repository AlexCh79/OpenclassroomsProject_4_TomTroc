<?php
/*
* Page "Edition livre"
*/
?>
<a class="return-page" href="index.php?action=myAccount" aria-label="Retour à la page précédente"><img aria-hidden="true" alt="flèche vers la gauche" src="./public/assets/images/Line 6.png"> retour </a>
<h2 class="upload-title">Modifier les informations</h2>
<div>
    <section role="region" aria-label="Informations du livre" class="book-container">
        <div aria-label="Photo de couverture" class="cover-container">
            <img role="img" aria-label="Couverture du livre" src="<?= urldecode($book->getImage()) ?>">
            <a class="book-editing" href="index.php?action=update-image&id=<?= $book->getId() ?>">Modifier la photo</a>
        </div>
        <form role="form" aria-label="Modifiez les informations du livre" class="info-container" action="index.php?action=update&id=<?= $book->getId() ?>" method="post">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="<?= $book->getTitle() ?>">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" value="<?= $book->getAuthor() ?>">
            <label for="description">Commentaire</label>
            <textarea name="description" id="description"><?= $book->getDescription() ?></textarea>
            <label for="availability">Disponibilité</label>
            <select name="availability" id="availability">
                <!-- On affiche la valeur liée au statut de disponibilité du livre -->
                <?php if ($book->getStatus()) { ?>
                    <option value="available">disponible</option>
                    <option value="unavailable">indisponible</option>
                <?php } else { ?>
                    <option value="unavailable">indisponible</option>
                    <option value="available">disponible</option>
                <?php } ?>
            </select>
            <button type="submit" class="dark-button">Valider</button>
        </form>
    </section>
</div>