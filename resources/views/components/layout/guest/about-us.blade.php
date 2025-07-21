<section class="position-relative bg-white overflow-hidden d-flex flex-column justify-content-center" style="padding-top: 8rem; padding-bottom: 5rem;">
    <div class="container fonts-color-primary fonts-sora">
        <div class="row justify-content-center align-items-center flex-lg-row flex-column-reverse">

            <!-- Konten Teks -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="text-center text-lg-start mb-4"
                    data-aos="fade-right"
                    data-aos-delay="100"
                    data-aos-duration="900"
                    data-aos-easing="ease-in-out">
                    <h2 class="fw-semibold mb-3" style="font-size: 2.2rem; line-height: 1.2;">
                        Kelola <span style="color: #5C6BF9;">Meteran Air</span><br>
                        secara Praktis & Modern
                    </h2>
                    <h5 class="fw-normal text-muted" style="line-height: 1.5;">
                        Airin merupakan solusi untuk mengelola berbagai meteran air dalam satu akun.
                        Dengan dukungan teknologi IoT, pengukuran jadi lebih transparan dan terpercaya.
                        Pantau pemakaian, tagihan, dan kontrol lebih efisien cocok untuk rumah tangga, kos-kosan, hingga bisnis kecil.
                    </h5>
                </div>
            </div>

            <!-- Ilustrasi -->
            <div class="col-lg-4 d-flex justify-content-center align-items-center mb-4"
                data-aos="fade-left"
                data-aos-delay="200"
                data-aos-duration="900"
                data-aos-easing="ease-in-out">
                <div class="text-center" style="max-width: 100%; padding: 0 1rem;">
                    <img src="{{ asset('assets/img/illustrations/about-us.svg') }}"
                        alt="Ilustrasi wanita memegang bintang"
                        class="img-fluid"
                        style="max-height: 420px; width: 100%; object-fit: contain; border-radius: 20px;">
                </div>
            </div>

        </div>
        <div class="container" style="margin-top: 5rem;">
            <!-- Judul -->
            <div class="text-center mb-5" data-aos="fade-up">
                <h3 class="fw-bold" style="font-size: 1.75rem;">Perkenalkan Tim Kami</h3>
            </div>

            <!-- Barisan Tim -->
            <div class="row justify-content-center gy-4 gx-2" style="margin-top: 2rem;">
                @foreach([
                ['name' => 'Firman Zamzami', 'role' => 'Machine Learning Developer', 'img' => 'Firman.jpg'],
                ['name' => 'Akhmad Fauzan', 'role' => 'Backend Developer', 'img' => 'Fauzan.jpg'],
                ['name' => 'Agus Priyanto', 'role' => 'Frontend Developer', 'img' => 'Iyan.jpg'],
                ['name' => 'Gilang Dely', 'role' => 'Project Creative', 'img' => 'Gilang.png'],
                ['name' => 'Afridho Zaki', 'role' => 'Blackbox Testing', 'img' => 'Dodo.jpg'],
                ['name' => 'Aulia Hamdi', 'role' => 'Desain Creative', 'img' => 'AuliaHamdi.png'],
                ] as $member)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100" style="padding-left: 8px; padding-right: 8px;">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/profile/' . $member['img']) }}"
                            alt="{{ $member['name'] }}"
                            class="rounded-circle shadow mb-3"
                            style="width: 120px; height: 120px; object-fit: cover;">
                        <h6 class="fw-semibold mb-1" style="color: #222;">{{ $member['name'] ?? '-' }}</h6>
                        <p style="color: #666; font-size: 0.9rem; margin-bottom: 0.5rem;">{{ $member['role'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>