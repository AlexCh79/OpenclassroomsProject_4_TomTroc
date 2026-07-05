<?php
/*
* Page de rédaction d'un nouveau message à un autre utilisateur
*/
?>
<div class="messenger-layout">
    <div class="conversation-view">
        <section role="region" aria-label="Vos messages avec l'utilisateur">
            <a class="return-page desktop-hidden" href="index.php?action=messenger" aria-label="Retour à la page précédente"><img aria-hidden="true" alt="" src="./public/assets/images/Line 6.png"> retour </a>
            <div class="cartouche-message">
                <img aria-label="Profil de l'interlocuteur" src="<?= $other->getPhoto() ?>" role="img">
                <span class="user-name"><?= $other->getPseudo() ?></span>
            </div>
            <ul class="conversation">
                <?php foreach($messages as $message){ 
                    $message->setReadStatus(true) ;
                ?>
                    <?php if ($message->getSendId() === $other->getId()) { ?>
                        <li class="message-date left-date"><img class="mini-photo" aria-hidden="true" alt="" src="<?= $other->getPhoto() ?>"><?= $message->getSendDate()->format('d:m H:i') ?></li>
                        <li class="message-content left-content"><?= $message->getContent() ?></li>
                    <?php } else { ?>
                        <li class="message-date right-date"><?= $message->getSendDate()->format('d:m H:i') ?></li>
                        <li class="message-content right-content"><?= $message->getContent() ?></li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <form class="message-form" aria-label="Rédigez un nouveau message" method="post" action="index.php?action=send&otherId=<?= $other->getId() ?>">
                <label class="hidden" for="message">Votre message</label>
                <textarea class="write-input" name="message" id="message" placeholder="Tapez votre message ici"></textarea>
                <button type="submit" aria-label="Envoyer le message" class="dark-button">Envoyer</button>
            </form>
        </section>
    </div>
</div>