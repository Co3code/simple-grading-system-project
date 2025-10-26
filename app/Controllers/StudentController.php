<?php

namespace app\Controllers;

use config\DBConnection;
use app\Models\StudentModel;
use app\Models\NotificationModel;

class StudentController
{
    private $StudentModel;
    private $NotificationModel;

    public function __construct()
    {
        $db = new DBConnection();
        $this->StudentModel = new StudentModel($db);
        $this->NotificationModel = new NotificationModel($db);

        if (isset($_SESSION['student_id'])) {
            $GLOBALS['notifications'] = $this->NotificationModel->getNotification($_SESSION['student_id']);
        }
    }

    // Add your custom controllers below to handle business logic.
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login_type = $_POST['login_type']; // new login type selector
            $studentId = trim($_POST['studentId']);

            $student = $this->StudentModel->login($studentId);

            if ($student) {
                $_SESSION['student_id'] = $student['student_id'];
                $_SESSION['student_name'] = $student['first_name'] . ' ' . $student['last_name'];
                $_SESSION['type'] = $login_type;
                // $_SESSION['student_email'] = $student['email'];

                if ($login_type === 'student') {
                    header("Location: /student-dashboard");
                    exit;
                } elseif ($login_type === 'parent') {
                    header("Location: /parent-dashboard");
                    exit;
                }
            }
        }
    }

    // ================================================ JOIN CLASS CONTROLLER ================================================ //
    public function availableClass()
    {
        $subjects = $this->StudentModel->getAvailableClass($_SESSION['student_id']);
        $pendingClass = $this->StudentModel->getPendingClass($_SESSION['student_id']);
        echo $GLOBALS['templates']->render('Student/JoinClass', ['subject' => $subjects, 'pending' => $pendingClass]);
    }

    public function joinClass($subjectCode)
    {
        $joinClass = $this->StudentModel->submitJoinClass($subjectCode, $_SESSION['student_id']);
        if ($joinClass) {
            $_SESSION['success'][] = "Successfully Applied for Class!";
            header("Location:/joinClassView");
            exit;
        } else {
            $_SESSION['danger'][] = "Application Unsuccessfull!";
        }
    }

    // ================================================ STUDENT SUBJECT CONTROLLER ================================================ //
    public function getStudentSubjects()
    {
        $mySubjects = $this->StudentModel->getStudentSubjectsById($_SESSION['student_id']);
        echo $GLOBALS['templates']->render('Student/MySubjects', ['subjects' => $mySubjects]);
    }

    // ================================================ STUDENT SUBJECT CONTROLLER ================================================ //
    public function getStudentGrades()
    {
        $grades = $this->StudentModel->getAllGrades($_SESSION['student_id']);
        echo $GLOBALS['templates']->render('Student/ViewGrade', ['grades' => $grades]);
    }

    public function getSubjectGrades($subjectCode)
    {
        $grades = $this->StudentModel->getGradeById($_SESSION['student_id'], $subjectCode);
        echo $GLOBALS['templates']->render('Student/ViewSubjectGrade', ['grade' => $grades]);
    }

    public function getGradeSummary()
    {
        $grades = $this->StudentModel->getAllGrades($_SESSION['student_id']);
        $student = $this->StudentModel->studentInfo($_SESSION['student_id']);
        echo $GLOBALS['templates']->render('ParentDashboard', ['grades' => $grades, 'student' => $student]);
    }

    // ================================================ STUDENT SUBJECT CONTROLLER ================================================ //
    public function getStudentInfo()
    {
        $student = $this->StudentModel->studentInfo($_SESSION['student_id']);
        echo $GLOBALS['templates']->render('Student/ManageAccount', ['student' => $student]);
    }

    // ================================================ STUDENT PENDING APPLICATIONS CONTROLLER ================================================ //
    public function getPendingApplicationCount()
    {
        $studentId = $_SESSION['student_id'];
        $db = new DBConnection();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("
            SELECT COUNT(*) AS total 
            FROM student_subject 
            WHERE student_id = :student_id AND status = 'pending'
        ");
        $stmt->bindParam(':student_id', $studentId, \PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $count = $row ? $row['total'] : 0;

        return $count;
    }

    
   
    // ================================================ STUDENT DASHBOARD CONTROLLER ================================================ //
    public function studentDashboard()
    {
        $pendingCount = $this->getPendingApplicationCount();
        $subjectCount = $this->getSubjectCount();

        echo $GLOBALS['templates']->render('Student/StudentDashboard', [
        'pendingCount' => $pendingCount,
        'subjectCount' => $subjectCount
        ]);
    }



    // ================================================ STUDENT SUBJECT COUNT CONTROLLER ================================================ //
    public function getSubjectCount()
    {
        $studentId = $_SESSION['student_id'];
        $db = new DBConnection();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("
        SELECT COUNT(*) AS total 
        FROM student_subject 
        WHERE student_id = :student_id AND status = 'approved'
        ");
        $stmt->bindParam(':student_id', $studentId, \PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $count = $row ? $row['total'] : 0;

        return $count;
    }

    // ================================================= NOTIFICATION CONTROLLER ================================================ //
    public function openNotification($id)
    {
        $notification = $this->NotificationModel->getById($id);

        if ($notification) {
            $this->NotificationModel->markAsRead($id);
            header("Location: " . $notification['link']);
            exit();
        } else {
            header("Location: /student-dashboard"); // fallback if missing
            exit();
        }
    }

}

