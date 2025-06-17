<!-- <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">
      <i class="bi bi-lightning-fill"></i> E-Aspirasi
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-3 mt-3 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
            <i class="bi bi-house-door-fill"></i> Home
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('unit/*') ? 'active' : '' }}" href="#" id="aspirasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-chat-left-text-fill"></i> Aspirasi
          </a>
          <ul class="dropdown-menu" aria-labelledby="aspirasiDropdown">
            <li><a class="dropdown-item" href="{{ route('unit.ppks') }}"><i class="bi bi-people-fill me-2"></i>PPKS</a></li>
            <li><a class="dropdown-item" href="{{ route('unit.akademik') }}"><i class="bi bi-mortarboard-fill me-2"></i>Akademik</a></li>
            <li><a class="dropdown-item" href="{{ route('unit.sarpras') }}"><i class="bi bi-building me-2"></i>Sarana & Prasarana</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="btn btn-logout" href="/login">
            <i class="bi bi-box-arrow-right"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->
