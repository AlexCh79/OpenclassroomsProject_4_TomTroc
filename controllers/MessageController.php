<?php
/*
* Controlleur des messages
*/
class MessageController
{
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
}