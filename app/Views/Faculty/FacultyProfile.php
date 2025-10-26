<?php
$this->layout('Faculty/Layout', ['mainContent' => $this->fetch('Faculty/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Navbar -->


<!-- Main faculty Content -->
<main class="main-content p-4 mt-5">
  <h2 class="mt-3">Faculty Dashboard</h2>
  <p class="text-light">Overview of your subjects, applications, and notifications.</p>

  <div class=" card-glass2 p-4 mb-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Profile Image -->
        <div class="col-md-2 text-center mb-3 mb-md-0">
          <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['name'] ?>" alt="Faculty Photo"
            class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
        </div>

        <!-- Info + Buttons -->
        <div class="col-md-10">
          <div class="row">
            <!-- Info -->
            <div class="col-12 col-lg-8">
              <h3 class="fw-bold mb-2"><?= $faculty['first_name'] ?> <?= $faculty['last_name'] ?></h3>
              <p class="text-light mb-1">Faculty ID: <?= $faculty['id_number'] ?></p>
              <p class="text-light mb-1">Email: <?= $faculty['email'] ?></p>
              <p class="text-light mb-3">Phone: <?= $faculty['phone_number'] ?></p>
            </div>

            <!-- Buttons -->
            <div
              class="col-12 col-lg-4 d-flex flex-wrap justify-content-start justify-content-lg-end align-items-start gap-2">
              <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updatefacultyModal">
                Edit Profile
              </a>
              <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                Change Password
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <hr class="my-4">
    <h5><i class="bi bi-journals me-1"></i> MY SUBJECTS</h5>
    <div class="row text-center mt-4">
      <?php foreach ($subjects as $subject): ?>
        <div class="col-md-4 mb-3">
          <a href="/faculty-grading/<?= $subject['subject_id'] ?>">
            <div class="rounded shadow-sm border border-secondary p-4 h-100">
              <h5 class="fw-bold"><?= $subject['subject_code'] ?></h5>
              <h6 class="text-light"><?= $subject['subject_name'] ?></h6>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<!-- Edit faculty Modal -->
<div class="modal fade text-start" id="updatefacultyModal" tabindex="-1" aria-labelledby="editfacultyLabel"
  aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content bg-primary-subtle">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editfacultyLabel">Edit faculty Details</h1>
        <a href="/faculty-profile" class="btn-close" aria-label="Close"></a>
      </div>
      <form method="POST" action="/faculty-profile/EditProfile">
        <div class="modal-body row">
          <div class="mb-3">
            <label>First Name</label>
            <input type="text" class="form-control" value="<?= $faculty['first_name'] ?>" name="firstName">
          </div>
          <div class="mb-3">
            <label>Last Name</label>
            <input type="text" class="form-control" value="<?= $faculty['last_name'] ?>" name="lastName">
          </div>
          <div class="mb-3">
            <label>Mobile Number</label>
            <input type="text" class="form-control" value="<?= $faculty['phone_number'] ?>" name="phoneNumber">
          </div>
        </div>
        <div class="modal-footer">
          <a href="/faculty-profile" class="btn btn-secondary">Close</a>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade text-start" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content bg-primary-subtle">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
        <a href="/faculty-profile" class="btn-close" aria-label="Close"></a>
      </div>
      <form method="POST" action="/faculty-profile/ChangePassword">
        <div class="modal-body row">
          <div class="mb-3">
            <label for="password">Enter Current Password</label>
            <input type="password" required="oh" class="form-control" id="currentPassword" placeholder="Enter current password"
              name="currentPassword">
          </div>
          <hr>
          <div class="mb-3">
            <label for="password">New Password</label>
            <input type="password" required class="form-control" id="newPassword"
              placeholder="Enter new password" name="newPassword">
          </div>
          <div class="mb-3">
            <label for="confirmPassword">Retype New Password</label>
            <input type="password" required="oh" class="form-control" id="confirmPassword"
              placeholder="Confirm new password" name="confirmPassword">
          </div>
          <div class="col-12 mt-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="showPasswords">
              <label class="form-check-label text-black" for="showPasswords">
                Show password
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-secondary" href="/faculty-profile">Close</a>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php $this->stop(); ?>