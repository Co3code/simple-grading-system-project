<?php
$this->layout('Student/Layout', ['mainContent' => $this->fetch('Student/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Main Content -->
<main class="main-content">
    <h2 class="mb-3">Join Class</h2>
    <p class="text-light">Select a subject below to join.</p>

    <div class="row g-4 mb-5">
        <h5>Available Subjects</h5>
        <?php foreach ($subject as $s): ?>
            <div class="col-md-4 col-sm-6">
                <div class="card-glass2 h-100 text-center border-2">
                    <div class=" card-body">
                        <h3 class="fw-bold text-info">
                            <?= htmlspecialchars($s['subject_code']) ?>
                        </h3>
                        <h6><?= htmlspecialchars($s['subject_name']) ?></h6>
                        <p><?= ($s['gender'] == 'Male') ? 'Mr.' : 'Ms.' ?> <?= $s['faculty_name']?></p>
                        <a href="/joinClass/<?= $s['subject_id'] ?>" class="btn btn-outline-info btn-sm w-100">
                            <i class="bi bi-plus-circle"></i> Join Class
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row g-4 mb-5">
        <!-- ✅ Added dynamic count display -->
        <h5>Pending Application (<?= isset($pending) ? count($pending) : 0 ?>)</h5>

        <?php if (!empty($pending)): ?>
            <?php foreach ($pending as $p): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card-glass2 h-100 text-center border-2">
                        <div class=" card-body">
                            <h4 class="card-title fw-bold">
                                <?= htmlspecialchars($p['subject_code']) ?>
                            </h4>
                            <p class="card-text"><?= htmlspecialchars($p['subject_name']) ?></p>
                            <button class="btn btn-success btn-sm w-100" disabled>
                                <i class="bi bi-plus-circle"></i> Waiting for Faculty Confirmation..
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info mt-2">You don't have any pending applications...</div>
        <?php endif; ?>
    </div>
</main>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
$this->stop();
?>
