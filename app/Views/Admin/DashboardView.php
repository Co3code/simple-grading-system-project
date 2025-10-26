<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Add your content here to be displayed in the browser -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - CKC Information Technology</title>
  <link rel="icon" href="logo.png" type="image/png" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS and Icons -->
  <link rel="stylesheet" href="/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />


</head>

<body>





  <!-- Main Content -->
  <main class="main-content">
    <div class="container-fluid">
      <h2>Admin Dashboard</h2>
      <p class="text-light">Overview of your total subjects and instructors.</p>

      <div class="row g-4 my-4 justify-content-center">

        <!-- Card 1 - Instructors -->
        <div class="col-md-5 col-lg-4">
          <a href="/ViewFaculty" class="text-decoration-none">
            <div class="card-glass hover-card text-center ">
              <i class="bi bi-person-badge metric-icon"></i>
              <div>
              <p>Total Faculty: <?= $facultyCount ?></p>
                <div class="card-value"></div>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 2 - Subjects -->
        <div class="col-md-5 col-lg-4">
          <a href="/ViewSubjects" class="text-decoration-none">
            <div class="card-glass hover-card">
              <i class="bi bi-journal-text metric-icon"></i>
              <div>
                <p>Total Subjects: <?= $subjectsCount ?></p>
                <div class="card-value"></div>
              </div>
            </div>
          </a>
        </div>

      </div>

    </div>
    <footer class="mt-4">
      <p>© 2025 <span>Christ the King College</span>. All rights reserved.</p>
    </footer>
  </main>



  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Logic -->
  <script>
    const DB = {
      mySubjects: [{
        code: 'CS101',
        title: 'Intro to CS',
        units: 3
      }],
      pending: [{
        code: 'MATH200',
        title: 'Calculus II',
        units: 4,
        applicants: 2
      }],
      notifications: 2,
      activity: [
        'You approved 2 students for CS101',
        'New application for MATH200'
      ]
    };

    function renderDashboard() {
      document.getElementById('countMySubjects').textContent = DB.mySubjects.length;
      document.getElementById('countPending').textContent = DB.pending.length;
      document.getElementById('countNotifs').textContent = DB.notifications;

      const activityList = document.getElementById('activityList');
      activityList.innerHTML = '';
      DB.activity.forEach(item => {
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.textContent = item;
        activityList.appendChild(li);
      });
    }

    renderDashboard();

    // Handle notification actions
    document.querySelectorAll(".btn-confirm").forEach(btn => {
      btn.addEventListener("click", () => {
        alert("Student confirmed!");
      });
    });

    document.querySelectorAll(".btn-delete").forEach(btn => {
      btn.addEventListener("click", () => {
        alert("Request deleted!");
      });
    });
  </script>

</body>

</html>


<?php
$this->stop();
?>