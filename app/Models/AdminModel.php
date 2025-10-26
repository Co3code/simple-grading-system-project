<?php

namespace app\Models;

use config\DBConnection;
use PDO;

class AdminModel
{
    private $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db->getConnection();
    }

    // Add your custom methods below to interact with the database.

    // =========================== LOGIN MODELS =========================== //
    public function getAdmin()
    {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // =========================== DASHBOARD MODELS =========================== //
    public function getTotalFaculty()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM faculty");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalSubjects()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM subject");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // =========================== FACULTY MODELS =========================== //
    public function getAllFaculty()
    {
        $stmt = $this->db->query("SELECT * FROM faculty ORDER BY id_number DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertFaculty($firstName, $lastName, $password, $mobile_number, $gender, $email, $idNumber)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO faculty (first_name, last_name, password, phone_number, gender, email, id_number) 
             VALUES (:first_name, :last_name, :password, :mobile_number,:gender, :email, :id_number)"
        );
        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':mobile_number', $mobile_number, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_number', $idNumber, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function getFacultyById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM faculty WHERE faculty_id = :id_number");
        $stmt->bindParam(':id_number', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateFaculty($id, $firstName, $lastName, $password, $mobile_number, $gender, $email, $idNumber)
    {
        $stmt = $this->db->prepare(
            "UPDATE faculty 
             SET first_name = :first_name, 
                 last_name = :last_name, 
                 password = :password, 
                 phone_number = :mobile_number,
                 gender = :gender, 
                 email = :email, 
                 id_number = :id_number 
             WHERE faculty_id = :id"
        );

        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':mobile_number', $mobile_number, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_number', $idNumber, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // ============================================ SUBJECTS MODEL =============================================== //
    public function addSubject($subject_code, $subject_name, $year_level, $semester, $credit_units)
    {
        $stmt = $this->db->prepare("INSERT INTO subject (subject_code, subject_name, year_level ,semester, credit_units) VALUES (:subject_code, :subject_name, :year_level, :semester, :credit_units)");
        $stmt->bindParam(':subject_code', $subject_code, PDO::PARAM_STR);
        $stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $stmt->bindParam(':year_level', $year_level, PDO::PARAM_STR);
        $stmt->bindParam(':semester', $semester, PDO::PARAM_STR);
        $stmt->bindParam(':credit_units', $credit_units, PDO::PARAM_INT);
        return $stmt->execute();
    }



    public function getAllSubject()
    {
        $stmt = $this->db->query("SELECT * FROM subject ORDER BY subject_code ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // not fixed

    public function getSubjectById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM subject WHERE subject_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSubject($id, $subject_code, $subject_name, $year_level, $semester, $credit_units)
    {
        $stmt = $this->db->prepare("UPDATE subject SET subject_code = :subject_code, subject_name = :subject_name, year_level = :year_level ,semester = :semester, credit_units = :credit_units WHERE subject_id = :id");
        $stmt->bindParam(':subject_code', $subject_code, PDO::PARAM_STR);
        $stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $stmt->bindParam(':year_level', $year_level, PDO::PARAM_STR);
        $stmt->bindParam(':semester', $semester, PDO::PARAM_STR);
        $stmt->bindParam(':credit_units', $credit_units, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // =============================================== SUBJECT VERIFICATION MODEL ========================================= //
       // Get all pending subjects
    public function getPendingSubjects()
    {
        $query = "
            SELECT 
                sa.id,
                CONCAT(f.first_name, ' ', f.last_name) AS faculty_name,
                s.subject_code,
                s.subject_name,
                s.year_level,
                s.semester
            FROM subject_allocations sa
            LEFT JOIN faculty f ON sa.faculty_id = f.faculty_id
            LEFT JOIN subject s ON sa.subject_id = s.subject_id
            WHERE sa.status = 'Pending'
        ";

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🟢 Get all verified (Approved or Rejected) subjects
    public function getVerifiedSubjects()
    {
        $query = "
            SELECT 
                sa.id,
                CONCAT(f.first_name, ' ', f.last_name) AS faculty_name,
                s.subject_code,
                s.subject_name,
                s.year_level,
                s.semester,
                sa.status
            FROM subject_allocations sa
            LEFT JOIN faculty f ON sa.faculty_id = f.faculty_id
            LEFT JOIN subject s ON sa.subject_id = s.subject_id
            WHERE sa.status IN ('Approved', 'Rejected')
        ";

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ Approve subject allocation
    public function approveSubject($id)
    {
        $stmt = $this->db->prepare("UPDATE subject_allocations SET status = 'Approved' WHERE id = ?");
        $stmt->execute([$id]);
    }

    // ❌ Reject subject allocation
    public function rejectSubject($id)
    {
        $stmt = $this->db->prepare("UPDATE subject_allocations SET status = 'Rejected' WHERE id = ?");
        $stmt->execute([$id]);
    }

    // 🧪 Temporary: Add a pending subject manually (for testing)
    public function addPendingSubject($subjectId, $facultyId = 1)
    {
        // Check if already exists to prevent duplicates
        $check = $this->db->prepare("
            SELECT * FROM subject_allocations 
            WHERE subject_id = ? AND faculty_id = ?
        ");
        $check->execute([$subjectId, $facultyId]);

        if ($check->rowCount() === 0) {
            $stmt = $this->db->prepare("
                INSERT INTO subject_allocations (faculty_id, subject_id, status)
                VALUES (?, ?, 'Pending')
            ");
            $stmt->execute([$facultyId, $subjectId]);
        }
    }

}
