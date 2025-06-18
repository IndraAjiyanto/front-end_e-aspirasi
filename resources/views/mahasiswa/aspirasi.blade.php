@extends('layout.app')

@section('title', 'Daftar Aspirasi')

@section('content')
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold"><i class="bi bi-card-checklist"></i> Daftar Aspirasi</h1>
            <p class="text-muted">Lihat aspirasi yang telah dikirimkan</p>
        </div>

        <!-- Tombol Tambah Aspirasi dan kembali -->
        <div class="mb-4 d-flex gap-2">
            <a href="{{ route('dashboardmahasiswa') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Menu Awal
            </a>

            <a href="{{route('aspirasi.create')}}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-plus-circle">Tambah Aspirasi</i> 
    </a> 
        </div>

        <!-- Modal Tambah Aspirasi -->
        <!-- Daftar Aspirasi -->
<div class="row mt-3">
    @forelse($aspirasis as $aspirasi)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card p-3">
                <h6>
                    <i class="bi bi-building"></i> {{ $aspirasi['unit_nama'] }}

                    @if ($aspirasi['status'] == 'dibalas')
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
                <a href="{{ route('aspirasi.show', $aspirasi['id']) }}" class="btn btn-sm btn-outline-info">
                    <i class="bi bi-eye"></i> Lihat Detail
                </a>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-circle"></i> Belum ada aspirasi yang tersedia.
            </div>
        </div>
    @endforelse
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
@endsection
