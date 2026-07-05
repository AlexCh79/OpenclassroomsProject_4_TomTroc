<?php 
/*
* Page Messagerie
*/
?>
<div class="messenger-layout">
    <aside aria-label="messenger" class="messenger">
        <h2>Messagerie</h2>
        <ul class="messages-list">
            <?php foreach($messages as $message){
                $listOther = $message->getOtherUser();
            ?>
            <a href="index.php?action=messenger&otherId=<?= $listOther->getId() ?>">
                <li><img src="<?= $listOther->getPhoto() ?>" class="photo-profile" aria-label="Profil de l'interlocuteur"></li>
                <div class="name-and-message">
                    <li class="user-pseudo" aria-label="Pseudo de l'utilisateur avec qui vous échangez"><?= $listOther->getPseudo() ?></li>
                    <li class="user-message" aria-label="Extrait du dernier message échangé"><?= mb_substr(nl2br($message->getContent()), 0, 40) . '...' ?></li>
                </div>
                <li class="user-hour" aria-label="Heure du dernier message"><?= $message->getSendDate()->format('H:i') ?></li>
            </a>
            <?php } ?>
        </ul>
    </aside>

    <div class="conversation-view mobile-hidden">
        <a class="return-page desktop-hidden" href="index.php?action=messenger" aria-label="Retour à la page précédente"><img aria-hidden="true" alt="" src="./public/assets/images/Line 6.png"> retour </a>
        <?php if ($conversation && $other) { ?>
            <section>
                <div class="cartouche-message">
                    <img src="<?= $other->getPhoto() ?>">
                    <span class="user-name"><?= $other->getPseudo() ?></span>
                </div>

                <ul class="conversation">
                    <?php foreach($conversation as $msg){ ?>
                        <?php if ($msg->getSendId() === $other->getId()) { ?>
                            <li class="message-date left-date">
                                <img class="mini-photo" src="<?= $other->getPhoto() ?>">
                                <?= $msg->getSendDate()->format('d:m H:i') ?>
                            </li>
                            <li class="message-content left-content"><?= $msg->getContent() ?></li>
                        <?php } else { ?>
                            <li class="message-date right-date"><?= $msg->getSendDate()->format('d:m H:i') ?></li>
                            <li class="message-content right-content"><?= $msg->getContent() ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>

                <form class="message-form" method="post" action="index.php?action=send&otherId=<?= $other->getId() ?>">
                    <textarea class="write-input" name="message" placeholder="Tapez votre message ici"></textarea>
                    <button type="submit" class="dark-button">Envoyer</button>
                </form>
            </section>

        <?php } else { ?>

            <section class="empty-conversation">
                <p>Sélectionnez une conversation</p>
            </section>

        <?php } ?>
    </div>

</div>