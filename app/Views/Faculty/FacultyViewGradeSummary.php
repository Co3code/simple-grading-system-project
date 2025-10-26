<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<main class="main-content">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1 class="h2 text-light">Grade Summary View</h1>
            <p class="text-light">Subjects created by admin that you can apply to teach.</p>
        </div>
        <div class="col-md-6 text-end align-self-center">
            <?php if ($result): ?>
                <button class="btn btn-success text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#exportModal">
                    <i class="bi bi-file-earmark-excel-fill"></i> Export to Excel
                </button>
            <?php endif; ?> 
        </div>
    </div>

    <div class="card-glass2 mb-4 p-4">
        <h5 class="text-info mb-0">
            <i class="bi bi-journal-text"></i> <?= htmlspecialchars($subject['subject_code']) ?>
        </h5>
        <small class="text-light"><?= htmlspecialchars($subject['semester']) ?></small>
        <hr class="text-light">

        <div class="table-responsive">
            <table class="table table-hover text-center table-glass2 align-middle" id="grades">
                <thead>
                    <tr>
                        <th class="text-white">Student ID</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Year Level</th>
                        <th class="text-white">Prelim</th>
                        <th class="text-white">Midterm</th>
                        <th class="text-white">Finals</th>
                        <th class="text-white">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $subject): ?>
                        <tr>
                            <td class="text-white"><?= htmlspecialchars($subject['id_number']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($subject['student_name']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($subject['year_level']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($subject['prelim']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($subject['midterm']) ?></td>
                            <td class="text-white"><?= htmlspecialchars($subject['finals']) ?></td>
                            <td>
                                <?php if (!empty($subject['status'])): ?>
                                    <span class="badge bg-success">✅ Published</span>
                                <?php else: ?>
                                    <span class="badge bg-info text-dark">Wala pa</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- ✅ Excel Export Confirmation Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header bg-info text-dark">
                <h5 class="modal-title" id="exportModalLabel"><i class="bi bi-file-earmark-excel-fill"></i> Confirm Export</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to export the grades to an Excel file?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success fw-bold" id="confirmExportBtn">
                    Yes, Export Now
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ✅ SheetJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    document.getElementById('confirmExportBtn').addEventListener('click', function() {
        exportTableToExcel('grades', 'Grades_Summary');
        const modal = bootstrap.Modal.getInstance(document.getElementById('exportModal'));
        modal.hide();
    });

    function exportTableToExcel(tableID, filename = '') {
        const table = document.getElementById(tableID);
        const wb = XLSX.utils.table_to_book(table, {
            sheet: "Grades"
        });
        const fileName = filename ? filename + ".xlsx" : "grades.xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>

<!-- ✅ Styles -->


<?php
$this->stop();
?>