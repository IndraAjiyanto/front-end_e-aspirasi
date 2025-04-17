<!-- resources/views/auth/login.blade.php -->

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Mahasiswa</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f6f9;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-box {
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      padding: 40px;
      width: 100%;
      max-width: 420px;
    }
    .login-title {
      font-weight: 600;
      font-size: 1.5rem;
      color: #343a40;
    }
    .form-control:focus {
      border-color: #6c63ff;
      box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
    }
    .btn-primary {
      background-color: #6c63ff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #574b90;
    }
    .form-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }
    .input-group {
      position: relative;
    }
    .input-icon {
      padding-left: 2.5rem;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="text-center mb-4">
      <i class="bi bi-person-circle fs-1 text-primary"></i>
      <h3 class="login-title mt-2">Login Mahasiswa</h3>
    </div>

    <form action="/login" method="POST">
      @csrf

    <div class="mb-3 input-group">
    <span class="input-group-text"><i class="bi bi-person"></i></span>
    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required autofocus>
    </div>

    <div class="mb-3 input-group">
    <span class="input-group-text"><i class="bi bi-lock"></i></span>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
    </div>

      <button type="submit" class="btn btn-primary w-100 mt-3">
        <i class="bi bi-box-arrow-in-right me-1"></i> Login
      </button>
    </form>

    <div class="text-center mt-3">
      <small>Belum punya akun? <a href="/register">Daftar disini</a></small>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
