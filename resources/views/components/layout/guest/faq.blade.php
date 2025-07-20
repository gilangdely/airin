<section style="padding: 5rem 0;" class="bg-white">
    <div class="container fonts-color-primary">
        <div class="row justify-content-center align-items-start">
            <!-- Gambar Ilustrasi di Kiri -->
            <div class="col-lg-5 d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800" data-aos-easing="ease-in-out">
                <div class="text-center w-100">
                    <img src="{{ asset('assets/img/illustrations/faq-ilustration.png') }}"
                        alt="Water Meter Illustration"
                        class="img-fluid"
                        style="max-height: 400px; width: 100%; object-fit: contain; margin-top: -1.2rem;">
                </div>
            </div>

            <!-- Konten Text di Kanan -->
            <div class="col-lg-6 fonts-sora" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800" data-aos-easing="ease-in-out">
                <div class="text-start mb-4">
                    <h3 class="fw-semibold lh-sm" style="max-width: 500px;">
                        Punya pertanyaan tentang Airin?
                    </h3>
                    <h5 class="lh-sm mt-4 fw-normal">
                        Tenang, kami sudah merangkum beberapa pertanyaan yang paling sering ditanyakan seputar penggunaan Airin.
                        Mulai dari cara akses, fitur yang tersedia, hingga siapa saja yang bisa menggunakan semuanya ada di sini.
                    </h5>
                </div>

                <!-- Daftar Accordion -->
                <div class="accordion accordion-flush mt-4" id="accordionFlushExample">
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                        <div class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed d-flex align-items-center gap-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                <div style="width: 2rem; height: 2rem; background: #99A8F9; border-radius: 9999px;
                            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.10);
                            display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <h5 class="mb-0 text-white">1</h5>
                                </div>
                                <h5 class="mb-0 fw-light">Apa itu Airin dan siapa yang bisa menggunakannya?</h5>
                            </button>
                        </div>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body fw-light">
                                Airin adalah sistem digital untuk pengelolaan air bersih. Digunakan oleh warga, petugas lapangan, hingga admin pusat untuk memantau, mencatat, dan mengelola pemakaian air secara efisien dan transparan.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed d-flex align-items-center gap-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                <div style="width: 2rem; height: 2rem; background: #99A8F9; border-radius: 9999px;
                            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.10);
                            display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <h5 class="mb-0 text-white">2</h5>
                                </div>
                                <h5 class="mb-0 fw-light">Bisakah saya melihat riwayat pemakaian air setiap bulan?</h5>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body fw-light">
                                Bisa. Anda dapat melihat detail pemakaian setiap bulan langsung dari akun Airin, termasuk jumlah pemakaian, status tagihan, dan histori pembayaran.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="500" data-aos-duration="800">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed d-flex align-items-center gap-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                <div style="width: 2rem; height: 2rem; background: #99A8F9; border-radius: 9999px;
                            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.10);
                            display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <h5 class="mb-0 text-white">3</h5>
                                </div>
                                <h5 class="mb-0 fw-light">Apakah satu akun bisa digunakan untuk beberapa meteran?</h5>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body fw-light">
                                Ya, satu akun pelanggan dapat digunakan untuk memantau dan mengelola lebih dari satu meteran air. Sangat cocok untuk rumah, usaha kecil, atau kos-kosan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>