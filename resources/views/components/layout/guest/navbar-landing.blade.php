<nav class="navbar navbar-expand-lg bg-white fonts-color-primary shadow-sm fixed-top fonts-sora" style="height: 4.5rem; z-index: 1000;">
    <div class="container px-4 d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo/Logo-Airin.png') }}" alt="Logo" height="50">
        </a>

        <!-- Centered Menu  -->
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a>
                </li>
            </ul>
        </div>

        <!-- Login Button -->
        <div class="d-flex align-items-center">
            <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-pill px-6 py-2">
                Masuk
            </a>
        </div>

    </div>
</nav>