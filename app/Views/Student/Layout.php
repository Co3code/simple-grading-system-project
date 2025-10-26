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
    <link rel="stylesheet" href="/css/student.css">

    <title><?= isset($title) && !empty($title) ? $this->e($title) : htmlspecialchars($_ENV['APP_NAME'] ?? '') ?></title>
</head>

<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-blur fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <i class="bi bi-mortarboard"></i>
                Student Dashboard
            </a>

            <!-- Toggle Button for Offcanvas -->
            <button class="btn btn-outline-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                <i class="bi bi-list fs-4"></i>
            </button>

            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="navbar-text d-none d-md-block">
                    <?= htmlspecialchars($_SESSION['student_name'] ?? 'Not logged in') ?>
                </span>


                <!-- Notifications Dropdown -->
                <?php if (!empty($GLOBALS['notifications'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-light position-relative" data-bs-toggle="dropdown">
                            🔔
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= count(array_filter($GLOBALS['notifications'], fn($n) => !$n['is_read'])) ?>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php foreach ($GLOBALS['notifications'] as $notif): ?>
                                <li>
                                    <a href="/notifications/open/<?= $notif['id'] ?>" class="dropdown-item <?= $notif['is_read'] ? 'text-muted' : 'fw-bold' ?>">
                                        <h5><?= htmlspecialchars($notif['title']) ?></h5>
                                        <p ><?= htmlspecialchars($notif['message']) ?></p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['student_name'] ?>" class="profile-pic" alt="Student Profile" />
            </div>
        </div>
    </nav>

    <!-- Sidebar (Desktop) -->
    <nav class="sidebar d-none d-lg-flex flex-column">
        <a href="/student-dashboard"><i class="bi bi-house"></i> Home</a>
        <a href="/profile"><i class="bi bi-person"></i> Profile</a>
        <a href="/joinClassView"><i class="bi bi-plus-circle"></i> Join Class</a>
        <a href="/mysubjects"><i class="bi bi-book"></i> My Subjects</a>
        <a href="/viewgrade"><i class="bi bi-journal-check"></i> Grade Summary</a>
        <a href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </nav>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-0">
            <a href="/student-dashboard" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-house"></i> Dashboard</a>
            <a href="/profile" class="px-3 py-2 d-flex align-items-center gap-2 active"><i class="bi bi-person"></i> Profile</a>
            <a href="/joinClassView" class="active px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-plus-circle"></i> Join Class</a>
            <a href="/mysubjects" class="active px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-journal-bookmark"></i> My Subjects
                <a href="/viewgrade" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-journal-check"></i> View Grades</a>
                <a href="/logout" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <main>
        <?= $this->section("mainContent") ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= assets("js/Toasts.js") ?>"></script>

</body>

</html>