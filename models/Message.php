<?php 
/*
* Classe messages pour la messagerie
*/
class Message extends AbstractEntity
{
    // Propriétés
    private int $sendId; // Utilisateur expéditeur
    private int $receiveId; // Utilisateur destinataire
    private DateTime $sendDate;
    private string $content;
    private bool $readStatus = false; 
    private User $otherUser; // Utilisateur qui échange avec l'utilisateur connecté

    // Constructeur et ID du message gérés par la classe abstraite

    // Setter et Getter

    // ID de l'utilisateur expéditeur
    public function setSendId(int $sendId): void
    {
        $this->sendId = $sendId;
    }

    public function getSendId(): int
    {
        return $this->sendId;
    }

    // ID de l'utilisateur destinataire
    public function setReceiveId(int $receiveId): void
    {
        $this->receiveId = $receiveId;
    }

    public function getReceiveId(): int
    {
        return $this->receiveId;
    }

    // Date d'envoi du message
    public function setSendDate(string | DateTime $sendDate): void
    {
        // Convertit la date reçu en string vers un objet DateTime
        if (is_string($sendDate)) {
            $sendDate = new DateTime($sendDate);
        }

        $this->sendDate = $sendDate;
    }

    public function getSendDate(): DateTime
    {
        return $this->sendDate;
    }

    // Contenu du message
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    // Statut lu (true) ou non-lu (false)
    public function setReadStatus(bool $readStatus): void
    {
        $this->readStatus = $readStatus;
    }

    public function getReadStatus(): bool
    {
        return $this->readStatus;
    }

    // Utilisateur avec qui échange celui qui est connecté
    public function setOtherUser(User $otherUser): void
    {
        $this->otherUser = $otherUser;
    }

    public function getOtherUser(): User
    {
        return $this->otherUser;
    }
}