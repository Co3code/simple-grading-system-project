<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<main class="main-content">

    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class="h2">Grade Summary</h1>
            <p class="text-light ">Subjects created by admin that you can apply to teach.</p>
        </div>
    </div>

    <div class="card-glass2">
        <h5><i class="bi bi-journals me-1"></i> Grade Summary</h5>
        <hr class="my-4">
        <div class="row text-center mt-4">
            <?php foreach ($subject as $subject): ?>
                <div class="col-md-4 mb-3">
                    <div class="rounded shadow-sm border border-secondary p-4 h-100">

                        <h5 class="fw-bold"><?= $subject['subject_code'] ?></h5>
                        <h6 class="text-light"><?= $subject['subject_name'] ?></h6>
                        <hr>
                        <a href="/faculty-gradeSummary/<?= $subject['subject_id'] ?>" class="btn btn-warning ">
                            <h6>View Grade Summary</h6>
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