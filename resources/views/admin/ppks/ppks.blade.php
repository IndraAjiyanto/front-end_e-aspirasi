
@extends('layout.app')

@section('title', 'Daftar Aspirasi')

@section('content')
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold text-primary">
          <i class="bi bi-shield-lock me-2"></i> Laporan Unit PPKS
        </h2>
        <p class="text-muted">Berikut adalah daftar laporan yang masuk ke unit PPKS.</p>
      </div>
    </div>

    <div class="mb-4 d-flex gap-2">
    <a href="/dashboard" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali ke Menu Awal
          </a>
          </div>
          
    @forelse($ppks as $item)
      <div class="card mb-3 shadow-sm border-0 position-relative">
      <div class="card-body">
        {{-- Simbol Status di pojok kanan atas --}}
        @if($item['status'] == 'dibalas')
          <i class="bi bi-check-circle-fill text-success fs-4 position-absolute top-0 end-0 m-3" title="Terkonfirmasi"></i>
        @elseif($item['status'] == 'diproses')
          <i class="bi bi-hourglass-split text-warning fs-4 position-absolute top-0 end-0 m-3" title="Sedang Diproses"></i>
        @endif
        <p class="card-text text-secondary">{{ Str::limit($item['isi'], 100) }}</p>
        <div class="mt-3">
          <a href="{{ route('unit.ppks.lihat', $item['id']) }}" class="btn btn-outline-primary">
            <i class="bi bi-eye-fill me-1"></i> Lihat
          </a>
        </div>
      </div>
    </div>
    @empty
      <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Belum ada laporan yang masuk untuk unit ini.
      </div>
    @endforelse
  </div>

  @endsection