<?php

namespace app\Models;

use config\DBConnection;
use PDO;

class RegisterModel
{
    private $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db->getConnection();
    }

    //delete/clean temp db if over 5 mins
    public function cleanExpiredTempRegistrations()
    {
        $stmt = $this->db->prepare("DELETE FROM temp_registrations WHERE created_at < NOW() - INTERVAL 5 MINUTE");
        return $stmt->execute();
    }

    //check if already used
    public function checkEmailExists($email)
    {
        $stmt = $this->db->prepare("SELECT student_id FROM student WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    //prevent spam verification code
    public function getLastTempRegistration($email)
    {
        // Only 5 minutes can get code
        $stmt = $this->db->prepare("SELECT created_at FROM temp_registrations 
                                     WHERE email = ? 
                                     AND created_at > NOW() - INTERVAL 5 MINUTE 
                                     ORDER BY created_at DESC LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //delete old code
    public function deleteTempRegistration($email)
    {
        $stmt = $this->db->prepare("DELETE FROM temp_registrations WHERE email = ?");
        return $stmt->execute([$email]);
    }

    //create new code
    public function createTempRegistration($email, $code)
    {
        $stmt = $this->db->prepare("INSERT INTO temp_registrations (email, verification_code, created_at) VALUES (?, ?, NOW())");
        return $stmt->execute([$email, $code]);
    }

    //check if code matches in the sent code to email
    public function verifyCode($email, $code)
    {
        $stmt = $this->db->prepare("SELECT created_at FROM temp_registrations WHERE email = ? AND verification_code = ? ORDER BY created_at DESC LIMIT 1");
        $stmt->execute([$email, $code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //check user if exited
    public function checkUserExists($email, $username)
    {
        $stmt = $this->db->prepare("SELECT student_id FROM student WHERE email = ? OR id_number = ?");
        $stmt->execute([$email, $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    //check phone if existed
    public function checkPhoneExists($phone_number)
    {
        $stmt = $this->db->prepare("SELECT student_id FROM student WHERE phone_number = ? LIMIT 1");
        $stmt->execute([$phone_number]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    //insert new student in student table in db
    public function createUser($data)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO student 
                (first_name, middle_name, last_name, suffix, year_level, id_number, phone_number, email, password, security_question, security_answer, is_verified) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

            $result = $stmt->execute([
                $data['first_name'],
                $data['middle_name'],
                $data['last_name'],
                $data['suffix'],
                $data['year_level'],
                $data['id_number'],
                $data['phone_number'],
                $data['email'],
                $data['password'],
                $data['security_question'],
                $data['security_answer']
            ]);

            return $result;
        } catch (\PDOException $e) {
            error_log("Database error in createUser: " . $e->getMessage());
            error_log("SQL State: " . $e->getCode());
            error_log("Student data: " . json_encode([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'id_number' => $data['id_number']
            ]));
            return false;
        }
    }
}
