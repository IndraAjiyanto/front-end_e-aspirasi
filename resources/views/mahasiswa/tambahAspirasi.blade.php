<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Tambah Aspirasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
    }
    .form-label {
      font-weight: 600;
    }
    .btn-primary i {
      margin-right: 4px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card p-4">
          <h4 class="mb-4 text-center text-primary">Tambah Aspirasi</h4>
          <form id="aspirasiForm" action="{{ route('aspirasi.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="unit" class="form-label">Pilih Unit</label>
              <select id="unit" name="unit_id" class="form-select" required>
                <option value="">-- Pilih Unit --</option>
                @foreach($unit as $row)
                  <option value="{{ $row['id'] }}">{{ $row['nama'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="isi" class="form-label">Isi Aspirasi</label>
              <textarea id="isi" name="isi" rows="4" class="form-control" placeholder="Tulis aspirasi kamu..." required></textarea>
            </div>
            <div class="mb-3">
              <label for="mahasiswa_nim" class="form-label">NIM Mahasiswa</label>
              <input type="text" id="mahasiswa_nim" name="mahasiswa_nim" class="form-control @error('mahasiswa_nim') is-invalid @enderror" value="{{ old('mahasiswa_nim') }}" required>
              @error('mahasiswa_nim')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('aspirasi.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Beranda
            </a>
            <div class="d-flex gap-2">
                <button type="reset" class="btn btn-warning text-white">
                <i class="bi bi-x-circle"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary">
                <i class="bi bi-send-plus"></i> Simpan Aspirasi
                </button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
