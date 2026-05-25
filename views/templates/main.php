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
        <link rel="icon" type="image/x-icon" href="./public/assets/image/favicon.ico">
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