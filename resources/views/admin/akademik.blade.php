<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Aspirasi Unit Akademik</title>

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
      color: #2575fc !important;
    }

    .btn-outline-primary {
      border-color: #2575fc;
      color: #2575fc;
    }

    .btn-outline-primary:hover {
      background-color: #2575fc;
      color: white;
    }

    /* Memastikan ikon ceklis ada di sebelah kanan */
    .status-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .status-answered {
      color: green;
      font-size: 1.5rem;
    }
  </style>
</head>
<body>


  <div class="container py-5">
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold text-primary">
          <i class="bi bi-journal-text me-2"></i> Aspirasi Unit Akademik
        </h2>
        <p class="text-muted">Berikut adalah daftar aspirasi yang masuk ke unit Akademik.</p>
      </div>
    </div>

    <div class="mb-4 d-flex gap-2">
    <a href="/dashboard" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali ke Menu Awal
          </a>
          </div>

    @forelse($akademik as $item)
      <div class="card mb-3 shadow-sm border-0">
        <div class="card-body">
          <p class="card-text text-secondary">{{ \Illuminate\Support\Str::limit($item->isi, 100) }}</p>
        
          <!-- Status Container untuk memastikan ceklis ada di kanan -->
          <div class="status-container">
            <a href="/aspirasi/lihatakademik" class="btn btn-outline-primary">
              <i class="bi bi-eye-fill me-1"></i> Lihat
            </a>

            <!-- Tanda ceklis jika aspirasi sudah terbalas -->
            @if($item->status == 'terbalas')
              <i class="bi bi-check-circle status-answered"></i>
            <!-- Tanda jika aspirasi sedang diproses -->
            @elseif($item->status == 'diproses')
              <i class="bi bi-hourglass-split text-warning" style="font-size: 1.5rem;" title="Sedang Diproses"></i>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Belum ada aspirasi yang masuk untuk unit ini.
      </div>
    @endforelse
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
