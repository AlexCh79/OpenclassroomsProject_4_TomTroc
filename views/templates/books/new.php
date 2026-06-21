<?php
/*
* Page "Ajout d'un livre"
*/
?>
<a class="return" href="index.php?action=myAccount"><img aria-hidden="" src="./public/assets/images/Line 6.png"> retour </a>
<h2 class="upload-title">Ajouter un nouveau livre</h2>
<div>
    <section role="region" aria-label="Informations du livre" class="book-container">
        <form role="form" aria-label="Ajoutez les informations du livre" class="info-container" action="index.php?action=add" method="post">
            <div aria-label="Photo de couverture" class="cover-container">
                <img src="./public/assets/images/cover_default.png">
                <label for="url-photo">Ajouter la photo de couverture</label>
                <input type="url" name="url-photo" placeholder="Adresse URL de votre image de type 'https://...'">
            </div>
            <label for="title">Titre</label>
            <input type="text" name="title">
            <label for="author">Auteur</label>
            <input type="text" name="author">
            <label for="description">Commentaire</label>
            <textarea name="description"></textarea>
            <label for="availability">Disponibilité</label>
            <select name="availability">
                    <option value="available">disponible</option>
                    <option value="unavailable">indisponible</option>
            </select>
            <button type="submit" class="dark-button">Valider</button>
        </form>
    </section>
</div>