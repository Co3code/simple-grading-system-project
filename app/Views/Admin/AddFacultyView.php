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
    <div class="main-content d-flex justify-content-center align-items-center min-vh-100">
        <div class="card-glass-form p-5 mt-5">
            <h4 class="mb-4 text-center fw-bold text-light">Add Faculty</h4>

            <form action="/AddFacultySubmit" method="POST">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control input-glass" placeholder="Enter First Name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control input-glass" placeholder="Enter Last Name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control input-glass" placeholder="Enter password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control input-glass" placeholder="wowname@email.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control input-glass" placeholder="09123456789" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select input-glass" required>
                        <option>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">ID Number</label>
                    <input type="text" name="id_number" class="form-control input-glass" placeholder="C25-4033" required>
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