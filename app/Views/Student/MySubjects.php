<?php
$this->layout('Student/Layout', ['mainContent' => $this->fetch('Student/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>



<!-- Main Content -->
<main class="main-content">
    <h2 class="mb-3">My Subjects</h2>
    <p class="text-light">Below are the subjects you have joined.</p>

    <!-- Joined Subjects -->

    <?php if (empty($subjects)): ?>
        <div class="alert alert-warning mt-2">⚠️ You haven’t joined any subjects yet.</div>
    <?php else: ?>
        <h3 class="mt-4 text-success"><i class="bi bi-check-circle"></i></h3>
        <div class="row g-4 mb-5">
            <?php foreach ($subjects as $sub): ?>
                <div class="col-md-4 col-sm-6">
                    <a href="/subjectGrade/<?= $sub['subject_id']?>">
                        <div class="card-glass h-100 text-center border-success border-2">
                            <div class="card-body">
                                <h5 class=" text-success fw-bold"><?= htmlspecialchars($sub['subject_code']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($sub['subject_name']) ?></p>
                                <p class="small text-light">View Grades</p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
$this->stop();
?>