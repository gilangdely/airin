<x-layout.guest.app title="" activeMenu="landing" :withError="false">
    <div class="main-container">
        <img src="{{ asset('assets/img/front-pages/hero-bg.png') }}" class="main-bg img-fluid">

        <x-layout.guest.navbar />

        <!-- Content wrapper -->
        <div class="content-wrapper" style="padding-top: 6rem;">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

                <!-- Hero -->
                <section class="px-4 py-5 my-5 text-center">
                    <div class="container">
                        <h1 class="fw-extrabold title" style="color: #161b2c">
                            Revolusi Baru <br>
                            <span class="text-gradient">Pembayaran dan Pengelolaan Air</span>
                        </h1>
                        <div class="col-lg-6 mx-auto mt-7">
                            <p class="lead mb-4">
                                Nikmati pengalaman mudah, aman, dan instan dalam mengelola air. Pantau,
                                bayar, dan kendalikan penggunaan air dengan efisiensi maksimal serta integrasi layanan
                                pintar untuk kemudahan sehari-hari.
                            </p>
                        </div>
                        <div class="justify-content-center mt-11">
                            <a href="{{ route('login') }}" class="btn-gradient btn-lg px-6">Mulai Sekarang</a>
                        </div>
                    </div>
                </section>
                <!-- End Hero -->

                <!-- Features -->
                <section style="margin-top: 4rem;">
                    <div class="row align-items-center">
                        <!-- Card 1 - Tagihan Transparan -->
                        <div class="col-md-4 mb-4 feature-card">
                            <div class="card h-100 shadow-sm" style="background: rgba(255, 255, 255, 0.75);">
                                <div class="card-body">
                                    <p class="text-start card-title mb-4">
                                        <i class="bi bi-wallet2 rounded h4 text-white px-3 py-2 me-4"
                                            style="background: linear-gradient(45deg, #28a745, #81c784);"></i>
                                        <span class="h5 fw-bold">Tagihan Transparan</span>
                                    </p>
                                    <p class="card-text text-start">Sistem kami mencatat penggunaan air secara akurat,
                                        sehingga Anda menerima tagihan yang transparan dan rinci sesuai pemakaian.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 - Monitoring Real-time -->
                        <div class="col-md-4 mb-4 feature-card">
                            <div class="card h-100 shadow-sm" style="background: rgba(255, 255, 255, 0.75);">
                                <div class="card-body">
                                    <p class="text-start card-title mb-4">
                                        <i class="bi bi-clock rounded h4 text-white px-3 py-2 me-4"
                                            style="background: linear-gradient(45deg, #ff6f61, #f8d7da);"></i>
                                        <span class="h5 fw-bold">Monitoring Real-time</span>
                                    </p>
                                    <p class="card-text text-start">Pantau penggunaan air secara real-time dan terima
                                        notifikasi instan untuk setiap perubahan, memberi Anda kendali penuh atas
                                        konsumsi air.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 - Layanan Responsif -->
                        <div class="col-md-4 mb-4 feature-card">
                            <div class="card h-100 shadow-sm" style="background: rgba(255, 255, 255, 0.75);">
                                <div class="card-body">
                                    <p class="text-start card-title mb-4">
                                        <i class="bi bi-lightning-charge rounded h4 text-white px-3 py-2 me-4"
                                            style="background: linear-gradient(45deg, #ffc107, #ff9800);"></i>
                                        <span class="h5 fw-bold">Layanan Responsif</span>
                                    </p>
                                    <p class="card-text text-start">Kami menyediakan layanan cepat dan responsif,
                                        memastikan setiap kebutuhan pelanggan ditangani dengan segera dan efektif.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Features -->

                <!-- Testimonials -->
                <section class="mt-8">
                    <h3 class="testimonial-title text-center fw-bold my-5" data-aos="fade-up" data-aos-duration="1500">
                        Apa Kata Pelanggan Kami?
                    </h3>
                    <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="8000">
                        <div class="carousel-inner" data-aos="fade-up" data-aos-duration="1500">
                            <!-- Testimoni 1 -->
                            <div class="carousel-item active">
                                <div class="card mx-10 shadow-sm rounded-3"
                                    style="min-height: 220px; display: flex; flex-direction: column; justify-content: center; background: rgba(255, 255, 255, 0.85);">
                                    <div
                                        class="card-body d-flex flex-column justify-content-center align-items-center p-5">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar Pelanggan"
                                            class="rounded-circle me-3 mb-4" width="70" height="70">
                                        <p class="fs-5 fst-italic card-text text-center"
                                            style="color: #333; font-weight: 500; line-height: 1.6;">
                                            "Sangat puas dengan aplikasi ini! Memudahkan saya dalam memantau dan
                                            mengelola pemakaian air sehari-hari."
                                        </p>
                                        <div class="mt-4 d-flex align-items-center justify-content-center w-100">
                                            <div class="d-flex align-items-center w-100"
                                                style="max-width: 350px; width: 100%; text-align: center;">
                                                <hr class="flex-grow-1"
                                                    style="border: 1px solid #8a2be2; margin: 0 10px;">
                                                <p class="lh-sm mb-0 text-nowrap testimoni-text-gradient"
                                                    style="font-weight: 600; font-size: 1.1rem;">Mas Salah</p>
                                                <hr class="flex-grow-1"
                                                    style="border: 1px solid #8a2be2; margin: 0 10px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimoni 2 -->
                            <div class="carousel-item">
                                <div class="card mx-10 shadow-sm rounded-3"
                                    style="min-height: 220px; display: flex; flex-direction: column; justify-content: center; background: rgba(255, 255, 255, 0.85);">
                                    <div
                                        class="card-body d-flex flex-column justify-content-center align-items-center p-5">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar Pelanggan"
                                            class="rounded-circle me-3 mb-4" width="70" height="70">
                                        <p class="fs-5 fst-italic card-text text-center"
                                            style="color: #333; font-weight: 500; line-height: 1.6;">
                                            "Dengan website ini, saya dapat mengontrol penggunaan air secara real-time,
                                            sehingga lebih hemat dan efisien."
                                        </p>
                                        <div class="mt-4 d-flex align-items-center justify-content-center w-100">
                                            <div class="d-flex align-items-center w-100"
                                                style="max-width: 350px; width: 100%; text-align: center;">
                                                <hr class="flex-grow-1"
                                                    style="border: 1px solid #8a2be2; margin: 0 10px;">
                                                <p class="lh-sm mb-0 text-nowrap testimoni-text-gradient"
                                                    style="font-weight: 600; font-size: 1.1rem;">Dika Kopling</p>
                                                <hr class="flex-grow-1"
                                                    style="border: 1px solid #8a2be2; margin: 0 10px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimoni 3 -->
                            <div class="carousel-item">
                                <div class="card mx-10 shadow-sm rounded-3"
                                    style="min-height: 220px; display: flex; flex-direction: column; justify-content: center; background: rgba(255, 255, 255, 0.85);">
                                    <div
                                        class="card-body d-flex flex-column justify-content-center align-items-center p-5">
                                        <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar Pelanggan"
                                            class="rounded-circle me-3 mb-4" width="70" height="70">
                                        <p class="fs-5 fst-italic card-text text-center"
                                            style="color: #333; font-weight: 500; line-height: 1.6;">
                                            "Website ini sangat membantu! Sekarang saya bisa memantau pemakaian air
                                            dengan mudah dan efisien."
                                        </p>
                                        <div class="mt-4 d-flex align-items-center justify-content-center w-100">
                                            <div class="d-flex align-items-center w-100"
                                                style="max-width: 350px; width: 100%; text-align: center;">
                                                <hr class="flex-grow-1"
                                                    style="border: 1px solid #8a2be2; margin: 0 10px;">
                                                <p class="lh-sm mb-0 text-nowrap testimoni-text-gradient"
                                                    style="font-weight: 600; font-size: 1.1rem;">Chen Dok</p>
                                                <hr class="flex-grow-1"
                                                    style="border: 1px solid #8a2be2; margin: 0 10px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button next and previous -->
                        <button class="carousel-control-prev position-absolute top-50 start-0 translate-middle-y"
                            type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next position-absolute top-50 end-0 translate-middle-y"
                            type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <!-- End Button next and previous -->

                    </div>
                </section>
                <!-- End Testimonials -->

                <!-- FAQ -->
                <section id="FAQ" class="container mt-8" data-aos="fade-up" data-aos-duration="1000">
                    <h3 class="testimonial-title text-center fw-bold my-5">Ingin tahu lebih?</h3>
                    <div class="row px-4 my-5">
                        <!-- Bagian Kiri -->
                        <div class="col-md-6">
                            <p class="mb-4">
                                Platform inovatif yang dirancang untuk membantu Anda memantau dan mengelola penggunaan air secara efisien. Dengan teknologi terkini, kami memberikan solusi cerdas untuk menghemat air, mengurangi pemborosan, dan meningkatkan kesadaran akan pentingnya konservasi air.
                            </p>
                        </div>
                        <!-- Bagian Kanan -->
                        <div class="col-md-6">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Apa itu Airin?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body mt-3">
                                            <p>
                                                <strong>Airin</strong> adalah sebuah platform inovatif yang dirancang
                                                untuk membantu pengguna memantau dan mengelola penggunaan air secara
                                                efisien. Dengan teknologi terkini, Airin memberikan solusi cerdas untuk
                                                menghemat air, mengurangi pemborosan, dan meningkatkan kesadaran akan
                                                pentingnya konservasi air.
                                            </p>
                                            <p>
                                                Platform ini dilengkapi dengan fitur-fitur seperti pemantauan real-time,
                                                analisis penggunaan air, dan notifikasi untuk membantu pengguna
                                                mengoptimalkan konsumsi air sehari-hari.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Kenapa membangun website ini?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body mt-3">
                                            <p>
                                                Website ini dibangun dengan tujuan untuk memberikan solusi nyata dalam
                                                mengelola dan memantau penggunaan air. Kami percaya bahwa dengan
                                                teknologi yang tepat, kita dapat membantu masyarakat menghemat air dan
                                                berkontribusi pada pelestarian lingkungan.
                                            </p>
                                            <p>
                                                Selain itu, website ini juga menjadi wadah bagi tim OnCodes untuk
                                                menunjukkan kemampuan dan kreativitas dalam mengembangkan produk
                                                teknologi yang bermanfaat.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            Apa keunggulan Airin?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body mt-2">
                                            <p>
                                                <strong>Keunggulan Airin</strong> meliputi:
                                            </p>
                                            <ul>
                                                <li><strong>Pemantauan Real-Time:</strong> Pantau penggunaan air secara
                                                    langsung dan akurat.</li>
                                                <li><strong>Analisis Cerdas:</strong> Dapatkan laporan dan rekomendasi
                                                    untuk mengoptimalkan penggunaan air.</li>
                                                <li><strong>Notifikasi:</strong> Dapatkan pemberitahuan jika terjadi
                                                    kebocoran atau penggunaan berlebihan.</li>
                                                <li><strong>Ramah Pengguna:</strong> Antarmuka yang sederhana dan mudah
                                                    digunakan.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Bagaimana cara menggunakan Airin?
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body mt-2">
                                            <p>
                                                Menggunakan Airin sangat mudah! Berikut langkah-langkahnya:
                                            </p>
                                            <ol>
                                                <li><strong>Daftar Akun:</strong> Buat akun baru di platform Airin.</li>
                                                <li><strong>Hubungkan Perangkat:</strong> Sambungkan perangkat pemantau
                                                    air ke akun Anda.</li>
                                                <li><strong>Pantau Penggunaan:</strong> Lihat data penggunaan air secara
                                                    real-time di dashboard.</li>
                                                <li><strong>Terima Rekomendasi:</strong> Ikuti rekomendasi yang
                                                    diberikan untuk menghemat air.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Butuh kontak yang bisa di hubungi, atau ingin datang?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body d-flex gap-2 mt-2">
                                            <a href="https://wa.me/6288806946074" target="_blank"
                                                class="btn-acordion-wa btn-sm">
                                                Whatsapp <i class="bi bi-whatsapp"></i>
                                            </a>
                                            <a href="https://maps.app.goo.gl/nsYeoAPbb31FFuQ48" target="_blank"
                                                class="btn-acordion-gm btn-sm">
                                                Google Maps <i class="bi bi-map-marker-alt"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End FAQ -->

                <!-- Our Team -->
                <section id="our-team" class="container mt-8" data-aos="fade-up" data-aos-duration="1000">
                    <h3 class="testimonial-title text-center fw-bold my-5">Tim Kami</h3>
                    <div
                        class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 justify-content-center mt-12">
                        <!-- Card 1 -->
                        <div class="col" data-aos="fade-up" data-aos-duration="1400">
                            <div class="card h-100 shadow-sm position-relative team-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Firman.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: top">
                                    <h5 class="card-title mt-5 pt-5">Firman Zamzami</h5>
                                    <p class="card-text text-muted">Team Leader</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/GwFirman" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://gwfirman.my.id/" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-globe fs-5 text-globe"></i></a>
                                        <a href="https://www.instagram.com/gw_firman/?hl=id" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col" data-aos="fade-up" data-aos-duration="1800">
                            <div class="card h-100 shadow-sm position-relative team-card gilang-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Gilang.png"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; background-color: rgba(36,91,243,255); object-fit: cover;">
                                    <h5 class="card-title mt-5 pt-5">Gilang Dely</h5>
                                    <p class="card-text text-muted">Creative Director</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/gilangdely" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://wa.me/6282133781736" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-whatsapp fs-5 text-whatsapp"></i></a>
                                        <a href="https://www.instagram.com/gilang.dm/?hl=id" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col" data-aos="fade-up" data-aos-duration="2200">
                            <div class="card h-100 shadow-sm position-relative team-card fauzan-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Fauzan.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: 0px -20px;">
                                    <h5 class="card-title mt-5 pt-5">Akhmad Fauzan</h5>
                                    <p class="card-text text-muted">Software Engineer</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/ozan-fn" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://ozan.my.id" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-globe fs-5 text-globe"></i></a>
                                        <a href="https://www.instagram.com/ozan.fn/?hl=id" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="col" data-aos="fade-up" data-aos-duration="2600">
                            <div class="card h-100 shadow-sm position-relative team-card dodo-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Dodo.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: 20px -10 px;"></img>
                                    <h5 class="card-title mt-5 pt-5">Afridho Zaki</h5>
                                    <p class="card-text text-muted">Software Engineer</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/dhodo999" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://www.instagram.com/dhoodo.69/?hl=id" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="col" data-aos="fade-up" data-aos-duration="3000">
                            <div class="card h-100 shadow-sm position-relative team-card ian-card">
                                <div class="card-body text-center">
                                    <img src="assets\img\profile\Iyan.jpg"
                                        class="rounded-circle mx-auto mb-4 position-absolute top-0 start-50 translate-middle"
                                        style="width: 120px; height: 120px; object-fit: cover; object-position: 0px 0px;">
                                    <h5 class="card-title mt-5 pt-5">Muhammad Agus</h5>
                                    <p class="card-text text-muted">Designer Ui/Ux</p>
                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <a href="https://github.com/Astha4Study" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-github fs-5 text-github"></i></a>
                                        <a href="https://www.instagram.com/rheiyn._/?hl=id" target="_blank"
                                            class="text-decoration-none social-icon"><i
                                                class="bi bi-instagram fs-5 text-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Our Team -->

                <!-- Footer -->
                <footer class="footer mt-4">
                    <hr class="fancy-line">
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
            <!-- End Content -->
        </div>
    </div>
    <!-- End Content wrapper -->
</x-layout.guest.app>
