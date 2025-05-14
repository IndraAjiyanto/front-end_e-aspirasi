<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laporan PPKS</title>

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
      color: #d63384 !important;
    }

    .btn-outline-primary {
      border-color: #d63384;
      color: #d63384;
    }

    .btn-outline-primary:hover {
      background-color: #d63384;
      color: white;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold text-primary">
          <i class="bi bi-shield-lock-fill me-2"></i> Laporan PPKS
        </h2>
        <p class="text-muted">Berikut laporan yang masuk untuk ditindaklanjuti.</p>
      </div>
    </div>

    <div class="card mb-3 shadow-sm border-0">
      <div class="card-body">
        <label class="form-label fw-semibold text-muted">Isi Laporan</label>
        <textarea class="form-control mb-3" rows="4" readonly>{{ $aspirasi['isi'] }}</textarea>

        <form action="{{ route('aspirasi.balas', $aspirasi['id']) }}" method="POST">
          @csrf
          <label class="form-label fw-semibold text-muted">Balas Laporan</label>
          <textarea name="isi" class="form-control" rows="3" placeholder="Tulis balasan..." required></textarea>

          <div class="mt-3 text-end">
            <button type="submit" class="btn btn-outline-primary">
              <i class="bi bi-send-fill me-1"></i> Kirim Balasan
            </button>
          </div>
        </form>
      </div>
    </div>

    <a href="{{route('unit.ppks')}}" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left-circle me-1"></i> Kembali
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
