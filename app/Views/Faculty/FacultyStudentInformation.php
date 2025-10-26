<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Navbar -->


<!-- Main Profile Content -->
<main class="main-content p-4 mt-5">
    <h2 class="mt-4">Student Information</h2>
    <p class="text-light">Overview of your subjects, applications, and notifications.</p>
    <div class="card-glass2 p-4 mb-5">
        <div class="d-flex flex-column flex-md-row align-items-center gap-4">
            <img src="https://ui-avatars.com/api/?name=<?= $student['first_name'] ?> <?= $student['last_name'] ?>"src="/img/juswa.jpg" alt="Profile Photo" class="rounded-circle"
                style="width: 100px; height: 100px; object-fit: cover;">

            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <h3 class="fw-bold mb-1"><?= $student['first_name'] ?> <?= $student['last_name'] ?></h3>
                        <p class="text-light mb-0">Student ID: <?= $student['id_number'] ?></p>
                        <p class="text-light mb-0">Year Level: <?= $student['year_level'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row">
            <h5 class="text-white mb-3"><i class="bi bi-journals"></i> SUBJECTS</h5>
            <?php foreach ($result as $result): ?>
                <div class="col-md-6 mb-3 text-center">
                    <div class="rounded border border-secondary shadow-sm p-4">
                        <h5 class="fw-bold"><?= $result['subject_code'] ?></h5>
                        <h6 class="text-light"><?= $result['subject_name'] ?></h6>
                        <hr>
                        <table class="table table2">
                            <thead>
                                <tr>
                                    <th>Prelim</th>
                                    <th>Midterm</th>
                                    <th>Finals</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $result['prelim'] ?></td>
                                    <td><?= $result['midterm'] ?></td>
                                    <td><?= $result['finals'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>



<?php $this->stop(); ?>