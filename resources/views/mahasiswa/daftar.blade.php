<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
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

        .register-box {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 480px;
        }

        .register-title {
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

<div class="register-box">
    <div class="text-center mb-4">
        <i class="bi bi-pencil-square fs-1 text-primary"></i>
        <h3 class="register-title mt-2">Pendaftaran Akun</h3>
    </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 <form method="POST" action="{{ route('daftar') }}">
    @csrf

    <!-- Username -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
    </div>

    <!-- Email -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>

    <!-- Password -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-lock"></i></span>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>

    <!-- Konfirmasi Password -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
        <input type="password" name="pass_confirm" class="form-control" placeholder="Konfirmasi Password" required>
    </div>

    <!-- NIM -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
        <input type="text" name="nim" class="form-control" placeholder="NIM" required>
    </div>

    <!-- Nama -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
    </div>

    <!-- Kelas -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-building"></i></span>
        <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
    </div>

    <!-- Prodi -->
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="bi bi-journal-code"></i></span>
        <input type="text" name="prodi" class="form-control" placeholder="Program Studi" required>
    </div>

    <!-- Jurusan -->
    <div class="mb-4 input-group">
        <span class="input-group-text"><i class="bi bi-journals"></i></span>
        <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary w-100">
        <i class="bi bi-check-circle me-1"></i> Daftar
    </button>
</form>


    <p class="text-center mt-3">
        Sudah punya akun? <a href="/login" class="text-decoration-none text-primary">Login di sini</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
