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
        Parent Dashboard
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

        <a href="/logout"><img src="img/ckc_bg.jpg" class="profile-pic" alt="Student Profile" /></a>
      </div>
    </div>
  </nav>

  <!-- Offcanvas Sidebar -->
  <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column p-0">
      <a href="/studentdashboard" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-house"></i> Dashboard</a>
      <a href="/profile" class="px-3 py-2 d-flex align-items-center gap-2 active"><i class="bi bi-person"></i> Profile</a>
      <a href="/joinclass" class="active px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-plus-circle"></i> Join Class</a>
      <a href="/mysubjects" class="active px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-journal-bookmark"></i> My Subjects
        <a href="/viewgrade" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-journal-check"></i> View Grades</a>
        <a href="/logout" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
  </div>

  <main>
    <div class="container d-flex justify-content-center align-items-center vh-100 flex-column">
      <h2 class="mb-3">Your Child’s Grades</h2>
      <p class="text-light">Below is your child's academic performance for this semester.</p>

      <div class="card-glass2 w-100">
        <h3><?= htmlspecialchars($_SESSION['student_name']) ?></h3>
        <h6><?= htmlspecialchars($student['id_number']) ?></h6>
        <h6> <?= htmlspecialchars($student['year_level']) ?></h6>
        <hr>
        <h4 class=" mb-4 text-info"><i class="bi bi-journal-check"></i> Grade Summary</h4>
        <div class="table-responsive">
          <table class="table table-glass-available text-center align-middle">
            <thead>
              <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Semester</th>
                <th>Prelim</th>
                <th>Midterm</th>
                <th>Finals</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($grades)): ?>
                <?php foreach ($grades as $grade): ?>
                  <tr>
                    <td><?= htmlspecialchars($grade['subject_code']) ?></td>
                    <td><?= htmlspecialchars($grade['subject_name']) ?></td>
                    <td><?= htmlspecialchars($grade['semester']) ?></td>
                    <td class="text-warning fw-bold"><?= htmlspecialchars($grade['prelim']) ?></td>
                    <td class="text-warning fw-bold"><?= htmlspecialchars($grade['midterm']) ?></td>
                    <td class="text-warning fw-bold"><?= htmlspecialchars($grade['finals']) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6">No grades available.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</body>

</html>