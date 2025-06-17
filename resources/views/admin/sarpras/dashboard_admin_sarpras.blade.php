@extends('layout.landing_sarpras')

@section('title', 'Beranda Aspirasi')

@section('content')

  <!-- Penjelasan tentang Aspirasi -->
  <div class="aspirasi-section">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <!-- Kiri: Judul dan Deskripsi -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="aspirasi-overlay">
          <h2 class="aspirasi-title mb-3"><i class="bi bi-info-circle-fill text-primary"></i> Apa Itu Aspirasi?</h2>
          <p class="aspirasi-desc">
            Aspirasi adalah bentuk penyampaian ide, kritik, maupun saran dari mahasiswa atau civitas akademika terhadap berbagai aspek kampus.
            <br><br>
            Melalui <strong>E-Aspirasi</strong>, kamu bisa menyuarakan pendapat dengan mudah, terbuka, dan terstruktur.
          </p>
        </div>
      </div>

      <!-- Kanan: Manfaat -->
      <div class="col-lg-5">
        <div class="aspirasi-overlay">
          <h5 class="mb-3"><i class="bi bi-star-fill text-warning"></i> Manfaat E-Aspirasi</h5>
          <ul class="aspirasi-list list-unstyled mb-0">
            <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Menampung suara mahasiswa secara sistematis</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Meningkatkan kualitas layanan kampus</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Mendorong partisipasi aktif mahasiswa</li>
            <li><i class="bi bi-check-circle-fill"></i> Memberi solusi nyata atas masukan</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

  

