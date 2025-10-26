<?php

namespace app\Controllers;

use config\DBConnection;
use app\Models\AdminModel;

class AdminController
{
    private $AdminModel;

    public function __construct()
    {
        $db = new DBConnection();
        $this->AdminModel = new AdminModel($db);
    }

    // Add your custom controllers below to handle business logic.
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin  = $this->AdminModel->getAdmin();

            if ($username == $admin['username'] && $password == $admin['password']) {

                $_SESSION['admin'] = $admin['username'];
                header('Location: /Admin-Dashboard');
            }else{
                echo "WRONG KA BOI";
            }
        }
    }
    public function dashboard()
    {
        $faculty = $this->AdminModel->getTotalFaculty();
        $subjects = $this->AdminModel->getTotalSubjects();
        echo $GLOBALS['templates']->render('Admin/DashboardView', [
            'facultyCount' => $faculty,
            'subjectsCount' => $subjects
        ]);
    }

    // ===================================== FACULTY CONTROLLER ====================================== //
    public function readFaculty()
    {
        $faculties = $this->AdminModel->getAllFaculty();
        echo $GLOBALS['templates']->render('Admin/ViewFaculty', ['faculties' => $faculties]);
    }
    public function addFaculty()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'] ?? '';
            $lastName  = $_POST['last_name'] ?? '';
            $password  = $_POST['password'] ?? '';
            $mobile_number  = $_POST['mobile_number'] ?? '';
            $gender    = $_POST['gender'] ?? '';
            $email     = $_POST['email'] ?? '';
            $idNumber  = $_POST['id_number'] ?? '';



            // Validate required fields
            if (empty($firstName) || empty($lastName) || empty($password) || empty($mobile_number) || empty($gender) || empty($email) || empty($idNumber)) {
                echo "All fields are required.";
                return;
            }

            // Secure password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the faculty into the database
            $result = $this->AdminModel->insertFaculty($firstName, $lastName, $hashedPassword, $mobile_number, $gender, $email, $idNumber);

            if ($result) {
                
                header("Location: /ViewFaculty");
                exit;
            }

            echo "Error adding faculty.";
        }
        
       
    }
     public function showUpdateForm($id)
    {
        $faculty = $this->AdminModel->getFacultyById($id);
        echo $GLOBALS['templates']->render('Admin/UpdateFacultyView', ['faculty' => $faculty]);
    }
    public function updateFaculty($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'] ?? '';
            $lastName  = $_POST['last_name'] ?? '';
            $password  = $_POST['password'] ?? '';
            $mobile_number  = $_POST['mobile_number'] ?? '';
            $gender    = $_POST['gender'] ?? '';
            $email     = $_POST['email'] ?? '';
            $idNumber  = $_POST['id_number'] ?? '';

            // Keep old password if blank
            $faculty = $this->AdminModel->getFacultyById($id);
            $hashedPassword = !empty($password)
                ? password_hash($password, PASSWORD_DEFAULT)
                : $faculty['password'];

            $result = $this->AdminModel->updateFaculty(
                $id,
                $firstName,
                $lastName,
                $hashedPassword,
                $mobile_number,
                $gender,
                $email,
                $idNumber
            );

            if ($result) {
                header("Location: /ViewFaculty");
                exit;
            }

            echo "Error updating faculty.";
        }
    }

    // ======================================== SUBJECTS CONTROLLER ========================================= //
    public function addsubject()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject_code = $_POST['subject_code'] ?? '';
            $subject_name = $_POST['subject_name'] ?? '';
            $year_level = $_POST['year_level'] ?? '';
            $semester = $_POST['semester'] ?? '';
            $credit_units = $_POST['credit_units'] ?? '';

            if (empty($subject_code) || empty($subject_name) || empty($year_level) || empty($semester) || empty($credit_units)) {
                return ["success" => false, "message" => "All fields are required."];
            }
        }
        $result = $this->AdminModel->addSubject($subject_code, $subject_name, $year_level, $semester, $credit_units);

        if ($result) {

            header("Location: /ViewSubjects");
            exit;
        }
        return "Error adding subject.";
    }


    // not fixed

    public function showSubjectForm($id)
    {
        $subjects = $this->AdminModel->getSubjectById($id);
        echo $GLOBALS['templates']->render('Admin/UpdateSubjectView', ['subjects' => $subjects]);
    }

    public function readSubject()
    {
        $subjects = $this->AdminModel->getAllSubject();
        echo $GLOBALS['templates']->render('Admin/ViewSubjects', ['subjects' => $subjects]);
    }




    // not

    public function updateSubject($id)
    {
        $subject_code = $_POST['subject_code'] ?? '';
        $subject_name = $_POST['subject_name'] ?? '';
        $year_level = $_POST['year_level'] ?? '';
        $semester = $_POST['semester'] ?? '';
        $credit_units = $_POST['credit_units'] ?? '';

        if (empty($subject_code) || empty($subject_name) || empty($year_level) || empty($semester) || empty($credit_units)) {
            return ["success" => false, "message" => "All fields are required."];
        }

        $result = $this->AdminModel->updateSubject($id, $subject_code, $subject_name, $year_level, $semester, $credit_units);

        if ($result) {
            header("Location: /ViewSubjects");
            exit;
        }

        return "Error updating subject.";
    }

    // =============================================== SUBJECT VERIFICATION CONTROLLER ======================================== //
    // ✅ This method fixes your Router error and shows example data
    public function showPage()
    {
        // Try to get subjects from the model if methods exist
        if (method_exists($this->AdminModel, 'getPendingSubjects') && method_exists($this->AdminModel, 'getVerifiedSubjects')) {
            $pending = $this->AdminModel->getPendingSubjects();
            $verified = $this->AdminModel->getVerifiedSubjects();
        }

        // ✅ Render the view
        echo template()->render('Admin/SubjectVerificationView', [
            'pendingSubjects' => $pending,
            'verifiedSubjects' => $verified,
        ]);
    }

    // ✅ Handles approve/reject actions
    public function handleAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $action = $_POST['action'] ?? null;

            if ($id && $action) {
                if ($action === 'approve') {
                    $this->AdminModel->approveSubject($id);
                } elseif ($action === 'reject') {
                    $this->AdminModel->rejectSubject($id);
                }
            }
        }

        // Redirect back to main verification page
        header('Location: /SubjectVerificationView');
        exit;
    }

    public function submitForVerification()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subjectId = $_POST['subject_id'] ?? null;
            $facultyId = $_POST['faculty_id'] ?? 1; // test with static faculty if needed

            if ($subjectId) {
                $this->AdminModel->addPendingSubject($subjectId, $facultyId);
            }
        }

        header('Location: /subject-verification');
        exit;
    }
}
