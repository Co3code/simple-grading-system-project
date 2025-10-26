<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<main class="main-content d-flex justify-content-center align-items-center vh-100">
    <div class="card-glass-form p-5 mt-5">
        <h3 class="mb-4 text-center fw-bold text-light">Update Subject</h3>

        <form action="/ViewSubjects/UpdateSubjectView/<?= htmlspecialchars($subjects['subject_id']); ?>/Update" method="POST">

            <div class="mb-3">
                <label class="form-label text-light">Subject Code</label>
                <input type="text" name="subject_code" class="form-control input-glass"
                    value="<?= htmlspecialchars($subjects['subject_code']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Subject Name</label>
                <input type="text" name="subject_name" class="form-control input-glass"
                    value="<?= htmlspecialchars($subjects['subject_name']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Year Level</label>
                <select name="year_level" class="form-select input-glass" required>
                    <option value="1st Year" <?= $subjects['year_level'] === '1st Year' ? 'selected' : ''; ?>>1st Year</option>
                    <option value="2nd Year" <?= $subjects['year_level'] === '2nd Year' ? 'selected' : ''; ?>>2nd Year</option>
                    <option value="3rd Year" <?= $subjects['year_level'] === '3rd Year' ? 'selected' : ''; ?>>3rd Year</option>
                    <option value="4th Year" <?= $subjects['year_level'] === '4th Year' ? 'selected' : ''; ?>>4th Year</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Semester</label>
                <select name="semester" class="form-select input-glass" required>
                    <option value="1st Semester" <?= $subjects['semester'] === '1st Semester' ? 'selected' : ''; ?>>1st Semester</option>
                    <option value="2nd Semester" <?= $subjects['semester'] === '2nd Semester' ? 'selected' : ''; ?>>2nd Semester</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Credit Units</label>
                <input type="number" name="credit_units" class="form-control input-glass"
                    value="<?= htmlspecialchars($subjects['credit_units']); ?>" min="0" step="0.5" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-info text-white px-4 me-2">
                    <i class="bi bi-arrow-repeat me-1"></i> Update
                </button>
                <a href="/ViewSubjects" class="btn btn-outline-light px-4">Cancel</a>
            </div>
        </form>
    </div>


</main>


<?php
$this->stop();
?>