<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Faculty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>


    <!-- Main -->
    <main class="main-content">
        <div class="container">
            <h2>Manage Faculty</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active text-light">Dashboard / Manage Faculty</li>
                </ol>
            </nav>

            <div class="table-container mt-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>

                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Faculty ID</th>
                                <th>Mobile Number</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($faculties as $faculty): ?>
                                <tr>
                                    <td><?= htmlspecialchars($faculty['first_name']) ?></td>
                                    <td><?= htmlspecialchars($faculty['last_name']) ?></td>
                                    <td><?= htmlspecialchars($faculty['id_number']) ?></td>
                                    <td><?= htmlspecialchars($faculty['phone_number']) ?></td>
                                    <td><?= htmlspecialchars($faculty['gender']) ?></td>
                                    <td><?= htmlspecialchars($faculty['email']) ?></td>
                                    <td>
                                        <a href="/ViewFaculty/UpdateFaculty/<?= htmlspecialchars($faculty['faculty_id']) ?>"
                                            class="btn-update text-decoration-none">
                                            <i class="bi bi-pencil-square me-1"></i> Update
                                        </a>
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