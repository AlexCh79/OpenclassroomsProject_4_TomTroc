<?php
/*
* Page "Ajout d'un livre"
*/
?>
<a class="return-page" href="index.php?action=myAccount" aria-label="Retour à la page précédente"><img aria-hidden="true" alt="flèche vers la gauche" src="./public/assets/images/Line_6.png"> retour </a>
<h2 class="upload-title">Ajouter un nouveau livre</h2>
<div>
    <section aria-label="Informations du livre" class="book-container">
        <form aria-label="Ajoutez les informations du livre" class="info-container" action="index.php?action=add" method="post">
            <div class="cover-container">
                <img src="./public/assets/images/cover_default.png" aria-label="couverture par défaut">
                <label for="url-photo">Ajouter la photo de couverture</label>
                <input type="url" name="url-photo" id="url-photo" placeholder="Adresse URL de votre image de type 'https://...'">
            </div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author">
            <label for="description">Commentaire</label>
            <textarea name="description" id="description"></textarea>
            <label for="availability">Disponibilité</label>
            <select name="availability" id="availability">
                    <option value="available">disponible</option>
                    <option value="unavailable">indisponible</option>
            </select>
            <button type="submit" class="dark-button">Valider</button>
        </form>
    </section>
</div>