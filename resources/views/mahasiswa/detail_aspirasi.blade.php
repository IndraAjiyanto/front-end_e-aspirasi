@extends('layout.app')

@section('title', 'Daftar Aspirasi')

@section('content')
<div class="container">
    <!-- Judul -->
    <div class="text-center mb-4">
        <h3 class="fw-bold"><i class="bi bi-eye"></i> Detail Aspirasi</h3>
    </div>

    <!-- Kartu Detail Aspirasi -->
    <div class="card p-4 shadow-sm mb-4">
        <h5 class="mb-3"><i class="bi bi-building"></i> {{ $unit['nama'] }}</h5>

        <p><strong>Status:</strong>
            @if ($aspirasi['status'] == 'dibalas')
                <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i> Dibalas</span>
            @elseif ($aspirasi['status'] == 'diproses')
                <span class="badge bg-primary"><i class="bi bi-clock-fill"></i> Diproses</span>
            @else
                <span class="badge bg-secondary"><i class="bi bi-question-circle-fill"></i> Belum Ditanggapi</span>
            @endif
        </p>

        <p class="mt-3"><strong>Isi Aspirasi:</strong></p>
        <div class="border p-3 bg-light rounded">
            {{ $aspirasi['isi'] }}
        </div>

        <!-- Tombol Edit dan Hapus -->
        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('aspirasi.edit', $aspirasi['id']) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="{{ route('aspirasi.destroy', $aspirasi['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')">

                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </form>
            <a href="{{ route('aspirasi.index') }}" class="btn btn-outline-secondary btn-sm ms-auto">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Jawaban Aspirasi -->
    <div class="card p-4 shadow-sm">
        <h5 class="mb-3"><i class="bi bi-chat-dots-fill"></i> Daftar Jawaban</h5>

        @if(count($jawaban) > 0)
            @foreach($jawaban as $j)
                <div class="mb-3">
                    <div class="border-start border-4 border-primary ps-3">
                        <p class="mb-0">{{ $j['isi'] }}</p>
                        <small class="text-muted">{{ date('d M Y, H:i', strtotime($j['created_at'])) }}</small>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">Belum ada jawaban.</p>
        @endif
    </div>
</div>
@endsection
