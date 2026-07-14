<?php
/*
* Controlleur des messages
*/
class MessageController
{
    // Affichage de la messagerie
public function getMessenger(): void
{
    $messageManager = new MessageManager();
    $messages = $messageManager->getAll($_SESSION['idUser']);

    $userManager = new UserManager();

    // Préparer la liste des interlocuteurs
    foreach($messages as $message){
        if($message->GetSendId() === $_SESSION['idUser']){
            $otherId = $message->getReceiveId();
        } else {
            $otherId = $message->getSendId();
        }

        $otherUser = $userManager->getUserById($otherId);
        $message->setOtherUser($otherUser);
    }

    // Charger la conversation si un interlocuteur est cliqué
    $conversation = null;
    $other = null;

    if (isset($_GET['otherId'])) {
        $otherId = (int) $_GET['otherId'];
        $other = $userManager->getUserById($otherId);
        $conversation = $messageManager->getConversation($_SESSION['idUser'], $otherId);
    }

    // Rendu
    $view = new View("Messagerie");
    $view->render('messages/messages', [
        'messages' => $messages,
        'conversation' => $conversation,
        'other' => $other
    ]);
}


    /*
    * Affichage des messages échangés avec un seul utilisateur
    */
    public function displayConversation(): void
    {
        $otherId = (int) Utils::request('otherId');

        $userManager = new UserManager();
        $otherUser = $userManager->getUserById($otherId);

        $messageManager = new MessageManager();
        $messages = $messageManager->getConversation($_SESSION['idUser'], $otherId);

        $view = new View('Conversation');
        $view->render('messages/write', ['messages' => $messages, 'other' => $otherUser]);
    }

    /*
    * Envoi d'un message
    */
    public function send(): void
    {
        // Récupération des données
        $otherId = (int) Utils::request('otherId');
        $content = htmlspecialchars(Utils::request('message'));

        // Vérification que le message n'est pas vide
        if(empty($content)){
            throw new Exception('Le message est vide.');
        }

        $message = new Message();
        $message->setSendId($_SESSION['idUser']);
        $message->setReceiveId($otherId);
        $message->setContent($content);
        
        $messageManager = new MessageManager();
        $messageManager->sending($message);

        // Retour à la conversation
        $this->getMessenger();
    }

    /*
    * Affichage du nombre de messages non lus
    */
    public function showUnreadMessages(): int
    {
        // Si l'utilisateur n'est pas connecté, on affichera 0 messages par défaut
        if (!isset($_SESSION['idUser'])) {
            return 0;
        }

        $messageManager = new MessageManager();
        $unreadCount = $messageManager->getUnreadMessages($_SESSION['idUser']);

        $message = new Message();
        $message->setUnread($unreadCount);

        return $message->getUnread();
    }

    /*
    * Passer un message en statut lu
    */
    public function markAsRead(int $messageId): void
    {
        $messageManager = new MessageManager();
        $messageManager->markAsRead($messageId);
    }
}