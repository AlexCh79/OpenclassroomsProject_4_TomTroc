<?php
/*
* Page de rédaction d'un nouveau message à un autre utilisateur
*/
?>
<section role="region" aria-label="Vos messages avec l'utilisateur">
    <a class="return-page" href="index.php?action=messenger" aria-label="Retour à la page précédente"><img aria-hidden="" src="./public/assets/images/Line 6.png"> retour </a>
    <div class="user-cartouche">
        <img aria-hidden="" src="<?= $other->getPhoto() ?>">
        <span class="user-name"><?= $other->getPseudo() ?></span>
    </div>
    <ul>
        <?php foreach($messages as $message){ 
            $message->setReadStatus(true) ;
        ?>
            <li class="message-date"><?= $message->getSendDate()->format('d:m H:i') ?></li>
            <li class="message-content"><?= $message->getContent() ?></li>
        <?php } ?>
    </ul>
    <form aria-label="Rédigez un nouveau message" method="post" action="index.php?action=send&otherId=<?= $other->getId() ?>">
        <input class="write-input" name="message" placeholder="Tapez votre message ici">
        <button type="submit" aria-label="Envoyer le message" class="dark-button">Envoyer</button>
    </form>
</section>