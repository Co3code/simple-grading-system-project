<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Add your content here to be displayed in the browser -->
<!-- Top Navigation -->

<!-- Main Content -->
<main class="main-content">
    <div class="mb-4">
        <h1 class="h2"><?= htmlspecialchars($subject['subject_code']) ?></h1>
        <p class="text-light"><?= htmlspecialchars($subject['subject_name']) ?></p>
    </div>

    <!-- My Subjects (List Style) -->
    <div class="card-glass2 mb-4">
        <h5><i class="bi bi-journal-text"></i> STUDENT GRADE</h5>
        <hr>
        <h6><?= htmlspecialchars($student['first_name']) ?> <?= htmlspecialchars($student['last_name']) ?></h6>
        <table class="table table-glass2 text-center my-3" id="grades">
            <thead>
                <tr>
                    <th>Prelim</th>
                    <th>Midterm</th>
                    <th>Finals</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($grade['prelim'] ?: '—') ?></td>
                    <td><?= htmlspecialchars($grade['midterm'] ?: '—') ?></td>
                    <td><?= htmlspecialchars($grade['finals'] ?: '—') ?></td>
                </tr>

            </tbody>
        </table>
        <?php if (empty($grade['status'])): ?>
            <?php if (!empty($grade['prelim']) && !empty($grade['midterm']) && !empty($grade['finals'])): ?>
                <a href="/faculty-grading/GradeStudent/<?= $subject['subject_id'] ?>/<?= $student['student_id'] ?>/publish" class="btn btn-sm btn-success px-3">Publish Grade</a>
            <?php else: ?>
                <button type="button" class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#addFormModal">
                    Add Grade
                </button>
            <?php endif; ?>
            <button type="button" class="btn btn-sm btn-secondary px-3" data-bs-toggle="modal" data-bs-target="#editFormModal">
                Edit Grade
            </button>
        <?php else: ?>
            <button class="btn btn-sm btn-secondary px-3" disabled>Published</button>
        <?php endif; ?>


    </div>


    <!-- add grade form modal -->
    <div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="addFormLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content bg-success-subtle">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addFormLabel">Add Student Grade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/faculty-grading/GradeStudent/<?= $subject['subject_id'] ?>/<?= $student['student_id'] ?>/edit">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="type" id="" value="add">
                            <label class="form-label">Select Grading Term</label>
                            <select name="term" class="form-select" required>
                                <option value="" disabled selected>-- --</option>
                                <?php if (empty($grade['prelim'])): ?>
                                    <option value="prelim">Prelim</option>
                                <?php endif; ?>
                                <?php if (empty($grade['midterm'])): ?>
                                    <option value="midterm">Midterm</option>
                                <?php endif; ?>
                                <?php if (empty($grade['finals'])): ?>
                                    <option value="finals">Finals</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="my-3">
                            <label class="form-label">Enter Grade</label>
                            <input type="text" name="grade" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Grade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editFormModal" tabindex="-1" aria-labelledby="editFormLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content bg-success-subtle">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editFormLabel">Add Student Grade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/faculty-grading/GradeStudent/<?= $subject['subject_id'] ?>/<?= $student['student_id'] ?>/edit">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="type" id="" value="edit">
                            <label class="form-label">Select Grading Term</label>
                            <select name="term" class="form-select" required>
                                <option value="" disabled selected>-- --</option>
                                <?php if (!empty($grade['prelim'])): ?>
                                    <option value="prelim">Prelim</option>
                                <?php endif; ?>
                                <?php if (!empty($grade['midterm'])): ?>
                                    <option value="midterm">Midterm</option>
                                <?php endif; ?>
                                <?php if (!empty($grade['finals'])): ?>
                                    <option value="finals">Finals</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="my-3">
                            <label class="form-label">Enter Grade</label>
                            <input type="text" name="grade" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Edit Grade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
$this->stop();
?>