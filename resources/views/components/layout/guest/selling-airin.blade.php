<section style="padding: 5rem 0;" class="bg-white">
    <div class="container fonts-color-primary">
        <div class="row justify-content-center align-items-center flex-lg-row flex-column-reverse">

            <!-- Konten Text -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="fonts-sora text-center text-lg-start mb-4"
                    data-aos="fade-up"
                    data-aos-delay="100"
                    data-aos-duration="800"
                    data-aos-easing="ease-in-out">
                    <h3 class="fw-semibold lh-sm mb-4" style="max-width: 680px; margin: 0 auto;">
                        Satu akun untuk kelola banyak meteran air.
                    </h3>
                    <h5 class="lh-sm fw-normal">
                        Sistem Airin memudahkan pelanggan dalam memantau dan mengelola
                        beberapa meteran air hanya dengan satu akun praktis untuk kebutuhan
                        keluarga, kos-kosan, maupun usaha rumahan.
                    </h5>
                </div>

                <!-- Daftar Fitur -->
                <div class="mt-4 d-flex flex-column gap-3" data-aos="fade-up" data-aos-delay="200">
                    @foreach([
                    'Lihat pemakaian tiap meteran secara detail',
                    'Pantau dan bayar tagihan dari satu tempat',
                    'Cocok untuk rumah, kos-kosan, atau usaha kecil'
                    ] as $fitur)
                    <div class="d-flex align-items-center gap-3">
                        <div style="width: 2rem; height: 2rem; background: #99A8F9; border-radius: 9999px;
                                        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.10);
                                        display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('assets/img/icons/Done_round_light.svg') }}" alt="Done" style="width: 18px; height: 18px;">
                        </div>
                        <h5 class="fw-light fonts-sora mb-0">{{ $fitur }}</h5>
                    </div>
                    @endforeach
                </div>

                <!-- Tombol CTA -->
                <div class="mt-5" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('login') }}"
                        class="btn px-6 py-3 d-inline-flex align-items-center gap-2 shadow"
                        style="
                            background-color: #99A8F9;
                            border: 1px solid rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(10px);
                            border-radius: 9999px;
                            color: #FFFFFF;
                            font-family: 'Sora', sans-serif;
                            text-decoration: none;
                        ">
                        Masuk sebagai pelanggan
                        <span class="d-inline-flex align-items-center">
                            <img src="{{ asset('assets/img/icons/Arrow_right.svg') }}" alt="Arrow icon" style="height: 1rem;">
                        </span>
                    </a>
                </div>
            </div>

            <!-- Gambar Ilustrasi -->
            <div class="col-lg-5 d-flex justify-content-center align-items-center mb-4"
                data-aos="fade-up"
                data-aos-delay="400">
                <div class="text-center w-100">
                    <img src="{{ asset('assets/img/illustrations/selling.png') }}"
                        alt="Water Meter Illustration"
                        class="img-fluid"
                        style="max-height: 360px; width: 100%; object-fit: contain; margin-top: -1.5rem;">
                </div>
            </div>
        </div>
    </div>
</section>