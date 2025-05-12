<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Aspirasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<!-- <div class="modal fade" id="tambahAspirasiModal" tabindex="-1" aria-labelledby="tambahAspirasiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahAspirasiModalLabel">Tambah Aspirasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body"> -->
                        <form id="aspirasiForm" action="{{route('aspirasi.update', $aspirasi['id'])}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="unit" class="form-label">Pilih Unit</label>
                                <select id="unit" name="unit_id" class="form-select" required>
                                    <option value="">-- Pilih Unit --</option>
                                    @foreach($unit as $row)
                                    <option value="{{$row['id']}}" {{ $row['id'] == $aspirasi['unit_id'] ? 'selected' : '' }}>{{$row['nama']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="isi" class="form-label">Isi Aspirasi</label>
                                <textarea id="isi" name="isi"  rows="4" class="form-control"  required>{{$aspirasi['isi']}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="isi" class="form-label">NIM mahasiswa</label>
                                <input type="text" id="mahasiswa_nim" value="{{$aspirasi['mahasiswa_nim']}}" name="mahasiswa_nim" rows="4" class="form-control" required>
                            </div>

                            <button class="btn btn-primary" id="submitAspirasi" type="submit"><i class="bi bi-send-plus">Simpan</i></button>
                        </form>
                        <!-- <div class="alert alert-warning d-none" id="tambahAlert">Harap isi semua field!</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" id="submitAspirasi"><i class="bi bi-send-plus"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div> -->
</body>
</html>