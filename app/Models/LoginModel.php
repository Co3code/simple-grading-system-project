<?php

namespace app\Models;

use config\DBConnection;
use PDO;

class LoginModel
{
    private $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db->getConnection();
    }

    //fetch credentials based on there email
    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT student_id, id_number, email, password, first_name, last_name FROM student WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //get SQ based the id_number
    public function getSecurityQuestion($username)
    {
        $stmt = $this->db->prepare("SELECT security_question FROM student WHERE id_number = ? LIMIT 1");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //retrieves all data by the id number
    public function getUserByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT student_id, id_number, email, first_name, last_name, security_question, security_answer FROM student WHERE id_number = ? LIMIT 1");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //checks how many attemps they did
    public function getParentAttempts($id_number)
    {
        $stmt = $this->db->prepare("SELECT attempts, last_attempt FROM parent_login_attempts WHERE id_number = ?");
        $stmt->execute([$id_number]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //create new parent record for first time
    public function createParentAttempt($id_number)
    {
        $stmt = $this->db->prepare("INSERT INTO parent_login_attempts (id_number, attempts, last_attempt) VALUES (?, 1, NOW())");
        return $stmt->execute([$id_number]);
    }

    //+1 each attempt
    public function updateParentAttempts($id_number, $attempts)
    {
        $stmt = $this->db->prepare("UPDATE parent_login_attempts SET attempts = ?, last_attempt = NOW() WHERE id_number = ?");
        return $stmt->execute([$attempts, $id_number]);
    }

    //reset attemp if succeed login
    public function resetParentAttempts($id_number)
    {
        $stmt = $this->db->prepare("DELETE FROM parent_login_attempts WHERE id_number = ?");
        return $stmt->execute([$id_number]);
    }

    public function getFacultyByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM faculty WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAdminByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
