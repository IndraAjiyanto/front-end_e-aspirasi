<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'E-Aspirasi')</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .navbar {
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      padding: 0.75rem 1.5rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 600;
      color: #fff;
      display: flex;
      align-items: center;
    }

    .navbar-brand i {
      margin-right: 8px;
    }

    .nav-link {
      color: #ffffff;
      font-weight: 500;
      transition: 0.3s;
    }

    .nav-link i {
      margin-right: 5px;
    }

    .nav-link:hover {
      color: #ffeb3b;
    }

    .btn-logout {
      background-color: #ff4d4d;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .btn-logout:hover {
      background-color: #d32f2f;
    }


    .aspirasi-section {
    background: url('https://img.freepik.com/free-vector/college-students-concept-illustration_114360-28610.jpg?t=st=1744707637~exp=1744711237~hmac=3b90cbff9256390ea767a640da550970cfd557bb34890d87fd1345ebd4f173db&w=1380') no-repeat center 20%;
    background-size: cover;
    background-blend-mode: lighten;
    background-color:rgb(153, 153, 156);
    padding: 100px 0;
  }

  .aspirasi-overlay {
    background-color: rgba(255, 255, 255, 0.85);
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
  }

  .aspirasi-title {
    font-weight: 700;
    font-size: 2rem;
    color: #343a40;
  }

  .aspirasi-desc {
    font-size: 1rem;
    color: #6c757d;
  }

  .aspirasi-list i {
    margin-right: 10px;
    color: #198754;
  }
  #aspirasi-alert {
  position: absolute;
  top: 100%;
  left: 0;
  transform: translateY(10px);
  z-index: 1050;
  display: none;
  max-width: 350px; /* kamu bisa tambah jadi 400px atau lebih */
  width: max-content; /* ini penting biar dia ngikutin konten */
  min-width: 250px; /* supaya gak terlalu kecil juga */
  font-size: 0.95rem;
  white-space: nowrap; /* opsional, kalau mau mencegah baris baru */
}

     .dropdown-menu {
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      padding: 0.5rem 0;
    }

    .dropdown-menu li a {
      padding: 10px 20px;
      color: #343a40;
      display: block;
      text-decoration: none;
    }
    
    @media (max-width: 768px) {
      .navbar-nav {
        margin-top: 15px;
        text-align: center;
      }
      .nav-item {
        margin-bottom: 10px;
      }
    }

  @media (max-width: 1000px) {
    .aspirasi-section {
      background-position: center top;
      background-size:cover;
    }
  }
  </style>
</head>
<body>
  @include('partials.navbar_admin_ppks')

  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
