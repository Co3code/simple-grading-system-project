<?php
$this->layout('Student/Layout', ['mainContent' => $this->fetch('Student/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Main Content -->
<main class="main-content">
  <h2>Profile</h2>
  <p class="text-light">View your profile details.</p>

  <div class=" card-glass2 p-4 mb-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Profile Image -->
        <div class="col-md-2 text-center mb-3 mb-md-0">
          <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['student_name'] ?>" alt="Faculty Photo"
            class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
        </div>

        <!-- Info + Buttons -->
        <div class="col-md-10">
          <div class="row">
            <!-- Info -->
            <div class="col-12 col-lg-8">
              <h3 class="fw-bold mb-2"><?= $student['first_name'] ?> <?= $student['last_name'] ?></h3>
              <p class="text-light mb-1">Faculty ID: <?= $student['id_number'] ?></p>
              <p class="text-light mb-1">Email: <?= $student['email'] ?></p>
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
  </div>
</main>
<div class="modal fade text-start" id="updatefacultyModal" tabindex="-1" aria-labelledby="editfacultyLabel"
  aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content card-glass2">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editfacultyLabel">Edit Profile</h1>
        <a href="/profile" class="btn-close bg-white" aria-label="Close"></a>
      </div>
      <div class=" my-4 p-3" id="editForm">
        <form method="post" enctype="multipart/form-data" id="profileForm">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name"
                value="<?= htmlspecialchars($student['first_name'] ?? '') ?>" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name"
                value="<?= htmlspecialchars($student['last_name'] ?? '') ?>" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-control" id="gender" name="gender">
                <option value="Male" <?= ($student['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= ($student['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= ($student['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="mobile" class="form-label">Mobile Number</label>
              <input type="text" class="form-control" id="mobile" name="mobile"
                value="<?= htmlspecialchars($student['mobile_number'] ?? '') ?>">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" class="form-control" id="password" name="password"
                placeholder="Enter new password">
            </div>
            <div class="col-md-6 mb-3">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                placeholder="Confirm new password">
            </div>
          </div>

          <div class="modal-footer mt-3">
            <a class="btn btn-secondary" href="/profile">Close</a>
            <button type="submit" name="update_profile" class="btn btn-info">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$this->stop();
?>