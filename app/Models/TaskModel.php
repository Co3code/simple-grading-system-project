<?php

namespace app\Models;

use config\DBConnection;
use PDO;

class TaskModel
{
    private $db;
    
    public function __construct(DBConnection $db)
    {
        $this->db = $db->getConnection();
    }

    //from this
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update($id, $title, $completed)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET title = :title, completed = :completed WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':completed', $completed, PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
