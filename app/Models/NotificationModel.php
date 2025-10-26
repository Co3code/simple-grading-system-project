<?php

namespace app\Models;

use config\DBConnection;
use PDO;

class NotificationModel
{
    private $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db->getConnection();
    }
    
    // Add your custom methods below to interact with the database.

    public function getNotification($studentId)
    {
        $stmt = $this->db->prepare("SELECT * FROM notifications WHERE receiver_id = :user_id ORDER BY created_at DESC");
        $stmt->bindParam(':user_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addNotification($receiverId, $senderId, $title, $message, $link)
    {
        $stmt = $this->db->prepare("INSERT INTO notifications (receiver_id, sender_id, title, message, link)
            VALUES (:receiver_id, :sender_id, :title, :message, :link)");
        $stmt->bindParam(':receiver_id', $receiverId, PDO::PARAM_STR);
        $stmt->bindParam(':sender_id', $senderId, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':link', $link, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM notifications WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function markAsRead($id)
    {
        $stmt = $this->db->prepare("UPDATE notifications SET is_read = 1 WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}