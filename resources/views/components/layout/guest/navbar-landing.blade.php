<style>
    .navbar-toggler {
        width: 42px;
        height: 42px;
        transition: transform 0.3s ease;
    }

    .navbar-toggler.collapsed .navbar-toggler-icon {
        transition: all 0.3s ease;
    }

    .navbar-toggler:not(.collapsed) .navbar-toggler-icon {
        background-image: none;
        position: relative;
    }

    .navbar-toggler:not(.collapsed) .navbar-toggler-icon::before,
    .navbar-toggler:not(.collapsed) .navbar-toggler-icon::after {
        content: "";
        position: absolute;
        width: 24px;
        height: 2px;
        background-color: #333;
        left: 50%;
        top: 50%;
        transform-origin: center;
    }

    .navbar-toggler:not(.collapsed) .navbar-toggler-icon::before {
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .navbar-toggler:not(.collapsed) .navbar-toggler-icon::after {
        transform: translate(-50%, -50%) rotate(-45deg);
    }

    .custom-dropdown-mobile {
        position: absolute;
        right: 1rem;
        top: 4.5rem;
        width: 250px;
        background: white;
        border-radius: 1.2rem;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        padding: 1.5rem 1.5rem;
        z-index: 999;
    }

    @media (min-width: 992px) {
        .custom-dropdown-mobile {
            position: static;
            box-shadow: none;
            padding: 0;
            background: transparent;
            width: auto;
        }
    }
</style>

<nav class="navbar navbar-expand-lg bg-white fonts-color-primary shadow-sm fixed-top fonts-sora"
    style="height: 4.5rem; z-index: 1000;" data-aos="fade-down" data-aos-duration="800">
    <div class="container px-4 d-flex align-items-center justify-content-between">

        <!-- Logo adaptif -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo/Logo-Airin.png') }}" alt="Logo"
                style="height: 42px;" class="img-fluid d-none d-lg-block">
            <img src="{{ asset('assets/img/logo/Logo-Airin.png') }}" alt="Logo"
                style="height: 34px;" class="img-fluid d-block d-lg-none">
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler collapsed border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Desktop menu -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
            <ul class="navbar-nav gap-4 d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tentang-kami') }}">Tentang Kami</a>
                </li>
            </ul>
        </div>

        <!-- Login Button (desktop only) -->
        <div class="d-none d-lg-flex align-items-center">
            <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-pill px-6 py-2">
                Masuk
            </a>
        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div class="collapse custom-dropdown-mobile d-lg-none" id="navbarContent"
        data-aos="fade-down" data-aos-duration="600" data-aos-delay="100">
        <ul class="navbar-nav text-end">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/tentang-kami') }}">Tentang Kami</a>
            </li>
            <li class="nav-item mt-3">
                <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-pill w-100">
                    Masuk
                </a>
            </li>
        </ul>
    </div>
</nav>