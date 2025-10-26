<?php
$this->layout('Admin/Layout', ['mainContent' => $this->fetch('Admin/Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Subject Allocation Verification - CKC Information Technology</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #051937, #004d7a, #008793, #00bf72, #a8eb12);
            color: #e8f7ff;
            overflow-x: hidden;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/img/bg.jpg') no-repeat center center/cover;
            filter: blur(10px) brightness(0.6);
            z-index: -1;
        }

        .navbar-blur {
            background: rgba(0, 25, 51, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* More visible logo & navbar text */
        .navbar-brand {
            color: #5ee2ff !important;
            font-weight: 700;
            text-shadow: 0 0 6px rgba(0, 255, 255, 0.4);
        }

        .navbar-text {
            color: #d8f6ff !important;
            font-weight: 500;
        }

        .sidebar {
            background: rgba(0, 32, 64, 0.85);
            backdrop-filter: blur(14px);
            height: 100vh;
            width: 240px;
            position: fixed;
            top: 56px;
            left: 0;
            padding-top: 1rem;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar a {
            color: #d7f4ff;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(94, 226, 255, 0.2);
            border-left: 4px solid #5ee2ff;
            color: #ffffff;
        }

        .main-content {
            margin-left: 240px;
            padding: 80px 30px 40px;
        }

        /* Headings – brighter & readable */
        h4,
        h5 {
            color: #7de8ff;
            font-weight: 700;
            text-shadow: 0 0 6px rgba(0, 0, 0, 0.4);
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(94, 226, 255, 0.3);
            backdrop-filter: blur(15px);
            color: #ffffff;
            box-shadow: 0 0 25px rgba(94, 226, 255, 0.15);
        }

        .card-header {
            background: linear-gradient(90deg, #004d7a, #008793);
            border-bottom: none;
        }

        /* Transparent Glass Table */
        .table {
            background-color: transparent !important;
            border-collapse: separate;
            border-spacing: 0;
            color: #ffffff !important;
        }

        .table th,
        .table td {
            background-color: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: #eafaff !important;
            backdrop-filter: blur(10px);
        }

        .table thead th {
            background: rgba(94, 226, 255, 0.2) !important;
            border-bottom: 2px solid rgba(94, 226, 255, 0.4) !important;
            color: #ffffff;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .table tbody tr:hover {
            background: rgba(94, 226, 255, 0.1) !important;
            transition: 0.3s;
        }

        .badge {
            font-size: 0.85rem;
        }

        .btn-success,
        .btn-danger {
            border: none;
            transition: 0.3s;
            font-weight: 500;
        }

        .btn-success {
            background: linear-gradient(90deg, #00bf72, #00e58c);
        }

        .btn-danger {
            background: linear-gradient(90deg, #ff4b4b, #ff6b6b);
        }

        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 255, 150, 0.5);
        }

        .btn-danger:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 75, 75, 0.5);
        }

        footer {
            text-align: center;
            color: #c2ecff;
            margin-top: 40px;
            font-size: 0.9rem;
        }

        footer span {
            color: #5ee2ff;
            font-weight: 600;
        }

        @media (max-width: 992px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding-top: 90px;
            }
        }
    </style>

</head>

<body>
    

    <!-- Main Content -->
    <main class="main-content">
        <div class="container py-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-header text-white d-flex justify-content-center align-items-center text-center">
                    <h4 class="mb-0 fw-bold">Subject Allocation Verification</h4>
                </div>


                <div class="card-body">
                    <!-- Pending Requests -->
                    <h5 class="mb-3">Pending Subject Picks</h5>
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>

                                <th>Faculty</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Year Level</th>
                                <th>Semester</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Prof. Maria Santos</td>
                                <td>IT203</td>
                                <td>Database Systems</td>
                                <td>2nd Year</td>
                                <td>1st Semester</td>

                                <td>
                                    <button class="btn btn-sm btn-success">Approve</button>
                                    <button class="btn btn-sm btn-danger">Reject</button>
                                </td>
                            </tr>
                            <tr>

                               

                                <td>
                                    <button class="btn btn-sm btn-success">Approve</button>
                                    <button class="btn btn-sm btn-danger">Reject</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr class="my-4">

                    <!-- Verified Allocations -->
                    <h5 class="mb-3">Verified Allocations</h5>
                    <table class="table table-hover align-middle text-center">
                        <thead>
                            <tr>

                                <th>Faculty</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Year Level</th>
                                <th>Semester</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                              
                                <td><span class="badge bg-success">Approved</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <footer class="mt-4">
                <p>© 2025 <span>Christ the King College</span>. All rights reserved.</p>
            </footer>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$this->stop();
?>