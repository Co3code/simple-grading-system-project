<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS and Icons -->
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />


</head>

<body>




    <!-- Main Content -->
    <div class="main-content d-flex justify-content-center align-items-center vh-100">
        <div class="card-glass-form p-5 mt-5">
            <h4 class="mb-4 text-center fw-bold text-light">Add Subject</h4>

            <form action="/AddSubjectSubmit" method="POST">

                <div class="mb-3">
                    <label class="form-label">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control input-glass" placeholder="e.g. IT101" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Subject Name</label>
                    <input type="text" name="subject_name" class="form-control input-glass" placeholder="e.g. Introduction to IT" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select input-glass" required>
                        <option value="">Select Semester</option>
                        <option>1st Semester</option>
                        <option>2nd Semester</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Year Level</label>
                    <select name="year_level" class="form-select input-glass" required>
                        <option value="">Select Year Level</option>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                        <option>4th Year</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Credit Units</label>
                    <input type="number" name="credit_units" class="form-control input-glass" placeholder="e.g. 3">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" name="save" class="btn btn-info text-white px-4 me-2">Save</button>
                    <button type="reset" class="btn btn-outline-light px-4">Reset</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$this->stop();
?>