<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Add your content here to be displayed in the browser -->

<!-- Main Content -->
<main class="main-content">
  <div class="row mb-3">
    <div class="col-md-6">
      <h1 class="h2">Available Subjects</h1>
      <p class="text-light ">Subjects created by admin that you can apply to teach.</p>
    </div>
  </div>

  <div class="card-glass2 mb-4">
    <h5><i class="bi bi-journal-text"></i> Available Subjects</h5>
    <hr>
    <table class="table table-hover text-center table2" id="table">
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
      <tbody>
        <?php foreach ($subjects as $subject): ?>
          <tr>
            <td class="text-white"><?= htmlspecialchars($subject['subject_code']) ?></td>
            <td class="text-white"><?= htmlspecialchars($subject['subject_name']) ?></td> 
            <td class="text-white"><?= htmlspecialchars($subject['year_level']) ?></td>
            <td class="text-white"><?= htmlspecialchars($subject['semester']) ?></td>
            <td class="text-white"><?= htmlspecialchars($subject['credit_units']) ?></td>
            <td><a href="/faculty-subjectApplication/<?= htmlspecialchars($subject['subject_id'] )?>" class="btn btn-warning btn-sm">Apply</a></td>
          </tr>
        <?php endforeach; ?>
    </table>
    </tbody>
  </div>

  </div>
</main>

<?php
$this->stop();
?>