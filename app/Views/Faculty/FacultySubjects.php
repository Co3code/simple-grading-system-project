<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>
<!-- Add your content here to be displayed in the browser -->

<!-- Main Content -->
<main class="main-content">
  <div class=" mb-4">
    <h1 class="h2">My Subjects</h1>
    <p class="text-light">Subjects assigned to you by the admin.</p>
  </div>

  <!-- My Subjects (List Style) -->
  <div class="card-glass2 mb-4">
    <h5><i class="bi bi-journal-text"></i> My Subjects</h5>
    <hr>
    <table class="table table-glass2 table-hover table2" id="table">
      <thead>
        <tr>
          <th class="text-white">Code</th>
          <th class="text-white">Title</th>
          <th class="text-white">Year Level</th>
          <th class="text-white">Semester</th>
          <th class="text-white">Units</th>
          <th class="text-white">Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($subjects as $subject): ?>
          <tr>
            <td class="text-white"><?= htmlspecialchars($subject['subject_code']) ?></td>
            <td class="text-white"><?= htmlspecialchars($subject['subject_name']) ?></td>
            <td class="text-white"><?= htmlspecialchars($subject['year_level']) ?></td>
            <td class="text-white"><?= htmlspecialchars($subject['semester']) ?></td>
            <td class="text-white"><?= htmlspecialchars($subject['credit_units']) ?></td>
            <td><a href="/faculty-grading/<?= $subject['subject_id'] ?>" class="btn btn-warning btn-sm">View Subject</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Subject Applications -->
  <div class="return mt-4">
    <a href="/faculty-subject/PendingApplication"><i class="bi bi-clock-history"></i> View Pending Applications</a>
  </div>
</main>

<?php
$this->stop();
?>