
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
body {
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #0d2a4e;
  color: #e0f0ff;
  overflow-x: hidden;
  position: relative;
  min-height: 100vh;
  z-index: 0;
}
body::before {
  content: "";
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: url('/img/ckc_bg.jpg') no-repeat center center/cover;
  filter: blur(10px) brightness(0.6);
  z-index: -1;
}
.navbar-blur {
  background: rgba(0, 44, 89, 0.85);
  backdrop-filter: blur(10px);
  border-bottom: 1px solid rgba(74, 200, 224, 0.15);
}
.navbar-blur .navbar-brand {
  color: #4ac8e0;
  font-weight: 600;
}
.main-content {
  padding: 120px 30px 30px;
  position: relative;
  z-index: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: calc(100vh - 56px);
}
.card-glass {
  background: rgba(74, 200, 224, 0.15);
  border: 1px solid rgba(74, 200, 224, 0.3);
  backdrop-filter: blur(14px);
  border-radius: 20px;
  padding: 40px;
  color: #e0f0ff;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
  max-width: 400px;
  width: 100%;
  transition: transform 0.2s ease-in-out;
}
.card-glass:hover {
  transform: translateY(-4px);
}
.form-label {
  color: #b2d4ec;
  font-weight: 500;
}
.form-control, select.form-control {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(74, 200, 224, 0.3);
  color: #e0f0ff;
  border-radius: 10px;
}
.form-control:focus, select.form-control:focus {
  background: rgba(255, 255, 255, 0.15);
  border-color: #4ac8e0;
  color: #e0f0ff;
  box-shadow: 0 0 0 0.2rem rgba(74, 200, 224, 0.25);
}
select.form-control option {
  background-color: #0d2a4e;
  color: #e0f0ff;
}
.btn-primary {
  background: #4ac8e0;
  border: none;
  border-radius: 10px;
  padding: 10px 20px;
  font-weight: 600;
  transition: background 0.2s ease;
}
.btn-primary:hover {
  background: #3ba8c4;
}
.alert-danger {
  background-color: rgba(255, 0, 0, 0.2);
  border: 1px solid rgba(255, 0, 0, 0.4);
  color: #ffbaba;
  border-radius: 10px;
  padding: 10px;
  text-align: center;
  margin-bottom: 15px;
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-blur fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <i class="bi bi-mortarboard"></i> Portal Login
    </a>
  </div>
</nav>

<main class="main-content">
  <div class="card-glass">
    <h3 id="loginTitle" class="text-center mb-4">Student Login</h3>

    <?php if (!empty($error)): ?>
      <div class="alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="/login-student">
      <div class="mb-3">
        <label for="login_type" class="form-label">Login as</label>
        <select class="form-control" id="login_type" name="login_type" required>
          <option value="student">Student</option>
          <option value="parent">Parent</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">ID Number</label>
        <input type="text" class="form-control" id="email" name="studentId" required>
      </div>
      <div class="d-grid">
        <button id="loginBtn" type="submit" class="btn btn-primary">Login as Student</button>
      </div>
    </form>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
