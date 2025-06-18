<nav class="navbar navbar-expand-lg navbar-dark">
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

        <li class="nav-item">
          <a class="nav-link {{ Request::is('unit/ppks') ? 'active' : '' }}" href="{{ route('unit.ppks') }}">
            <i class="bi bi-chat-left-text-fill"></i> Aspirasi PPKS
          </a>
        </li>

        <li class="nav-item">
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-logout" onclick="return confirm('Yakin ingin logout?')">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>
        </li>
      </ul>
    </div>
  </div>
</nav>
