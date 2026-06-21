<?php
/*
* Manager des messages
*/
class MessageManager extends AbstractManager
{
    // Récupération des messages de l'utilisateur connecté
    public function getAll(int $id): array
    {
        $sql = "SELECT * FROM messages WHERE send_id = :send_id OR receive_id = :receive_id ORDER BY send_date DESC LIMIT 10";
        $result = $this->db->prepare($sql);
        $result->execute([
            'send_id' => $id,
            'receive_id' => $id,
        ]);

        $messages = [];
        
        while ($message = $result->fetch()){
            $messages[] = new Message($message);
        }

        return $messages;
    }
}