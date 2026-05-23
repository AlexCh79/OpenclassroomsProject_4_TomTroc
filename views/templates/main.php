<?php

/*
* Template principal
* Pour le moment, limité pour tester les différentes classes et liaisons préparées
*/
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <header>
                <?php require_once 'header.php'; ?>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer>
            <?php require_once 'footer.php'; ?>
        </footer>
        <script>
            const burger = document.querySelector('.burger');
            const menu = document.querySelector('.mobile-menu');

            burger.addEventListener('click', () => {
                menu.classList.toggle('open');
            });
        </script>
    </body>
</html>