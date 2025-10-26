<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Subject Verification - CKC Information Technology</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(94, 226, 255, 0.3);
            backdrop-filter: blur(15px);
            color: #ffffff;
            box-shadow: 0 0 25px rgba(94, 226, 255, 0.15);
        }

        .card-header {
            background: linear-gradient(90deg, #004d7a, #008793);
            border-bottom: none;
        }

        /* Transparent Glass Table */
        .table {
            background-color: transparent !important;
            border-collapse: separate;
            border-spacing: 0;
            color: #ffffff !important;
        }

        .table th,
        .table td {
            background-color: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: #eafaff !important;
            backdrop-filter: blur(10px);
        }

        .table thead th {
            background: rgba(94, 226, 255, 0.2) !important;
            border-bottom: 2px solid rgba(94, 226, 255, 0.4) !important;
            color: #ffffff;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .table tbody tr:hover {
            background: rgba(94, 226, 255, 0.1) !important;
            transition: 0.3s;
        }

        .badge {
            font-size: 0.85rem;
        }

        .btn-success,
        .btn-danger {
            border: none;
            transition: 0.3s;
            font-weight: 500;
        }

        .btn-success {
            background: linear-gradient(90deg, #00bf72, #00e58c);
        }

        .btn-danger {
            background: linear-gradient(90deg, #ff4b4b, #ff6b6b);
        }

        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 255, 150, 0.5);
        }

        .btn-danger:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 75, 75, 0.5);
        }
    </style>
</head>

<body>

    <main class="main-content">
        <div class="container py-5">
            <div class="card shadow-sm rounded-3">
                <div class="card-header text-white text-center">
                    <h4 class="mb-0 fw-bold">Subject Allocation Verification</h4>
                </div>
                <div class="card-body">
                    <!-- Pending Table -->
                    <h5 class="mb-3">Pending Subject Picks</h5>
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Faculty</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Year Level</th>
                                <th>Semester</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pendingSubjects)): ?>
                                <?php foreach ($pendingSubjects as $subject): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($subject['id']) ?></td>
                                        <td><?= htmlspecialchars($subject['faculty_name']) ?></td>
                                        <td><?= htmlspecialchars($subject['subject_code']) ?></td>
                                        <td><?= htmlspecialchars($subject['subject_name']) ?></td>
                                        <td><?= htmlspecialchars($subject['year_level']) ?></td>
                                        <td><?= htmlspecialchars($subject['semester']) ?></td>

                                        <td>
                                            <form method="POST" action="/subject-verification/action" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $subject['id'] ?>">
                                                <input type="hidden" name="action" value="approve">
                                                <button class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form method="POST" action="/subject-verification/action" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $subject['id'] ?>">
                                                <input type="hidden" name="action" value="reject">
                                                <button class="btn btn-sm btn-danger">Reject</button>
                                            </form>
                                        </td>


                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No pending subjects found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <h5 class="mb-3">Verified Subjects</h5>
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Faculty Name</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Year Level</th>
                                <th>Semester</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($verifiedSubjects)): ?>
                                <?php foreach ($verifiedSubjects as $subject): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($subject['id']) ?></td>
                                        <td><?= htmlspecialchars($subject['faculty_name']) ?></td>
                                        <td><?= htmlspecialchars($subject['subject_code']) ?></td>
                                        <td><?= htmlspecialchars($subject['subject_name']) ?></td>
                                        <td><?= htmlspecialchars($subject['year_level']) ?></td>
                                        <td><?= htmlspecialchars($subject['semester']) ?></td>
                                        <td><?= htmlspecialchars($subject['status']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No verified subjects found.</td>
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
<?php
$this->stop();
?>