<?php
if (!isset($_SESSION['faculty_id'])) {
    header("Location: /");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($_ENV['APP_DESCRIPTION'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($_ENV['APP_KEYWORDS'] ?? '') ?>">
    <meta name="author" content="<?= htmlspecialchars($_ENV['APP_AUTHOR'] ?? '') ?>">


    <link rel="shortcut icon" href="<?= htmlspecialchars($_ENV['APP_ICON'] ?? '') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/faculty.css">

    <!-- ✅ DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <title><?= isset($title) && !empty($title) ? $this->e($title) : htmlspecialchars($_ENV['APP_NAME'] ?? '') ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-blur fixed-top">
        <div class="container-fluid">
           <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <i class="bi bi-mortarboard"></i>
                Faculty Dashboard
            </a>
            <!-- Mobile Sidebar Toggle -->
            <button class="btn btn-outline-light d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">
                <i class="bi bi-list fs-4"></i>
            </button>

            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="navbar-text d-none d-md-block"><?= $_SESSION['name'] ?></span>

                <!-- Notifications -->
                <div class="dropdown">
                    <button class="btn btn-transparent position-relative dropdown-toggle p-0" type="button" id="notifDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-5 text-light"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            id="notifBadge">1</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2 mt-2" aria-labelledby="notifDropdown"
                        style="min-width: 320px;">
                        <li class="dropdown-item d-flex justify-content-between align-items-start">
                            <div>
                                <small class="fw-bold">System</small><br>
                                <span>Your password was recently updated.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <a href="/faculty-profile">
                    <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['name'] ?>" class="profile-pic rounded-circle" alt="Prof. Atis"
                        style="width: 40px; height: 40px; object-fit: cover;" />
                </a>
            </div>
        </div>
    </nav>

    <!-- Sidebar (Desktop) -->
    <nav class="sidebar d-none d-lg-flex flex-column justify-content-between" style="min-height: 100vh;">
        <div>
            <a href="/faculty-dashboard"><i class="bi bi-house"></i> Home</a>
            <a data-bs-toggle="collapse" href="#subjectsCollapse" role="button" aria-expanded="false" aria-controls="subjectsCollapse" class="d-flex justify-content-between align-items-center"><span><i class="bi bi-journals me-1"></i> Subjects </span> <i class="bi bi-chevron-down"></i></a>
            <div class="collapse ms-3" id="subjectsCollapse">
                <a href="/faculty-subjects"><i class="bi bi-person-lines-fill"></i> My Subjects</a>
                <a href="/faculty-subjectsAvailable"><i class="bi bi-book"></i> Available Subjects</a>
                <a href="/faculty-subject/PendingApplication"><i class="bi bi-clock-history"></i>Pending Applications</a>
            </div>
            <a data-bs-toggle="collapse" href="#studentsCollapse" role="button" aria-expanded="false" aria-controls="studentsCollapse" class="d-flex justify-content-between align-items-center"><span><i class="bi bi-people-fill me-1"></i> Students </span> <i class="bi bi-chevron-down"></i></a>
            <div class="collapse ms-3" id="studentsCollapse">
                <a href="/faculty-students"><i class="bi bi-person-lines-fill"></i> My Students</a>
                <a href="/faculty-student/studentApplication"><i class="bi bi-file-person-fill"></i> Student Applications</a>
            </div>
            <a href="/faculty-gradeSummary"><i class="bi bi-journal-check"></i> Grade Summary</a>
            <a href="/faculty-profile"><i class="bi bi-person-circle"></i> Profile</a>
            <a href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>

        <div class=" pb-2 mb-5">
            <a href="<?= htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'dashboard.php') ?>" class="btn rounded-0 w-100">
                ← Back
            </a>
        </div>
    </nav>


    <!-- Offcanvas Sidebar (Mobile) -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-0">
            <a href="/faculty-dashboard" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-house"></i> Home</a>
            <a href="/faculty-subjects" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-book"></i> My Subject</a>
            <a href="/faculty-subjectsAvailable" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-person-lines-fill"></i>Available Subjects</a>
            <a href="/faculty-subject/PendingApplication" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-clock-history"></i>Pending Subjects</a>
            <a href="/faculty-students" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-person-lines-fill"></i> My Students</a>
            <a href="/faculty-student/studentApplication" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-file-person-fill"></i> Student Applications</a>
            <a href="/faculty-gradeSummary" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-journal"></i>  Grade Summary</a>
            <a href="/faculty-profile" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-person-circle"></i>
                Profile</a>
            <a href="/" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>


    <main>
        <?= $this->section('mainContent') ?>

    </main>

    <!-- ✅ Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- ✅ Your custom DataTables config -->
    <script src="<?= assets("js/tables.js") ?>"></script>

    <script src="<?= assets("js/Toasts.js") ?>"></script>

    <script src="<?= assets("js/functions.js") ?>"></script>






</body>

</html>