<?php
/*
* Controlleur des messages
*/
class MessageController
{
    // Affichage de la messagerie
    public function getMessenger(): void
    {
        $id = (int) $_SESSION['idUser'];

        $messageManager = new MessageManager();
        $messages = $messageManager->getAll($id);

        $userManager = new UserManager();

        foreach($messages as $message){
            if($message->GetSendId() === $id){
                $otherId = $message->getReceiveId();
            } else {
                $otherId = $message->getSendId();
            }

            $otherUser = $userManager->getUserById($otherId);

            $message->setOtherUser($otherUser);
        }

        $view = new View("Messagerie");
        $view->render('messages/messages', ['messages' => $messages]);
    }

    /*
    * Affichage des messages échangés avec un seul utilisateur
    */
    public function displayConversation(): void
    {
        $id = (int) $_SESSION['idUser'];
        $otherId = (int) Utils::request('otherId');

        $userManager = new UserManager();
        $otherUser = $userManager->getUserById($otherId);

        $messageManager = new MessageManager();
        $messages = $messageManager->getConversation($id, $otherId);

        $view = new View('Conversation');
        $view->render('messages/write', ['messages' => $messages, 'other' => $otherUser]);
    }

    /*
    * Envoi d'un message
    */
    public function send(): void
    {
        // Récupération des données
        $id = (int) $_SESSION['idUser'];
        $otherId = (int) Utils::request('otherId');
        $content = htmlspecialchars(Utils::request('message'));

        // Vérification que le message n'est pas vide
        if(empty($content)){
            throw new Exception('Le message est vide.');
        }

        $message = new Message();
        $message->setSendId($id);
        $message->setReceiveId($otherId);
        $message->setContent($content);
        
        $messageManager = new MessageManager();
        $messageManager->sending($message);

        // Retour à la conversation
        $this->displayConversation();
    }
}