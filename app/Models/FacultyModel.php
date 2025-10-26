<?php

namespace app\Models;

use config\DBConnection;
use PDO;

class FacultyModel
{
    private $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db->getConnection();
    }

    // for pilot login
    public function getFacultyLogin($facultyId)
    {
        $stmt = $this->db->prepare("SELECT * FROM faculty WHERE id_number = :id_number");
        $stmt->bindParam(':id_number', $facultyId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ======================================================== DASHBOARD MODEL ================================================== //

    // get total number of faculty subjects
    public function countFacultySubjects($faculty_id)
    {
        $stmt = $this->db->prepare("
        SELECT COUNT(*) AS subject_count
        FROM subject_allocations
        WHERE faculty_id = :faculty_id AND status = 'approved'
    ");
        $stmt->bindParam(':faculty_id', $faculty_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['subject_count'];
    }

    // get total number of faculty pending subject application 
    public function countFacultySubjectsPendingApplication($faculty_id)
    {
        $stmt = $this->db->prepare("
        SELECT COUNT(*) AS subject_count
        FROM subject_allocations
        WHERE faculty_id = :faculty_id AND status = 'pending'
    ");
        $stmt->bindParam(':faculty_id', $faculty_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['subject_count'];
    }

    // get total number of pending student application
    public function countFacultyStudentPendingApplication($faculty_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS subject_count
        FROM student_subject ss
        JOIN subject_allocations sa ON ss.subject_id = sa.subject_id
        WHERE sa.faculty_id = :faculty_id AND ss.status = 'pending'
    ");
        $stmt->bindParam(':faculty_id', $faculty_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['subject_count'];
    }

    // ======================================================== FACULTY MODEL ================================================== //
    public function getFacultyProfile($facultyId)
    {
        $stmt = $this->db->prepare("SELECT * FROM faculty WHERE faculty_id = :id_number");
        $stmt->bindParam(':id_number', $facultyId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function editFacultyProfile($facultyId, $firstName, $lastName, $phoneNumber)
    {
        $stmt = $this->db->prepare("UPDATE faculty SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number WHERE faculty_id = :faculty_id");
        $stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phoneNumber, PDO::PARAM_STR);
        $stmt->bindParam(':faculty_id', $facultyId, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function changePassword($facultyId, $password)
    {
        $stmt = $this->db->prepare("UPDATE faculty SET password = :password WHERE faculty_id =:faculty_id");
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':faculty_id', $facultyId, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // ======================================================== STUDENT MODEL ================================================== //

    // get students by faculty id
    public function getFacultyStudents($facultyId)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT
                st.student_id,
                st.id_number,
                st.first_name AS student_firstname,
                st.last_name AS student_lastname,
                st.year_level
            FROM subject_allocations sa
            JOIN subject s ON sa.subject_id = s.subject_id
            JOIN student_subject ss ON s.subject_id = ss.subject_id
            JOIN student st ON ss.student_id = st.student_id
            WHERE sa.faculty_id = :faculty_id;
        ");
        $stmt->bindParam(':faculty_id', $facultyId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get student information
    public function getFacultyStudentInformation($studentId)
    {
        $stmt = $this->db->prepare("SELECT * FROM student WHERE student_id = :student_id");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // get student information - subjects with grades
    public function getFacultyStudentInformationSubject($studentId)
    {
        $stmt = $this->db->prepare("SELECT s.*, g.*
            FROM student_subject ss
            JOIN subject s ON ss.subject_id = s.subject_id
            JOIN grading g ON ss.subject_id = g.subject_id AND ss.student_id = g.student_id
            WHERE ss.student_id = :student_id
        ");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get students subject application
    public function getFacultyStudentApplication($facultyId)
    {
        $stmt = $this->db->prepare("SELECT st.*, s.* 
        FROM subject_allocations sa 
        JOIN subject s ON sa.subject_id = s.subject_id
        JOIN student_subject ss ON s.subject_id = ss.subject_id AND ss.status = 'pending'
        JOIN student st ON ss.student_id = st.student_id
        WHERE sa.faculty_id = :faculty_id");
        $stmt->bindParam('faculty_id', $facultyId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFacultyStudentRejectedApplication($facultyId)
    {
        $stmt = $this->db->prepare("SELECT st.*, s.* 
        FROM subject_allocations sa 
        JOIN subject s ON sa.subject_id = s.subject_id
        JOIN reject_archive ra ON s.subject_id = ra.subject_id AND ra.origin = 'student'
        JOIN student st ON ra.id_number = st.student_id
        WHERE sa.faculty_id = :faculty_id");
        $stmt->bindParam('faculty_id', $facultyId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // set student subject application to 1
    public function setFacultyStudentApplicationConfirm($code, $studentId)
    {
        $stmt = $this->db->prepare("UPDATE student_subject SET status = 'approved' WHERE student_id = :student_id AND subject_id = :subject_id");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        $confirmStudent = $stmt->execute();

        $stmt = $this->db->prepare("INSERT INTO grading (subject_id, student_id) VALUES (:subject_id, :student_id)");
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $addToGradingTable = $stmt->execute();

        return $confirmStudent && $addToGradingTable;
    }

    // remove student application from table
    public function setFacultyStudentApplicationReject($code, $studentId)
    {
        $stmt = $this->db->prepare("DELETE FROM student_subject WHERE subject_id = :subject_id AND student_id = :student_id");
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $remove = $stmt->execute();

        $stmt = $this->db->prepare("INSERT INTO reject_archive(id_number, subject_id, origin, created_at) VALUES (:id_number, :subject_id, 'student', NOW())");
        $stmt->bindParam(':id_number', $studentId, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // ======================================================== SUBJECT MODEL ================================================== //

    //get subject information by faculty ID
    public function getSubjectInfo($code)
    {
        $stmt = $this->db->prepare("SELECT * FROM subject WHERE subject_id = :code");
        $stmt->bindValue(':code', $code, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // single row
    }

    //get available subjects
    public function getAvailableSubjects()
    {
        $stmt = $this->db->prepare("
        SELECT *
        FROM subject s
        WHERE s.subject_id NOT IN (
            SELECT sa.subject_id
            FROM subject_allocations sa 
        )
    ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get faculty subjects
    public function getFacultySubjects($faculty_id)
    {
        $stmt = $this->db->prepare("SELECT s.*, COUNT(CASE WHEN ss.status = 'approved' THEN ss.student_id END) AS student_count
        FROM subject s
        JOIN subject_allocations sa ON s.subject_id = sa.subject_id
        LEFT JOIN student_subject ss ON sa.subject_id = ss.subject_id
        WHERE sa.faculty_id = :faculty_id
        GROUP BY s.subject_id;


        ");
        $stmt->bindParam(':faculty_id', $faculty_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ======================================================== FACULTY SUBJECT APPLICATION MODEL ================================================== //

    // faculty subject application
    public function postFacultySubjectApplication($facultyId, $code)
    {
        $stmt = $this->db->prepare("INSERT INTO subject_allocations(faculty_id, subject_id, status) VALUES(:faculty_id, :subject_id, 'Pending')");
        $stmt->bindParam(':faculty_id', $facultyId, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // get pending (not approved) faculty subject application
    public function getFacultySubjectsPendingApplication($faculty_id)
    {
        $stmt = $this->db->prepare("SELECT s.*, sa.faculty_id
        FROM subject s
        JOIN subject_allocations sa ON s.subject_id = sa.subject_id
        WHERE sa.faculty_id = :faculty_id AND sa.status = 'Pending';
        ");
        $stmt->bindParam(':faculty_id', $faculty_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get pending faculty subject application by subject code
    public function getFacultySubjectsPendingApplicationById($code)
    {
        $stmt = $this->db->prepare("SELECT st.*
        FROM student_subject ss 
        JOIN student st ON ss.student_id = st.student_id
        WHERE ss.subject_id = :subject_id AND status = 0
        ");
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ======================================================== STUDENT GRADING MODEL ================================================== //

    //get to grade students by subject code 
    public function getFacultyGradingStudents($code)
    {
        $stmt = $this->db->prepare("SELECT st.*, g.status
        FROM student st
        JOIN student_subject ss ON st.student_id = ss.student_id
        JOIN grading g ON ss.student_id = g.student_id AND ss.subject_id = g.subject_id
        WHERE ss.subject_id = :subject_code AND ss.status = 'approved'
        ");
        $stmt->bindParam(':subject_code', $code, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get recorded student grade 
    public function getRecordedStudentGrade($student_id, $subject_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM Grading WHERE student_id = :student_id AND subject_id = :subject_id");
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // subject grading model - EDIT/ADD GRADE
    public function edit($code, $studentId, $gradingTerm, $grade)
    {
        $stmt = $this->db->prepare("UPDATE grading SET $gradingTerm = :grade WHERE student_id = :student_id AND subject_id = :subject_id");
        $stmt->bindParam(':grade', $grade, PDO::PARAM_STR);
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // publish student grade - set status to 1
    public function publish($code, $studentId)
    {
        $stmt = $this->db->prepare("UPDATE grading SET status = 1 WHERE student_id = :student_id AND subject_id = :subject_id");
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getGradeSummary($code)
    {
        $stmt = $this->db->prepare("SELECT g.*, st.id_number, CONCAT(st.first_name,' ',st.last_name) as student_name, st.year_level
        FROM grading g
        JOIN student st ON g.student_id = st.student_id
        WHERE g.subject_id = :subject_id
        ");
        $stmt->bindParam(':subject_id', $code, PDO::PARAM_STR);
        $stmt->execute();   
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ========================================================== NOTIFICATIONS ================================================//
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
    public function getNotification($facultyId)
    {
        $stmt = $this->db->prepare("SELECT * FROM notifications WHERE receiver_id = :user_id ORDER BY created_at DESC");
        $stmt->bindParam(':user_id', $facultyId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readNotification(){
        $stmt = $this->db->prepare("UPDATE notifications SET is_read = 1 WHERE id = :id");
        return $stmt->execute();
    }

}   
