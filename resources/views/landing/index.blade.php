<x-layout.guest.app title="" activeMenu="landing" :withError="false">
    <div class="main-container">
        <img src="{{ asset('assets/img/front-pages/hero-bg.png') }}" class="main-bg img-fluid">

        <x-layout.guest.navbar />

        <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

                <!-- Hero -->
                <section class="my-5 py-5 rounded-1 hero section"
                    style="min-height: 30vh; background: rgba(255, 255, 255, 0.5);">
                    <div class="container text-center">
                        <h2 class="text-primary fw-extrabold" style="line-height: 3.8rem;">Airin – Bayar & Kelola
                            Tagihan Air Jadi Lebih Praktis!</h2>
                        <p class="fs-5 mt-4 mb-4">Kelola air dengan mudah dan efisien menggunakan sistem otomatis kami!
                            Pantau konsumsi air real-time, dapatkan tagihan transparan, dan bayar dengan cepat tanpa
                            ribet. Hemat waktu, kurangi pemborosan, dan nikmati kontrol penuh atas penggunaan air Anda.
                            Mulai hidup lebih praktis dan hemat bersama kami solusi pintar untuk kebutuhan air
                            sehari-hari!</p>
                        <div class="landing-hero-btn">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-md">Coba Sekarang!</a>
                        </div>
                    </div>
                </section>
                <!-- End Hero -->

                <!-- Features -->
                <section style="margin-top: 3rem;">
                    <h3 class="text-primary fw-bold text-center">Kenapa memilih airin?</h3>
                    <div class="row align-items-center" style="rgba(255, 255, 255, 0.5);">
                        <div class="col-md-4 mb-4 feature-card">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <p class="text-start card-title mb-4">
                                        <i
                                            class="text-success bi bi-cash-stack rounded h4 bg-success px-3 py-2 rounded bg-opacity-25 border border-success border-opacity-50 me-4"></i>
                                        <span class="h5 fw-bold">Tagihan Transparan</span>
                                    </p>
                                    <p class="card-text text-start">Sistem kami mencatat penggunaan air secara akurat,
                                        sehingga Anda menerima tagihan yang transparan dan rinci sesuai pemakaian.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 feature-card">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <p class="text-start card-title mb-4">
                                        <i
                                            class="text-danger bi bi-clock rounded h4 bg-danger px-3 py-2 rounded bg-opacity-25 border border-danger border-opacity-50 me-4"></i>
                                        <span class="h5 fw-bold">Monitoring Real-time</span>
                                    </p>
                                    <p class="card-text text-start">Pantau penggunaan air secara real-time dan terima
                                        notifikasi instan untuk setiap perubahan, memberi Anda kendali penuh atas
                                        konsumsi
                                        air.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 feature-card">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <p class="text-start card-title mb-4">
                                        <i
                                            class="text-warning bi bi-lightning-charge rounded h4 bg-warning px-3 py-2 rounded bg-opacity-25 border border-warning border-opacity-50 me-4"></i>
                                        <span class="h5 fw-bold">Layanan Responsif</span>
                                    </p>
                                    <p class="card-text text-start">Kami menyediakan layanan cepat dan responsif,
                                        memastikan
                                        setiap kebutuhan pelanggan ditangani dengan segera dan efektif.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Testimonials -->
                <section class="mt-8">
                    <h3 class="text-primary fw-bold my-5 text-center" data-aos="fade-up" data-aos-duration="1500">Apa
                        Kata Pelanggan Kami?</h3>
                    <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
                        <div class="carousel-inner" data-aos="fade-up" data-aos-duration="1500">

                            <!-- Testimoni 1 -->
                            <div class="carousel-item active">
                                <div class="card mx-10 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar Pelanggan"
                                                class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Budi Santoso</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya
                                            bisa memantau pemakaian air dengan mudah."</p>
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
                            <div class="carousel-item">
                                <div class="card mx-10 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar Pelanggan"
                                                class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Jhon hoe</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya
                                            bisa memantau pemakaian air dengan mudah."</p>
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
                            <div class="carousel-item">
                                <div class="card mx-10 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar Pelanggan"
                                                class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Herman kampas kopling</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya
                                            bisa memantau pemakaian air dengan mudah."</p>
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
                    </div>
                </section>

                <!-- Contact -->
                <section id="contact-us" class="container mt-5">
                    <h3 class="text-primary fw-bold my-5 text-center" data-aos="fade-up" data-aos-duration="1500">
                        Hubungi Kami</h3>
                    <div class="row" data-aos="fade-up" data-aos-duration="1500">
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body text-left">
                                    <span class="border p-2 px-3 rounded-3 d-inline-block text-primary"
                                        style="font-size: 1.5rem;">
                                        <i class="bi bi-chat-square-text"></i>
                                    </span>
                                    <h5 class="card-title mt-3">Chat untuk info</h5>
                                    <p class="card-text">Ada pertanyaan tanyakan saja pada kami.</p>
                                    <a href="https://wa.me/6288806946074" class="btn btn-primary">Mulai bertanya</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-80">
                                <div class="card-body text-left">
                                    <span class="border p-2 px-3 rounded-3 d-inline-block text-primary"
                                        style="font-size: 1.5rem;">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    <h5 class="card-title mt-3">Datang dan temui kami</h5>
                                    <p class="card-text">Kampus kami.</p>
                                    <a href="https://maps.app.goo.gl/nsYeoAPbb31FFuQ48" class="btn btn-primary">Google
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Contact -->

                <!-- Our Team -->
                <section id="our-team" class="container mt-5" data-aos="fade-up" data-aos-duration="1200">
                    <h3 class="text-primary fw-bold my-5 text-center">Tim Kami</h3>
                    <div class="row row-cols-1 row-cols-md-5 g-4 justify-content-center">
                        <!-- Card 1 -->
                        <div class="col">
                            <div class="card h-100 shadow-sm position-relative team-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Firman.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: top"></img>
                                    <h5 class="card-title mt-5 pt-5">Firman Zamzami</h5>
                                    <p class="card-text text-muted">Team Leader</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/GwFirman" class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://gwfirman.my.id/" class="text-decoration-none social-icon"><i
                                                class="bi bi-globe fs-5 text-globe"></i></a>
                                        <a href="https://www.instagram.com/gw_firman/?hl=id" class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col">
                            <div class="card h-100 shadow-sm position-relative team-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Gilang.png"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; background-color: rgba(36,91,243,255); object-fit: cover;"></img>
                                    <h5 class="card-title mt-5 pt-5">Gilang Dely</h5>
                                    <p class="card-text text-muted">Creative Director</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/gilangdely" class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://wa.me/6282133781736" class="text-decoration-none social-icon"><i
                                                class="bi bi-whatsapp fs-5 text-whatsapp"></i></a>
                                        <a href="https://www.instagram.com/gilang.dm/?hl=id" class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col">
                            <div class="card h-100 shadow-sm position-relative team-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Fauzan.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: 0px -20 px;"></img>
                                    <h5 class="card-title mt-5 pt-5">Akhmad Fauzan</h5>
                                    <p class="card-text text-muted">Software Engineer</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/ozan-fn" class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://ozan.my.id" class="text-decoration-none social-icon"><i
                                                class="bi bi-globe fs-5 text-globe"></i></a>
                                        <a href="https://www.instagram.com/ozan.fn/?hl=id" class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="col">
                            <div class="card h-100 shadow-sm position-relative team-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Dodo.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: 20px -10 px;"></img>
                                    <h5 class="card-title mt-5 pt-5">Afridho Zaki</h5>
                                    <p class="card-text text-muted">Software Engineer</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/dhodo999" class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://www.instagram.com/dhoodo.69/?hl=id" class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="col">
                            <div class="card h-100 shadow-sm position-relative team-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Iyan.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: 0px 0px;"></img>
                                    <h5 class="card-title mt-5 pt-5">Muhammad Agus</h5>
                                    <p class="card-text text-muted">Designer Ui/Ux</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/Astha4Study" class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://www.instagram.com/rheiyn._/?hl=id" class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Our Team -->

                <!-- Footer -->
                <footer class="footer mt-5">
                    <div class="container text-center">
                        <p>
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <a href="" target="_blank" class="footer-link">Team Developer OnCodes</a>
                        </p>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
            <!-- End Content wrapper -->
        </div>
    </div>
    <!-- End Content -->
</x-layout.guest.app>
