<?php
$this->layout('Student/Layout', ['mainContent' => $this->fetch('Student/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Main Content -->
<main class="main-content">
  <h2>Student Dashboard</h2>
  <p class="text-light">Overview of your Enrolled Subjects, Grades, and Notifications.</p>

  <div class="row g-4 mb-4">
    <a href="/mysubjects" class="col-md-4">
      <div class="card-glass">
        <i class="bi bi-book metric-icon"></i> <!-- Changed icon -->
        <div>
          <div class="card-title">My Subjects</div>
          <div class="card-value" id="countSubjects">
            <?= isset($subjectCount) ? htmlspecialchars($subjectCount) : '—' ?>
          </div>
        </div>
      </div>
    </a>

    <a href="/joinClassView" class="col-md-4">
      <div class="card-glass">
        <i class="bi bi-journal-bookmark-fill metric-icon"></i>
        <div>
          <div class="card-title">Pending Applications</div>

          <!-- ✅ UPDATED: Dynamically show real count from controller -->
          <div class="card-value" id="countPending">
            <?= isset($pendingCount) ? htmlspecialchars($pendingCount) : '—' ?>
          </div>
        </div>
      </div>
    </a>

    <a href="/viewgrade" class="col-md-4">
      <div class="card-glass">
        <i class="bi bi-journal-check metric-icon"></i>
        <div>
          <div class="card-title">View Grades</div>
          <div class="card-value">
            <span id="countGrades">—</span>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="card-glass">
    <h5>Recent Activity</h5>
    <ul class="list-group list-group-flush activity-list mt-3" id="activityList"></ul>
  </div>
</main>

<!-- Bootstrap Bundle -->

<?php
$this->stop();
?>
