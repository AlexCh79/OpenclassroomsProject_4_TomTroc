<?php
/*
* Manager des messages
*/
class MessageManager extends AbstractManager
{
    // Récupération des messages de l'utilisateur connecté
    public function getAll(int $id): array
    {
        $sql = "SELECT *
            FROM messages m
            INNER JOIN (
                SELECT 
                    LEAST(send_id, receive_id) AS user1,
                    GREATEST(send_id, receive_id) AS user2,
                    MAX(send_date) AS last_date
                FROM messages
                WHERE send_id = :id OR receive_id = :id
                GROUP BY user1, user2
            ) conv ON 
                (
                    LEAST(m.send_id, m.receive_id) = conv.user1
                    AND 
                    GREATEST(m.send_id, m.receive_id) = conv.user2
                    AND 
                    m.send_date = conv.last_date
                )
            ORDER BY m.send_date DESC;
            ";
        $result = $this->db->prepare($sql);
        $result->execute([
            'id' => $id,
        ]);

        $messages = [];
        
        while ($message = $result->fetch()){
            $messages[] = new Message($message);
        }

        return $messages;
    }

    // Récupération des messages échangés avec un utilisateur en particulier
    public function getConversation(int $id, int $otherId): array
    {
        $sql = "SELECT * FROM messages WHERE (send_id = :me AND receive_id = :other) OR (send_id = :other AND receive_id = :me) ORDER BY send_date";
        $result = $this->db->prepare($sql);
        $result->execute([
            'me' => $id,
            'other' => $otherId,
        ]);

        $messages = [];

        while ($message = $result->fetch()){
            $messages[] = new Message($message);
        }
        
        return $messages;
    }

    // Envoi d'un nouveau message
    public function sending(?Message $message): void
    {
        $sql = "INSERT INTO messages (send_id, receive_id, content) VALUES (:id, :otherId, :content)";
        $result = $this->db->prepare($sql);
        $result->execute([
            'id' => $message->getSendId(),
            'otherId' => $message->getReceiveId(),
            'content' => $message->getContent(),
        ]);
    }
}