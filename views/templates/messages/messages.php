<?php 
/*
* Page Messagerie
*/
?>
<section role="region" aria-label="messenger" class="messenger">
    <h2>Messagerie</h2>
    <ul class="messages-list">
        <?php foreach($messages as $message){
            $other = $message->getOtherUser();
        ?>
        <a href="index.php?action=write&otherId=<?= $other->getId() ?>">
            <li aria-hidden=""><img src="<?= $other->getPhoto() ?>" class="photo-profile" aria-label="Profil de l'interlocuteur"></li>
            <div class="name-and-message">
                <li class="user-pseudo" aria-label="Pseudo de l'utilisateur avec qui vous échangez"><?= $other->getPseudo() ?></li>
                <li class="user-message" aria-label="Extrait du dernier message échangé"><?= mb_substr(nl2br($message->getContent()), 0, 40) . '...' ?></li>
            </div>
            <li class="user-hour" aria-label="Heure du dernier message"><?= $message->getSendDate()->format('H:i') ?></li>
        </a>
        <?php } ?>
    </ul>
</section>