<x-layout.guest.app title="" activeMenu="landing" :withError="false">
    <div class="main-container">
        <img src="{{ asset('assets/img/front-pages/hero-bg.png') }}" class="main-bg">

        <x-layout.guest.navbar />

        <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                {{-- hero --}}
                {{-- <section class="mb-5 bg-white rounded-1 hero section" style="min-height: 30vh">
                    <div class="container">
                        <div class="row gy-4">
                            <div class="col-lg-6 d-flex flex-column justify-content-center aos-init aos-animate"
                                data-aos="zoom-out">
                                <h1 style="line-height: 3.8rem;">Persiapkan Masa Depan Anda! Ikuti Tryout Sekarang!</h1>
                                <p>Daftar dan ikuti tryout untuk mempersiapkan diri masuk ke sekolah menengah pertama
                                    terbaik. Tes dengan standar kompetensi terkini dan evaluasi hasil secara cepat.</p>

                            </div>
                            <div class="text-center col-lg-6 hero-img aos-init aos-animate" data-aos="zoom-out"
                                data-aos-delay="200" style="margin: 100px 0;">
                                <img src="{{ asset('assets/img/logo/logosmpmugaygy.png') }}" class="img animat"
                                    alt="" height="380px">
                            </div>
                        </div>
                    </div>
                </section> --}}

                {{-- end hero --}}

                <br>

                <section id="hero-animation" style="min-height: 60vh">
                    <div id="landingHero" class="section-py landing-hero position-relative">
                        <div class="container">
                            <div class="hero-text-box text-center position-relative">
                                <h1 class="text-primary hero-title display-6 fw-extrabold">Airin – Bayar & Kelola
                                    Tagihan Air Jadi Lebih Praktis!</h1>
                                <h2 class="hero-sub-title h6 mb-6">
                                    Automasi pencatatan, pemantauan, dan pembayaran dalam satu aplikasi. Hemat waktu,
                                    tingkatkan layanan!
                                </h2>
                                <div class="landing-hero-btn d-inline-block position-relative">
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Coba Sekarang!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="landing-hero-blank"></div>
                </section>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="footer" style="margin-top: 100px">
                <div class="container mt-4 text-center copyright">
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
