<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>
<!-- Add your content here to be displayed in the browser -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Subject - CKC Information Technology</title>
    <link rel="icon" href="logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>



    <main class="main-content">
        <div class="container">
            <h2>Manage Subject</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active text-light">Dashboard / Manage Subject</li>
                </ol>
            </nav>

            <div class="table-container mt-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>

                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Year Level</th>
                                <th>Semester</th>
                                <th>Units</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subjects as $s): ?>
                                <tr>

                                    <td><?= htmlspecialchars($s['subject_code']); ?></td>
                                    <td><?= htmlspecialchars($s['subject_name']); ?></td>
                                    <td><?= htmlspecialchars($s['year_level']); ?></td>
                                    <td><?= htmlspecialchars($s['semester']); ?></td>
                                    <td><?= htmlspecialchars($s['credit_units']); ?></td>
                                    <td>
                                        <a href="/ViewSubjects/UpdateSubjectView/<?= htmlspecialchars($s['subject_id']) ?>" class="btn-edit">
                                            <i class="bi bi-pencil-square me-1"></i>Update
                                        </a>
                                        <!-- <form method="POST" action="/subject-verification/submit" class="mb-3">
                                            <div class="input-group w-50 mx-auto">
                                                <input type="number" name="subject_id" class="form-control" placeholder="Enter Subject ID to test" required>
                                                <input type="hidden" name="faculty_id" value="17">
                                                <button class="btn btn-primary">Add Pending Subject</button>
                                            </div>
                                        </form> -->

                                    </td>



                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="mt-4">
                <p>© 2025 <span>Christ the King College</span>. All rights reserved.</p>
            </footer>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$this->stop();
?>