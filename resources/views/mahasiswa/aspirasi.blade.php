<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Aspirasi</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold"><i class="bi bi-card-checklist"></i> Daftar Aspirasi</h1>
            <p class="text-muted">Lihat aspirasi yang telah dikirimkan</p>
        </div>

        <!-- Tombol Tambah Aspirasi dan kembali -->
        <div class="mb-4 d-flex gap-2">
            <a href="/navbar" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Menu Awal
            </a>

            <a href="{{route('tambah')}}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-plus-circle">Tambah Aspirasi</i> 
    </a> 
        </div>

        <!-- Modal Tambah Aspirasi -->


        <!-- Daftar Aspirasi -->
        <div class="row mt-3">
            @foreach($aspirasis as $aspirasi)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card p-3">
                    
                    <h6>
                        <i class="bi bi-building"></i> {{ $aspirasi['unit_nama'] }}

                        @if ($aspirasi['status'] == 'terkonfirmasi')
                        <span class="badge bg-success ms-2">
                        <i class="bi bi-check-circle-fill"></i> Terkonfirmasi
                        </span>
                        @elseif ($aspirasi['status'] == 'diproses')
                        <span class="badge bg-primary ms-2">
                        <i class="bi bi-clock-fill"></i> Diproses
                        </span>
                        @endif
                    </h6>

                    <p>{{ Str::limit($aspirasi['isi'], 20) }}...</p>
                    <a href="#detail-{{ $aspirasi['id'] }}" class="btn btn-sm btn-outline-info" data-bs-toggle="collapse">
                        <i class="bi bi-eye"></i> Lihat Detail
                    </a>
                    <div id="detail-{{ $aspirasi['id'] }}" class="collapse mt-2">
                    <p>{{ $aspirasi['isi'] }}</p>

            <div class="mt-3 d-flex gap-2">
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAspirasiModal"
            data-id="{{ $aspirasi['id'] }}"
            data-unit="{{ $aspirasi['unit_nama'] }}"
            data-isi="{{ $aspirasi['isi'] }}">
            <i class="bi bi-pencil-square"></i> Edit
            </button>

            <form action="/aspirasi/delete/{{ $aspirasi['id'] }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus aspirasi ini?')">
                <i class="bi bi-trash"></i> Hapus
            </button>
        </form>
    </div>

        <!-- Tombol kembali/menutup detail -->
        <div class="d-flex justify-content-end mt-2">
        <button class="btn btn-light btn-sm" data-bs-toggle="collapse" data-bs-target="#detail-{{ $aspirasi['id'] }}">
            <i class="bi bi-arrow-bar-up"></i> Tutup Detail
        </button>
            </div>
            </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Edit Aspirasi -->
    <div class="modal fade" id="editAspirasiModal" tabindex="-1" aria-labelledby="editAspirasiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Aspirasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editAspirasiForm">
                        <input type="hidden" id="edit-id" name="unit_id">
                        <div class="mb-3">
                            <label for="edit-unit" class="form-label">Pilih Unit</label>
                            <select id="edit-unit" class="form-select" required>
                                <option value="akademik">Akademik</option>
                                <option value="sarana_prasarana">Sarana dan Prasarana</option>
                                <option value="ppks">PPKS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-isi" class="form-label">Isi Aspirasi</label>
                            <textarea name="isi" id="edit-isi" rows="4" class="form-control" placeholder="Edit aspirasi kamu..." required></textarea>
                        </div>
                    </form>
                    <div class="alert alert-warning d-none" id="editAlert">Harap isi semua field!</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" id="submitEditAspirasi"><i class="bi bi-save2"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
            document.getElementById('submitAspirasi').addEventListener('click', function () {
            const unit = document.getElementById('unit').value;
            const isi = document.getElementById('isi').value;
            const alertBox = document.getElementById('tambahAlert');

            if (unit && isi) {
                alertBox.classList.add('d-none');
                console.log('Tambah Aspirasi:', unit, isi);
                const modal = bootstrap.Modal.getInstance(document.getElementById('tambahAspirasiModal'));
                modal.hide();
                document.getElementById('aspirasiForm').reset();
            } else {
                alertBox.classList.remove('d-none');
            }
        });

        document.querySelectorAll('[data-bs-target="#editAspirasiModal"]').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-unit').value = this.dataset.unit;
                document.getElementById('edit-isi').value = this.dataset.isi;
            });
        });

        document.getElementById('submitEditAspirasi').addEventListener('click', function () {
            const id = document.getElementById('edit-id').value;
            const unit = document.getElementById('edit-unit').value;
            const isi = document.getElementById('edit-isi').value;
            const alertBox = document.getElementById('editAlert');

            if (unit && isi) {
                alertBox.classList.add('d-none');
                console.log('Edit Aspirasi:', id, unit, isi);
                const modal = bootstrap.Modal.getInstance(document.getElementById('editAspirasiModal'));
                modal.hide();
            } else {
                alertBox.classList.remove('d-none');
            }
        });
    </script>
</body>
</html>
