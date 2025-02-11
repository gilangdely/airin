<x-layout.guest.app title="" activeMenu="landing" :withError="false">
    <div class="main-container">
        <img src="{{ asset('assets/img/front-pages/hero-bg.png') }}" class="main-bg">

        <x-layout.guest.navbar />

        <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                {{-- hero --}}
                <section class="my-5  py-10 bg-white rounded-1 hero section" style="min-height: 30vh">
                    <div class="container text-center">
                        <div class="text-center">
                            <h1 style="line-height: 3.8rem;" class="text-primary fw-extrabold text-center">Airin – Bayar
                                &
                                Kelola Tagihan Air Jadi Lebih Praktis!
                            </h1>
                            <p class="fs-5 m-10"> Kelola penggunaan air dengan mudah dan efisien! Dengan sistem
                                otomatis, Anda bisa mencatat, memantau, dan membayar tagihan tanpa repot. Pantau
                                konsumsi real-time, dapatkan tagihan transparan, dan lakukan pembayaran cepat.
                            </p>
                            {{-- </div>
                            <div class="text-center col-lg-6 hero-img aos-init aos-animate " data-aos="zoom-out"
                                data-aos-delay="200" style="margin: 100px 0;">
                                <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png') }}" class="img animat"
                                    alt="" height="380px">
                            </div> --}}
                            <div class="landing-hero-btn">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-md">Coba Sekarang!</a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h3 class="text-primary fw-bold my-10">
                            Kenapa memilih airin?
                        </h3>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-start card-title mb-5">
                                            <i
                                                class="text-success bi bi-cash-stack rounded h4 bg-success px-3 py-2 rounded bg-opacity-25 border border-success border-opacity-50 me-4"></i>

                                            <span class="h5 fw-bold">
                                                Tagihan Transparan
                                            </span>
                                        </p>
                                        <p class="card-text text-start">Some quick example text to build on the card
                                            title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-start card-title mb-5">
                                            <i
                                                class="text-danger bi bi-clock rounded h4 bg-danger px-3 py-2 rounded bg-opacity-25 border border-danger border-opacity-50 me-4"></i>
                                            <span class="h5 fw-bold">
                                                Monitoring Real-time
                                            </span>
                                        </p>
                                        <p class="card-text text-start">Some quick example text to build on the card
                                            title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-start card-title mb-5">
                                            <i
                                                class="text-warning bi bi-lightning-charge rounded h4 bg-warning px-3 py-2 rounded bg-opacity-25 border border-warning border-opacity-50 me-4"></i>

                                            <span class="h5 fw-bold">
                                                Layanan Responsif
                                            </span>
                                        </p>
                                        <p class="card-text text-start">Some quick example text to build on the card
                                            title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                </section>

                {{-- end hero --}}

                <br>

                <br>

                <div class="container mt-5">
                    <h2 class="text-center mb-4">Apa Kata Pelanggan Kami?</h2>
                    <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <!-- Testimoni 1 -->
                            <div class="carousel-item px-10 active">
                                <div class="card mx-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-items-center mb-5">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar Pelanggan"
                                                class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Budi Santoso</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya
                                            bisa memantau pemakaian
                                            air dengan mudah."</p>
                                        <div class="d-flex gap-2">
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimoni 2 -->
                            <div class="carousel-item px-10">
                                <div class="card">
                                    <div class="card-body mx-10">
                                        <div class="d-flex align-items-center justify-items-center mb-5">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar Pelanggan"
                                                class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Jhon hoe</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya
                                            bisa memantau pemakaian
                                            air dengan mudah."</p>
                                        <div class="d-flex gap-2">
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimoni 3 -->
                            <div class="carousel-item px-10">
                                <div class="card mx-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-items-center mb-5">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar Pelanggan"
                                                class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Herman kampas kopling</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya
                                            bisa memantau pemakaian
                                            air dengan mudah."</p>
                                        <div class="d-flex gap-2">
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                            <i class="bi bi-star-fill fs-5 text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Navigasi -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-primary rounded" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-primary rounded " aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <br>

                {{-- <section id="hero-animation" style="min-height: 60vh">
                    <div id="landingHero" class="section-py landing-hero position-relative">
                        <div class="container">
                            <div class="hero-text-box text-center position-relative">
                                <h1 class="text-primary hero-title display-6 fw-extrabold">Airin – Bayar & Kelola
                                    Tagihan Air Jadi Lebih Praktis!</h1>
                                <h2 class="hero-sub-title h6 mb-6">
                                    Automasi pencatatan, pemantauan, dan pembayaran dalam satu aplikasi. Hemat waktu,
                                    tingkatkan layanan!
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="landing-hero-blank"></div>
                </section> --}}
                <section class="">
                    <div class="row justify-content-center align-items-center mx-10 px-10">
                        <div class="col">
                            <div class="card ">
                                <div class="card-body my-7">
                                    <div class="card-title text-center mb-5">
                                        <h4 class="text-muted fw-bold">Lite</h4>
                                        <h2 class="text-primary fw-bold">Rp.300.000</h2>
                                        <h5 class="text-muted fw-bold">/bulan</h5>
                                    </div>
                                    <div class="text-start mx-10">
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-check-lg text-success me-2"></i>
                                            <span class="card-text fw-medium">Fitur 1</span>
                                        </div>
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-check-lg text-success me-2"></i>
                                            <span class="card-text fw-medium">Fitur 1</span>
                                        </div>
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-x-lg text-danger me-2"></i>
                                            <span class="card-text fw-medium text-muted">Fitur 1</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="landing-hero-btn  mt-5 mx-auto">
                                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-md">Coba
                                                    Sekarang!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">                        
                            <div class="card  bg-primary">
                                <div class="card-body my-10">
                                    <div class="card-title text-center mb-5">
                                        <h4 class="text-white fw-bold">Medium</h4>
                                        <h2 class="text-white fw-bold">Rp.300.000</h2>
                                        <h5 class="text-white fw-bold">/bulan</h5>
                                    </div>
                                    <div class="text-start mx-10">
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-check-lg text-success me-2"></i>
                                            <span class="card-text text-white fw-medium">Fitur 1</span>
                                        </div>  
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-check-lg text-success me-2"></i>
                                            <span class="card-text text-white fw-medium">Fitur 1</span>
                                        </div>
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-x-lg text-danger me-2"></i>
                                            <span class="card-text text-white fw-medium text-muted">Fitur 1</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="landing-hero-btn  mt-5 mx-auto">
                                                <a href="{{ route('login') }}" class="btn btn-light btn-md text-primary">Coba
                                                    Sekarang!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body my-7">
                                    <div class="card-title text-center mb-5">
                                        <h5 class="text-muted fw-bold">Pro</h5>
                                        <h2 class="text-primary fw-bold">Rp.300.000</h2>
                                        <h5 class="text-muted fw-bold">/bulan</h5>
                                    </div>
                                    <div class="text-start mx-10">
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-check-lg text-success me-2"></i>
                                            <span class="card-text fw-medium">Fitur 1</span>
                                        </div>
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-check-lg text-success me-2"></i>
                                            <span class="card-text fw-medium">Fitur 1</span>
                                        </div>
                                        <div class="flex fs-5 justify-content-center">
                                            <i class="bi bi-x-lg text-danger me-2"></i>
                                            <span class="card-text fw-medium text-muted">Fitur 1</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="landing-hero-btn mt-5 mx-auto">
                                                <a href="{{ route('login') }}" class="btn btn-primary btn-md">Coba
                                                    Sekarang!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <div class="container">
                    <p class="h1 @media (min-width: 768px) { h5 }">Haloo </p>
                </div>
                
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="footer" style="margin-top: 100px">
                <div class="container mt-4 text-center copyright ">
                    <p>
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <a href="" target="_blank" class="footer-link">Team Developer
                            OnCodes</a>
                    </p>
                </div>
            </footer>
            <!-- / Footer -->

            {{-- <div class="content-backdrop fade"></div> --}}
        </div>
        <!-- Content wrapper -->
        <!-- / Layout page -->

        <!-- Overlay -->

    </div>
</x-layout.guest.app>
