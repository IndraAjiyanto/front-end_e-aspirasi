<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Aspirasi</h5>
            </div>
            <div class="card-body">

                <form id="aspirasiForm" action="{{ route('aspirasi.update', $aspirasi['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="unit" class="form-label">Pilih Unit</label>
                        <select id="unit" name="unit_id" class="form-select" required>
                            <option value="">-- Pilih Unit --</option>
                            @foreach($unit as $row)
                                <option value="{{ $row['id'] }}" {{ $row['id'] == $aspirasi['unit_id'] ? 'selected' : '' }}>
                                    {{ $row['nama'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Aspirasi</label>
                        <textarea id="isi" name="isi" rows="4" class="form-control" required>{{ $aspirasi['isi'] }}</textarea>
                    </div>



                    <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('aspirasi.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    
                    <div class="d-flex gap-2">
                        <button type="reset" class="btn btn-warning text-white">
                            <i class="bi bi-x-circle-fill"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send-check-fill"></i> Simpan Perubahan
                        </button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
