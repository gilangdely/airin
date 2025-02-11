<x-layout.guest.app title="" activeMenu="landing" :withError="false">
    <div class="main-container">
        <img src="{{ asset('assets/img/front-pages/hero-bg.png') }}" class="main-bg img-fluid">

        <x-layout.guest.navbar />

        <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

                <!-- Hero -->
                <section class="my-5 py-5 bg-white rounded-1 hero section" style="min-height: 30vh">
                    <div class="container text-center">
                        <h2 class="text-primary fw-extrabold" style="line-height: 3.8rem;">Airin – Bayar & Kelola Tagihan Air Jadi Lebih Praktis!</h2>
                        <p class="fs-5 mt-4 mb-4">Kelola air dengan mudah dan efisien menggunakan sistem otomatis kami! Pantau konsumsi air real-time, dapatkan tagihan transparan, dan bayar dengan cepat tanpa ribet. Hemat waktu, kurangi pemborosan, dan nikmati kontrol penuh atas penggunaan air Anda. Mulai hidup lebih praktis dan hemat bersama kami solusi pintar untuk kebutuhan air sehari-hari!</p>
                        <div class="landing-hero-btn">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-md">Coba Sekarang!</a>
                        </div>
                    </div>
                </section>
                <!-- End Hero -->

                <!-- Features -->
                <h3 class="text-primary fw-bold text-center">Kenapa memilih airin?</h3>
                <section class="row align-items-center">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <p class="text-start card-title mb-4">
                                    <i class="text-success bi bi-cash-stack rounded h4 bg-success px-3 py-2 rounded bg-opacity-25 border border-success border-opacity-50 me-4"></i>
                                    <span class="h5 fw-bold">Tagihan Transparan</span>
                                </p>
                                <p class="card-text text-start">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <p class="text-start card-title mb-4">
                                    <i class="text-danger bi bi-clock rounded h4 bg-danger px-3 py-2 rounded bg-opacity-25 border border-danger border-opacity-50 me-4"></i>
                                    <span class="h5 fw-bold">Monitoring Real-time</span>
                                </p>
                                <p class="card-text text-start">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <p class="text-start card-title mb-4">
                                    <i class="text-warning bi bi-lightning-charge rounded h4 bg-warning px-3 py-2 rounded bg-opacity-25 border border-warning border-opacity-50 me-4"></i>
                                    <span class="h5 fw-bold">Layanan Responsif</span>
                                </p>
                                <p class="card-text text-start">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Testimonials -->
                <section class="mt-12" data-aos="fade-up">
                    <h3 class="text-primary fw-bold my-5 text-center" data-aos="fade-up">Apa Kata Pelanggan Kami?</h3>
                    <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
                        <div class="carousel-inner" data-aos="fade-up">

                            <!-- Testimoni 1 -->
                            <div class="carousel-item active">
                                <div class="card mx-10 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar Pelanggan" class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Budi Santoso</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya bisa memantau pemakaian air dengan mudah."</p>
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
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar Pelanggan" class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Jhon hoe</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya bisa memantau pemakaian air dengan mudah."</p>
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
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar Pelanggan" class="rounded-circle me-3" width="50" height="50">
                                            <div>
                                                <p class="mb-0 fw-bold">Herman kampas kopling</p>
                                                <p class="mb-0 text-muted">Pamsimas desa Konoha</p>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic card-text text-start">"Sangat membantu! Sekarang saya bisa memantau pemakaian air dengan mudah."</p>
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
                <section id="contact-us" class="container mt-12" data-aos="fade-up">
                    <h3 class="text-primary fw-bold my-5 text-center" data-aos="fade-up">Hubungi Kami</h3>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Alamat</h5>
                                    <p class="card-text">Jl. Lorem No.123, Purwokerto, Indonesia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Kontak</h5>
                                    <p class="card-text">Email: airin@example.com</p>
                                    <p class="card-text">Telepon: +62 123 4567 890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Kirim Pesan</h5>
                                    <form>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Pesan</label>
                                            <textarea class="form-control" id="message" rows="4" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Contact -->

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
    </x-layout.guest.app>
