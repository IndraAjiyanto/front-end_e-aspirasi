<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laporan Sarana & Prasarana</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f2f5;
    }

    .card {
      border-radius: 10px;
    }

    .text-primary {
      color: #2575fc !important; /* Warna hijau khas sarpras */
    }

    .btn-outline-primary {
      border-color: #2575fc;
      color: #2575fc;
    }

    .btn-outline-primary:hover {
      background-color: #2575fc;
      color: white;
    }

    .status-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .status-container i {
      margin-left: auto; /* Memastikan ikon status berada di sebelah kanan */
    }

    .status-answered {
      color: green;
      font-size: 1.5rem;
    }

    .status-in-progress {
      color: #ffc107;
      font-size: 1.5rem;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold text-primary">
          <i class="bi bi-tools me-2"></i> Laporan Sarana & Prasarana
        </h2>
        <p class="text-muted">Berikut adalah laporan terkait fasilitas kampus yang memerlukan perhatian.</p>
      </div>
    </div>

    <div class="mb-4 d-flex gap-2">
    <a href="/dashboard" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali ke Menu Awal
          </a>
          </div>
          
    @forelse($sarpras as $item)
      <div class="card mb-3 shadow-sm border-0">
        <div class="card-body">
          <p class="card-text text-secondary">{{ Str::limit($item['isi'], 100) }}</p>
          <div class="status-container">
            <a href="{{route('unit.sarpras.lihat', $item['id'])}}" class="btn btn-outline-primary">
              <i class="bi bi-eye-fill me-1"></i> Lihat
            </a>

            <!-- Tanda ceklis jika aspirasi sudah terbalas -->
            @if($item['status'] == 'dibalas')
              <i class="bi bi-check-circle status-answered" title="Sudah Terbalas"></i>
            <!-- Tanda jika aspirasi sedang diproses -->
            @elseif($item['status'] == 'diproses')
              <i class="bi bi-hourglass-split text-warning status-in-progress" title="Sedang Diproses"></i>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Belum ada laporan yang masuk untuk sarana & prasarana.
      </div>
    @endforelse
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
