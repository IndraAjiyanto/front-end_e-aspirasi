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
    .avatar-icon {
      width: 40px;
      height: 40px;
      background-color: #2575fc;
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
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

        <form action="{{route('jawaban.store')}}" method="POST">
          @csrf
          <input type="text" name="aspirasi_id" value="{{$aspirasi['id']}}">
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

    @if(count($jawaban) > 0)
  <div class="mb-4">
    <h5 class="text-primary fw-bold mb-3">
      <i class="bi bi-chat-dots-fill me-2"></i> Daftar Balasan
    </h5>

    @foreach ($jawaban as $item)
      <div class="card jawaban-card mb-3 shadow-sm border-0">
        <div class="card-body d-flex">
          <div class="me-3">
            <div class="avatar-icon">
              <i class="bi bi-person-fill"></i>
            </div>
          </div>
          <div class="flex-grow-1">
            @if (isset($editId) && $editId == $item['id'])
              <form action="{{ route('jawaban.update', $item['id']) }}" method="POST" class="mb-2">
                @csrf
                @method('PUT')
                <input type="hidden" name="aspirasi_id" value="{{ $aspirasi['id'] }}">
                <textarea name="isi" class="form-control mb-2" rows="3" required>{{ $item['isi'] }}</textarea>
                <div class="text-end">
                  <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                  <a href="{{ url()->current() }}" class="btn btn-sm btn-secondary">Batal</a>
                </div>
              </form>
            @else
              <p class="mb-1 text-dark">{{ $item['isi'] }}</p>
              <small class="text-muted">
                <i class="bi bi-clock me-1"></i>
                {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d M Y H:i') }}
              </small>
            @endif
          </div>
          <div class="ms-3 text-end">
            <a href="{{ url()->current() }}?edit={{ $item['id'] }}" class="btn btn-sm btn-outline-primary me-1">
              <i class="bi bi-pencil"></i> Ubah
            </a>
            <form action="{{ route('jawaban.destroy', $item['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jawaban ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash"></i> Hapus
              </button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif

    <a href="{{route('unit.ppks')}}" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left-circle me-1"></i> Kembali
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
