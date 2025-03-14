<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
    style="height: 5.5rem; border-color: rgba(255,255,255,.68); background: rgba(255,255,255,.38); position: sticky; width: 100%; z-index: 100; top: 0;">
    
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        
        <!-- Logo -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="40px">
                <span class="mb-0 border-0 shadow-none form-control ps-1 ps-sm-2 fw-medium">
                    <span style="font-size: 1.3rem;" class="fw-bold">{{ config('app.name') }}</span>
                    <br>
                    <small class="text-primary d-none d-sm-block">{{ config('app.subname') }}</small>
                </span>
            </div>
        </div>
        <!-- End Logo -->
        
        <!-- Navbar Menus -->
        <ul class="flex-row navbar-nav align-items-center ms-auto">
            <li class="nav-item me-4 d-none d-md-flex d-lg-flex">
                <a class="nav-link fw-medium collapsed" href="{{ url('/') }}">Beranda</a>
            </li>
            <li class="nav-item me-4 d-none d-md-flex d-lg-flex">
                <a class="nav-link fw-medium collapsed" href="#FAQ">Tentang</a>
            </li>
            <li class="nav-item me-4 d-none d-md-flex d-lg-flex">
                <a class="nav-link fw-medium collapsed" href="#our-team">Profile</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="btn btn-primary" style="border-radius: 50px;">
                    <span class="tf-icons bx bx-log-in-circle scaleX-n1-rtl me-md-1"></span>
                    <span class="d-none d-md-block">Login</span>
                </a>
            </li>
        </ul>
        <!-- End Navbar Menus -->
        
    </div>
</nav>
