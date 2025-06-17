<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>E-Aspirasi Navbar</title>

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

    .dropdown-alert-wrapper {
      position: relative;

    }
    .alert {
      border-radius: 8px;
      padding: 12px 20px;
      background-color: #e9ecef; /* Light gray background */
      color: #495057; /* Dark text for better readability */
      border: 1px solid #ddd; /* Subtle border */
    }
   

    .alert .alert-link:hover {
      text-decoration: underline;
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

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="bi bi-lightning-fill"></i> E-Aspirasi
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
              aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-3 mt-3 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/navbar">
              <i class="bi bi-house-door-fill"></i> Home
            </a>
          </li>
          <li class="nav-item dropdown-alert-wrapper">
            <a class="nav-link" onclick="toggleAspirasiAlert(event)">
              <i class="bi bi-chat-left-text-fill"></i> Aspirasi
            </a>
            <!-- Alert Dropdown -->
            <div id="aspirasi-alert" class="alert alert-info shadow">
              <strong><i class="bi bi-info-circle-fill"></i> Unit:</strong>
              <ul class="mb-0 mt-2 ps-3">
              <li><a href="{{route('unit.ppks')}}" class="alert-link">PPKS</a></li>
              <li><a href="{{route('unit.akademik')}}" class="alert-link">Akademik</a></li>
                <li><a href="{{route('unit.sarpras')}}" class="alert-link">Sarana dan Prasarana</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="btn btn-logout" href="/login">
              <i class="bi bi-box-arrow-right"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Penjelasan tentang Aspirasi -->
  <div class="aspirasi-section">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <!-- Kiri: Judul dan Deskripsi -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="aspirasi-overlay">
          <h2 class="aspirasi-title mb-3"><i class="bi bi-info-circle-fill text-primary"></i> Apa Itu Aspirasi?</h2>
          <p class="aspirasi-desc">
            Aspirasi adalah bentuk penyampaian ide, kritik, maupun saran dari mahasiswa atau civitas akademika terhadap berbagai aspek kampus.
            <br><br>
            Melalui <strong>E-Aspirasi</strong>, kamu bisa menyuarakan pendapat dengan mudah, terbuka, dan terstruktur.
          </p>
        </div>
      </div>

      <!-- Kanan: Manfaat -->
      <div class="col-lg-5">
        <div class="aspirasi-overlay">
          <h5 class="mb-3"><i class="bi bi-star-fill text-warning"></i> Manfaat E-Aspirasi</h5>
          <ul class="aspirasi-list list-unstyled mb-0">
            <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Menampung suara mahasiswa secara sistematis</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Meningkatkan kualitas layanan kampus</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Mendorong partisipasi aktif mahasiswa</li>
            <li><i class="bi bi-check-circle-fill"></i> Memberi solusi nyata atas masukan</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Toggle Alert -->
  <script>
    function toggleAspirasiAlert(event) {
      event.stopPropagation();
      const alertBox = document.getElementById('aspirasi-alert');
      alertBox.style.display = (alertBox.style.display === 'block') ? 'none' : 'block';
    }

    // Hide when clicking outside
    document.addEventListener('click', function (e) {
      const alertBox = document.getElementById('aspirasi-alert');
      const wrapper = document.querySelector('.dropdown-alert-wrapper');
      if (!wrapper.contains(e.target)) {
        alertBox.style.display = 'none';
      }
    });
  </script>
</body>
</html>

