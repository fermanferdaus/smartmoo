<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SmartMoo | Login</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/login-style.css" rel="stylesheet" />
</head>
<body>
  <div class="container-fluid h-100">
    <div class="row h-100">
      <!-- Branding kiri -->
      <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-center left-panel p-4">
        <h1>SmartMoo</h1>
        <p>
          Aplikasi website untuk monitoring kesehatan sapi berbasis IoT (Internet of Things). 
          Pantau suhu, detak jantung, dan kadar oksigen sapi kamu secara real-time dengan sistem ini.
        </p>
      </div>

      <!-- Login kanan -->
      <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
        <div class="w-75">
          <h4 class="mb-4 text-center fw-bold">Sign In</h4>
          <form action="login_proses.php" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" id="username" name="username" class="form-control" required />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required />
                <span class="input-group-text"><i class="bi bi-eye"></i></span>
              </div>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" />
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-info text-white">Sign In</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('.input-group-text i.bi-eye');
        const passwordInput = document.getElementById('password');
    
        togglePassword.addEventListener('click', function () {
          const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordInput.setAttribute('type', type);
          
          // Toggle ikon mata / mata silang
          this.classList.toggle('bi-eye');
          this.classList.toggle('bi-eye-slash');
        });
      });
    </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
