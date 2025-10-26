<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Add your content here to be displayed in the browser -->

<!-- Main Content -->
<main class="main-content">
    <div class=" mb-4">
        <h1 class="h2"><?= htmlspecialchars($subject['subject_code']) ?></h1>
        <p class="text-light"><?= htmlspecialchars($subject['subject_name']) ?></p>
    </div>
    <!-- My Subjects (List Style) -->
    <div class="card-glass2 mb-4">
        <h5><i class="bi bi-journal-text"></i> STUDENTS</h5>
        <hr>
        <table class="table table-glass2 text-center" id="table">
            <thead>
                <tr>
                    <th class="text-white">Student ID</th>
                    <th class="text-white">Name</th>
                    <th class="text-white">Year Level</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td class="text-white"><?= htmlspecialchars($student['id_number']) ?></td>
                        <td class="text-white"><?= htmlspecialchars($student['first_name']) ?> <?= htmlspecialchars($student['last_name']) ?></td>
                        <td class="text-white"><?= htmlspecialchars($student['year_level']) ?></td>

                        <td class="text-center">
                            <?php if (empty($student['status'])): ?>
                                <a href="/faculty-grading/GradeStudent/<?= $subject['subject_id'] ?>/<?= $student['student_id'] ?>" class=" btn btn-warning btn-sm">
                                    Input Student Grade
                                </a>
                            <?php else: ?>
                                <button class=" btn btn-secondary btn-sm" disabled>
                                    Grades Published
                                </button>
                            <?php endif; ?>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Student Applications -->
    <div class="card-glass2">
        <h5 data-bs-toggle="collapse" href="#pending" role="button" aria-expanded="false" aria-controls="pending" class="d-flex justify-content-between align-items-center"><span><i class="bi bi-person-check"></i> Pending
                Student Applications</span> <i class="bi bi-chevron-down text-end"></i></h5>
        <div class="collapse" id="pending">
            <hr>
            <table class="table table-glass2 table-hover text-center" id="pendingTable">
                <thead>
                    <tr>
                        <th class="text-white">Student ID</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Year Level</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <?php foreach ($pendingStudents as $student): ?>
                    <tbody>
                        <td class="text-white"><?= htmlspecialchars($student['id_number ']) ?></td>
                        <td class="text-white"><?= htmlspecialchars($student['first_name']) ?> <?= htmlspecialchars($student['last_name']) ?></td>
                        <td class="text-white"><?= htmlspecialchars($student['year_level']) ?></td>
                        <td class="text-center"><a href="/faculty-student/studentApplication/<?= $result['code'] ?>/<?= $result['student_id'] ?>" class=" btn btn-warning btn-sm">
                                Confirm
                            </a>
                        </td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>

<?php
$this->stop();
?>