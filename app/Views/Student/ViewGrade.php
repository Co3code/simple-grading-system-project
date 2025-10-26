<?php
$this->layout('Student/Layout', ['mainContent' => $this->fetch('Student/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');

?>

<!-- Main Content -->
<main class="main-content">
  <h2 class="mb-3">View Grades</h2>
  <p class="text-light">Your grades and subjects overview.</p>

  <div class="card-glass2 mt-4">
    <h4 class="text-center mb-4 text-info">
      <i class="bi bi-journal-check"></i> Grade Summary
    </h4>

    <div class="table-responsive">
      <table class="table table-glass-available text-center align-middle">
        <thead>
          <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Prelim</th>
            <th>Midterm</th>
            <th>Finals</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($grades as $grade): ?>
            <tr>
              <td><?= htmlspecialchars($grade['subject_code']) ?></td>
              <td><?= htmlspecialchars($grade['subject_name']) ?></td>
              <td><?= $grade['prelim'] ? htmlspecialchars($grade['prelim']) : '<span class="text-secondary">—</span>' ?></td>
              <td><?= $grade['midterm'] ? htmlspecialchars($grade['midterm']) : '<span class="text-secondary">—</span>' ?></td>
              <td><?= $grade['finals'] ? htmlspecialchars($grade['finals']) : '<span class="text-secondary">—</span>' ?></td>
              <td>
                <?php if ($grade['prelim'] || $grade['midterm'] || $grade['finals']): ?>
                  <span class="badge bg-success">✅ Graded</span>
                <?php else: ?>
                  <span class="badge bg-info text-dark">🕓 Joined (No Grades Yet)</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php $this->stop(); ?>