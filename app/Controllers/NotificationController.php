<?php

namespace app\Controllers;

use config\DBConnection;
use app\Models\NotificationModel;

class NotificationController
{
    private $NotificationModel;

    public function __construct()
    {
        $db = new DBConnection();
        $this->NotificationModel = new NotificationModel($db);

        if (isset($_SESSION['student_id'])) {
            $GLOBALS['notifications'] = $this->NotificationModel->getNotification($_SESSION['student_id']);
        }
    }

    // Add your custom controllers below to handle business logic.

    public function openNotification($id)
    {
        $notification = $this->NotificationModel->getById($id);

        if ($notification) {
            $this->NotificationModel->markAsRead($id);
            header("Location: " . $notification['link']);
            exit();
        } else {
            header("Location: /dashboard"); // fallback if missing
            exit();
        }
    }
}
