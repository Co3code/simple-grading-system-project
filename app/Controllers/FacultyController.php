<?php

namespace app\Controllers;

use config\DBConnection;
use app\Models\FacultyModel;
use app\Models\NotificationModel;

class FacultyController
{
    private $FacultyModel;
    private $NotificationModel; 

    public function __construct()
    {
        $db = new DBConnection();
        $this->FacultyModel = new FacultyModel($db);
        $this->NotificationModel = new NotificationModel($db);

        if (isset($_SESSION['student_id'])) {
            $GLOBALS['notifications'] = $this->NotificationModel->getNotification($_SESSION['student_id']);
        }
    }


    // ====================================== LOGIN ====================================== //
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $facultyId = $_POST['facultyId'] ?? '';
            $password = $_POST['password'] ?? '';

            $faculty = $this->FacultyModel->getFacultyLogin($facultyId);

            if ($faculty && password_verify($password, $faculty['password'])) {
                $_SESSION['faculty_id'] = $faculty['faculty_id'];
                $_SESSION['name'] = $faculty['first_name'] . " " . $faculty['last_name'];

                header("Location:/faculty-dashboard");
            } else {
                echo $GLOBALS['templates']->render('login', ['error' => 'Invalid username or password']);
            }
        }
    }

    //dashboard controller
    public function facultyDashboard()
    {
        $acceptedCount = $this->FacultyModel->countFacultySubjects($_SESSION['faculty_id']);
        $pendingCount = $this->FacultyModel->countFacultySubjectsPendingApplication($_SESSION['faculty_id']);
        $studentPending = $this->FacultyModel->countFacultyStudentPendingApplication($_SESSION['faculty_id']);
        $subjects = $this->FacultyModel->getFacultySubjects($_SESSION['faculty_id']);
        echo $GLOBALS['templates']->render('Faculty/FacultyDashboard', [
            'acceptedCount' => $acceptedCount,
            'pendingCount' => $pendingCount,
            'studentPending' => $studentPending,
            'subjects' => $subjects
        ]);
    }
    public function facultyProfile()
    {
        $faculty = $this->FacultyModel->getFacultyProfile($_SESSION['faculty_id']);
        $subjects = $this->FacultyModel->getFacultySubjects($_SESSION['faculty_id']);
        echo $GLOBALS['templates']->render('Faculty/facultyProfile', ['faculty' => $faculty, 'subjects' => $subjects]);
    }

    //subjects controller
    public function availableSubjects()
    {
        $subjects = $this->FacultyModel->getAvailableSubjects();
        echo $GLOBALS['templates']->render('Faculty/FacultySubjectsAvailable', [
            'subjects' => $subjects
        ]);
    }
    public function facultySubjects()
    {
        $subjects = $this->FacultyModel->getFacultySubjects($_SESSION['faculty_id']);
        echo $GLOBALS['templates']->render('Faculty/FacultySubjects', [
            'subjects' => $subjects
        ]);
    }
    public function facultySubjectApplication($code)
    {

        $this->FacultyModel->postFacultySubjectApplication($_SESSION['faculty_id'], $code);
        header("Location: /faculty-subject/PendingApplication");
    }
    public function facultySubjectsPendingApplication()
    {
        $pendingSubjects = $this->FacultyModel->getFacultySubjectsPendingApplication($_SESSION['faculty_id']);
        echo $GLOBALS['templates']->render('Faculty/FacultySubjectsPendingApplication', [
            'pendingSubjects' => $pendingSubjects
        ]);
    }



    //subject grading controller
    public function facultyGradingStudents($code)
    {
        $students = $this->FacultyModel->getFacultyGradingStudents($code, $_SESSION['faculty_id']);
        $pendingApplications = $this->FacultyModel->getFacultySubjectsPendingApplicationById($code);
        $subject = $this->FacultyModel->getSubjectInfo($code);

        echo $GLOBALS['templates']->render('Faculty/FacultyGrading', [
            'students' => $students,
            'subject' => $subject,
            'pendingStudents' => $pendingApplications
        ]);
    }
    public function recordedStudentGrade($code, $studentId)
    {
        $grade = $this->FacultyModel->getRecordedStudentGrade($studentId, $code) ?: [];
        $student = $this->FacultyModel->getFacultyStudentInformation($studentId);
        $subject = $this->FacultyModel->getSubjectInfo($code);
        echo $GLOBALS['templates']->render('Faculty/FacultyGradingGradeStudent', [
            'grade' => $grade,
            'student' => $student,
            'subject' => $subject
        ]);
    }

    public function edit($code, $studentId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $gradingTerm = $_POST['term'];
            $grade = $_POST['grade'];
            $type = $_POST['type'];

            // Security: validate input
            $validTerms = ['prelim', 'midterm', 'finals'];
            if (!in_array($gradingTerm, $validTerms, true)) {
                die("Invalid grading period");
            }

            $this->FacultyModel->edit($code, $studentId, $gradingTerm, $grade);

            $subject = $this->FacultyModel->getSubjectInfo($code);
            $this->NotificationModel->addNotification(
                $studentId,
                $_SESSION['faculty_id'],
                "New Grade Posted",
                "Your grade in {$subject['subject_name']} for {$gradingTerm} has been posted by your instructor.",
                "/subjectGrade/$code"
            );

            if ($type === 'edit') {
                $_SESSION['success'][] = "Grade Edited Successfully!";
            } else {
                $_SESSION['success'][] = "Grade Added Successfully!";
            }
            header("Location:/faculty-grading/GradeStudent/$code/$studentId");
            exit;
        }
    }
    public function publish($code, $studentId)
    {
        $this->FacultyModel->publish($code, $studentId);
        $_SESSION['success'][] = "Grades Published!";
        header("Location:/faculty-grading/GradeStudent/$code/$studentId");
    }


    // faculty Profile controller
    public function editFacultyProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phoneNumber = $_POST['phoneNumber'];
            $this->FacultyModel->editFacultyProfile($_SESSION['faculty_id'], $firstName, $lastName, $phoneNumber);

            header("Location:/faculty-profile");
        }
    }

    public function facultyProfileChangePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPasswordInput = $_POST['currentPassword'] ?? '';
            $newPassword = $_POST['newPassword'] ?? '';
            $confirmPassword = $_POST['confirmPassword'] ?? '';
            $facultyId = $_SESSION['faculty_id'];

            $faculty = $this->FacultyModel->getFacultyProfile($facultyId);

            // Verify current password first
            if (!password_verify($currentPasswordInput, $faculty['password'])) {
                $_SESSION['danger'][] = "Incorrect Password. Please try again.";
                header("Location:/faculty-profile");
                exit;
            }

            // Check if new password is provided
            if (!empty($newPassword)) {
                if ($newPassword !== $confirmPassword) {
                    $_SESSION['danger'][] = "Password Don't Match! Please try again.";
                    header("Location:/faculty-profile");
                    exit;
                }
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $this->FacultyModel->changePassword($facultyId, $hashedPassword);
                $_SESSION['success'][] = "Successfully Changed Password.";
            }

            header("Location:/faculty-profile");
            exit;
        }
    }

    // ========================= FACULTY STUDENTS CONTROLLER ========================= //
    public function facultyStudents()
    {
        $result = $this->FacultyModel->getFacultyStudents($_SESSION['faculty_id']);
        echo $GLOBALS['templates']->render('Faculty/FacultyStudent', ['result' => $result]);
    }
    public function facultyStudentInformation($studentId)
    {
        $student = $this->FacultyModel->getFacultyStudentInformation($studentId);
        $result = $this->FacultyModel->getFacultyStudentInformationSubject($studentId);
        echo $GLOBALS['templates']->render('Faculty/FacultyStudentInformation', ['student' => $student, 'result' => $result]);
    }
    public function facultyStudentAppplication()
    {
        $result = $this->FacultyModel->getFacultyStudentApplication($_SESSION['faculty_id']);
        $rejected = $this->FacultyModel->getFacultyStudentRejectedApplication($_SESSION['faculty_id']);
        echo $GLOBALS['templates']->render('Faculty/FacultyStudentApplication', ['results' => $result, 'rejected' => $rejected]);
    }
    public function facultyStudentAppplicationConfirm($code, $studentId)
    {
        $confirmStudent = $this->FacultyModel->setFacultyStudentApplicationConfirm($code, $studentId);
        if ($confirmStudent) {
            $_SESSION['success'][] = "Student Application Confirmed!";
        }
        header("Location:/faculty-grading/$code");
    }
    public function facultyStudentAppplicationReject($code, $studentId)
    {
        $rejectApplication = $this->FacultyModel->setFacultyStudentApplicationReject($code, $studentId);
        if ($rejectApplication) {
            $_SESSION['danger'][] = "Student Application Rejected!";
        }
        header("Location:/faculty-student/studentApplication");
    }

    public function logout()
    {
        session_unset();        // remove all session variables
        session_destroy();      // destroy the session itself

        // Optional: clear session cookie
        if (ini_get("session.use_cookies")) {
            setcookie(session_name(), '', time() - 42000, '/');
        }

        header("Location:/"); // redirect (optional)
        exit;
    }

    public function facultyGradeSummary()
    {
        $subjects = $this->FacultyModel->getFacultySubjects($_SESSION['faculty_id']);
        echo $GLOBALS['templates']->render('Faculty/FacultyGradeSummary', ['subject' => $subjects]);
    }

    public function facultyViewGradeSummary($code)
    {
        $grade = $this->FacultyModel->getGradeSummary($code);
        $subject = $this->FacultyModel->getSubjectInfo($code);
        echo $GLOBALS['templates']->render('Faculty/FacultyViewGradeSummary', ['subject' => $subject, 'result' => $grade]);
    }
}
