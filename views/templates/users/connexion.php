<?php 
/*
* Page "Connexion"
*/
?>
<section class="connexion">
    <div class="connexion-form">
        <h1>Connexion</h1>
        <form action="index.php?action=logUser" method="post">
            <label for="email">Adresse email :</label>
            <br>
            <input type="email" id="email" name="email" required>

            <br>
            
            <label for="password">Mot de passe :</label>
            <br>
            <input type="password" id="password" name="password" required>

            <br>

            <button type="submit" class="dark-button">Se connecter</button>
        </form>
        <p class="connexion-link">Pas encore de compte ? <a href="index.php?action=signUp">Inscrivez-vous</a></p>
    </div>
    <div class="deco-cover">
        <img src="./public/assets/images/signup_cover.png" aria-hidden="true" alt="Etagère remplie de livres">
    </div>
</section>    