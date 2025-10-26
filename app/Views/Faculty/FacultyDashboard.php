<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Add your content here to be displayed in the browser -->


<!-- Main Content -->
<main class="main-content">
    <h2>Faculty Dashboard</h2>
    <p class="text-light">Overview of your subjects, applications, and notifications.</p>

    <div class="row g-4 mb-4">
        <a href="/faculty-subjects" class="col-md-4">
            <div class="card-glass">
                <i class="bi bi-journal-text metric-icon"></i>
                <div>
                    <div class="card-title">My Subjects</div>
                    <div class="card-value"><?= $acceptedCount ?: '0' ?></div>
                </div>
            </div>
        </a>
        <a href="/faculty-subject/PendingApplication" class="col-md-4">
            <div class="card-glass">
                <i class="bi bi-clock-history metric-icon"></i>
                <div>
                    <div class="card-title">Pending Subject Applications</div>
                    <div class="card-value"><?= $pendingCount ?: '0' ?></div>
                </div>
            </div>
        </a>

        <a href="/faculty-student/studentApplication" class="col-md-4">
            <div class="card-glass">
                <i class="bi bi-file-person-fill metric-icon"></i>
                <div>
                    <div class="card-title">Pending Student Applications</div>
                    <div class="card-value"><?= $studentPending ?: '0' ?></div>
                </div>
            </div>
        </a>
    </div>

    <div class="card-glass2">
        <h5><i class="bi bi-person-lines-fill me-1"></i> MY STUDENTS</h5>
        <hr class="my-4">
        <div class="row text-center mt-4">
            <?php foreach ($subjects as $subject): ?>
                <div class="col-md-4 mb-3">
                    <div class="rounded shadow-sm border border-secondary p-4 h-100">
                        <a href="/faculty-grading/<?= $subject['subject_id'] ?>">
                            <h5 class="fw-bold"><?= $subject['subject_code'] ?></h5>
                            <h6 class="text-light"><?= $subject['subject_name'] ?></h6>
                            <hr>
                            <h5><?= $subject['student_count'] ?: '0' ?> Students</h5>
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>


<?php
$this->stop();
?>