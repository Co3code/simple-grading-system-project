<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($_ENV['APP_DESCRIPTION'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($_ENV['APP_KEYWORDS'] ?? '') ?>">
    <meta name="author" content="<?= htmlspecialchars($_ENV['APP_AUTHOR'] ?? '') ?>">

    <link rel="shortcut icon" href="<?= htmlspecialchars($_ENV['APP_ICON'] ?? '') ?>">
    
    <link rel="stylesheet" href="/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <title><?= isset($title) && !empty($title) ? $this->e($title) : htmlspecialchars($_ENV['APP_NAME'] ?? '') ?></title>
</head>

<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-blur fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/DashboardView">
                <i class="bi bi-building"></i>
                Christ the King College
            </a>

            <!-- Toggle Button for Offcanvas -->
            <button class="btn btn-outline-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                <i class="bi bi-list fs-4"></i>
            </button>

            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="navbar-text d-none d-md-block">jatis@ckcgingoog.edu.ph</span>

                <!-- Notifications Dropdown -->
                <div class="dropdown">
                    <a href="#" class="text-light position-relative" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notifBadge">2</span>
                    </a>
                    <!-- <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" aria-labelledby="notifDropdown" style="min-width: 320px;">
            <li class="dropdown-item d-flex justify-content-between align-items-start">
              <div>
                <small class="fw-bold">Student Application</small><br>
                <span>A student wants to join your subject.</span>
              </div>
              <div class="ms-2 d-flex gap-1">
                <button class="btn btn-sm btn-success btn-confirm">Confirm</button>
                <button class="btn btn-sm btn-danger btn-delete">Delete</button>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-item d-flex justify-content-between align-items-start">
              <div>
                <small class="fw-bold">Admin Update</small><br>
                <span>Admin confirmed you in the subject.</span>
              </div>
            </li>
          </ul> -->
                </div>

                <img src="/img/juswa.jpg" class="profile-pic" alt="Prof. Atis" />
            </div>
        </div>
    </nav>

   
    <!-- Sidebar (Desktop) -->
    <nav class="sidebar d-none d-lg-flex flex-column" id="sidebarAccordion">
        <li class="nav-item mb-2">
            <a href="/DashboardView" class="nav-link text-white">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <!-- Faculty Dropdown -->
        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse"
                href="#teacherMenu"
                role="button"
                aria-expanded="false"
                aria-controls="teacherMenu">
                <span><i class="bi bi-person-badge me-2"></i>Faculty</span>
                <i class="bi bi-caret-down-fill small"></i>
            </a>

            <div class="collapse ps-3" id="teacherMenu" data-bs-parent="#sidebarAccordion">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/AddFacultyView" class="nav-link text-white-50">
                            <i class="bi bi-person-plus me-2"></i> Add Faculty
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ViewFaculty" class="nav-link text-white-50">
                            <i class="bi bi-people me-2"></i> Manage Faculty
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Subject Dropdown -->
        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse"
                href="#subjectMenu"
                role="button"
                aria-expanded="false"
                aria-controls="subjectMenu">
                <span><i class="bi bi-journal-text me-2"></i> Subject</span>
                <i class="bi bi-caret-down-fill small"></i>
            </a>
           

            <div class="collapse ps-3" id="subjectMenu" data-bs-parent="#sidebarAccordion">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/AddSubjectView" class="nav-link text-white-50">
                            <i class="bi bi-plus-circle me-2"></i> Add Subject
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ViewSubjects" class="nav-link text-white-50">
                            <i class="bi bi-list-check me-2"></i> Manage Subject
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Subject Allocation -->
        <li class="nav-item mb-2">
            <a href="/SubjectVerificationView" class="nav-link text-white">
                <i class="bi bi-check2-square me-2"></i> Subject Allocation
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item mt-3">
            <a href="logout.php" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </nav>













    <main>
        <?= $this->section('mainContent') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= assets("js/Toasts.js") ?>"></script>

</body>

</html>