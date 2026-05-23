<?php
/*
* Page d'accueil du site
*/
// Pour tester :
?>
<h2>Liste des utilisateurs</h2>

<?php foreach ($users as $user): ?>
    <p><?= $user['name'] ?></p>
<?php endforeach; ?>
