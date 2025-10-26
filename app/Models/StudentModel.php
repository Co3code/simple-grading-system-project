<?php

namespace app\Models;

use config\DBConnection;
use PDO;

class StudentModel
{
    private $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db->getConnection();
    }

    // ================================================ LOGIN ================================================ //
    public function login($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM student WHERE id_number = :id_number");
        $stmt->bindParam(':id_number', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ================================================ JOIN CLASS MODEL ================================================ //
    public function getAvailableClass($studentId)
    {
        $stmt = $this->db->prepare("
            SELECT s.*, CONCAT(f.first_name, ' ', f.last_name) AS faculty_name, f.gender
            FROM subject s
            JOIN subject_allocations fs ON s.subject_id = fs.subject_id
            JOIN faculty f ON fs.faculty_id = f.faculty_id
            WHERE s.subject_id NOT IN (
                SELECT ss.subject_id FROM student_subject ss WHERE ss.student_id = :student_id
            )
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPendingClass($studentId)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM subject s
            JOIN student_subject ss ON s.subject_id = ss.subject_id
            WHERE ss.student_id = :student_id AND ss.status = 'pending'
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function submitJoinClass($subjectCode, $studentId)
    {
        $stmt = $this->db->prepare("
            INSERT INTO student_subject (student_id, subject_id, status, created_at)
            VALUES (:student_id, :subject_id, 'pending', NOW())
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $subjectCode, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // ================================================ STUDENT SUBJECT MODEL ================================================ //
    public function getStudentSubjectsById($studentId)
    {
        $stmt = $this->db->prepare("
            SELECT s.* 
            FROM subject s
            JOIN student_subject ss ON s.subject_id = ss.subject_id
            JOIN student st ON ss.student_id = st.student_id
            WHERE st.student_id = :student_id AND ss.status = 'approved'
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ================================================ GRADING MODEL ================================================ //
    public function getAllGrades($studentId)
    {
        $stmt = $this->db->prepare("
            SELECT g.*, s.*
            FROM grading g
            JOIN subject s ON g.subject_id = s.subject_id
            WHERE g.student_id = :student_id 
            ORDER BY s.subject_code ASC
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGradeById($studentId, $subjectCode)
    {
        $stmt = $this->db->prepare("
            SELECT g.*, s.* 
            FROM grading g
            JOIN subject s ON g.subject_id = s.subject_id
            WHERE g.student_id = :student_id AND g.subject_id = :subject_id
            ORDER BY s.subject_code ASC
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $subjectCode, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ================================================ STUDENT INFO MODEL ================================================ //
    public function studentInfo($studentId)
    {
        $stmt = $this->db->prepare("SELECT * FROM student WHERE student_id = :student_id");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ================================================ DASHBOARD COUNTS ================================================ //
    public function getPendingApplicationCount($studentId)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) AS total
            FROM student_subject
            WHERE student_id = :student_id AND status = 'pending'
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['total'] : 0;
    }

    public function getApprovedSubjectCount($studentId)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) AS total
            FROM student_subject
            WHERE student_id = :student_id AND status = 'approved'
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['total'] : 0;
    }

    // ========================================== NOTIFICATION ========================================== //
    
}
