<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'E-Aspirasi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            min-height: 100vh;
            padding-top: 60px;
        }
        .card {
            border-radius: 1rem;
            border: 1px solid #dee2e6;
        }
        .btn-custom {
            background-color: #0d6efd;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0b5ed7;
        }
        .avatar-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease;
        }
    </style>
    @stack('styles')
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
