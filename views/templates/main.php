<?php

/*
* Template principal
*/
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="./public/assets/css/style.css">
        <link rel="icon" type="image/x-icon" href="./public/assets/images/favicon.ico">

        <!-- Chargement de la police des titres principaux -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        
        <!-- Chargement de la police des corps de texte -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php require_once 'header.php'; ?>

        <main>
            <?= $content ?>
        </main>

        <?php require_once 'footer.php'; ?>

        <script>
            <?php require_once './public/assets/script/script.js'; ?>
        </script>
    </body>
</html>