<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS and Icons -->
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body>


    <!-- Main Content -->
    <div class="main-content d-flex justify-content-center align-items-center min-vh-100">
        <div class="card-glass-form p-5">
            <h4 class="mb-4 text-center fw-bold text-light">Update Faculty</h4>

            <form action="/ViewFaculty/UpdateFaculty/<?= htmlspecialchars($faculty['faculty_id']); ?>/Update" method="POST">

                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control input-glass" value="<?= htmlspecialchars($faculty['first_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control input-glass" value="<?= htmlspecialchars($faculty['last_name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control input-glass" value="<?= htmlspecialchars($faculty['phone_number']); ?>" required>
                </div>

                <!-- 
        <label>Password (leave blank to keep current):</label>
        <input type="password" name="password"><br> -->

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select input-glass" required>
                        <option value="Male" <?= $faculty['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?= $faculty['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control input-glass"
                        value="<?= htmlspecialchars($faculty['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Number</label>
                    <input type="text" name="id_number" class="form-control input-glass"
                        value="<?= htmlspecialchars($faculty['id_number']); ?>" required>
                </div>


                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-info text-white px-4 me-2">Update</button>
                    <a href="/ViewFaculty" class="btn btn-outline-light px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>


<?php
$this->stop();
?>