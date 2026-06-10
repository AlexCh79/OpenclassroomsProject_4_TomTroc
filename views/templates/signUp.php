<?php 
/*
* Page "Inscription"
*/
?>
<section class="connexion">
    <div class="connexion-form">
        <h1>Inscription</h1>
        <form action="index.php?action=subscribe" method="post">
            <label for="email">Adresse email :</label>
            <br>
            <input type="email" id="email" name="email" required>

            <br>
            
            <label for="password">Mot de passe :</label>
            <br>
            <input type="password" id="password" name="password" required>

            <br>

            <button type="submit" class="dark-button">S'inscrire</button>
        </form>
        <p class="connexion-link">Déjà inscrit ? <a href="index.php?action=login">Connectez-vous</a></p>
    </div>
    <div class="deco-cover">
        <img src="./public/assets/images/signup_cover.png">
    </div>
</section>    