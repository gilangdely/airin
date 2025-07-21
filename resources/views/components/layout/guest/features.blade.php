<style>
    .fitur-card {
        width: 100%;
        max-width: 360px;
        height: 220px;
        position: relative;
        border-radius: 24px;
        background: #F1F5F9;
        border: 1px solid #DEE0E1;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        padding: 1rem;
    }

    .fitur-icon-wrapper {
        width: 64px;
        height: 64px;
        background: #99A8F9;
        border-radius: 9999px;
        position: absolute;
        top: 24px;
        left: 50%;
        transform: translateX(-50%);
    }

    .fitur-icon-wrapper img {
        width: 28px;
        height: 28px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .fitur-title {
        font-size: 1rem;
        font-weight: 600;
        position: absolute;
        top: 100px;
        width: 100%;
        text-align: center;
        left: 50%;
        transform: translateX(-50%);
        line-height: 1.4;
    }

    .fitur-desc {
        font-size: 0.875rem;
        font-weight: 300;
        color: #6B7280;
        position: absolute;
        top: 140px;
        width: 90%;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        line-height: 1.5;
    }


    @media (max-width: 768px) {
        .fitur-card {
            height: 200px;
            max-width: 100%;
        }

        .fitur-icon-wrapper {
            width: 54px;
            height: 54px;
            top: 20px;
        }

        .fitur-icon-wrapper img {
            width: 24px;
            height: 24px;
        }

        .fitur-title {
            font-size: 0.95rem;
            top: 90px;
        }

        .fitur-desc {
            font-size: 0.8rem;
            top: 125px;
        }

        h3.fw-semibold {
            font-size: 1.25rem !important;
            line-height: 1.4 !important;
        }

        h5.fw-normal {
            font-size: 0.95rem !important;
            line-height: 1.5 !important;
            margin-top: 1rem !important;
        }

    }

    @media (max-width: 480px) {
        .fitur-card {
            height: 190px;
        }

        h3.fw-semibold {
            font-size: 1.125rem !important;
            line-height: 1.35 !important;
        }

        h5.fw-normal {
            font-size: 0.9rem !important;
            line-height: 1.45 !important;
        }


        .fitur-title {
            font-size: 0.9rem;
            top: 85px;
        }

        .fitur-desc {
            font-size: 0.75rem;
            top: 120px;
        }
    }
</style>

<section style="padding: 5rem 0;" class="bg-white">
    <div class="container">
        <div class="text-center fonts-sora fonts-color-primary" data-aos="fade-up" data-aos-delay="100"
            data-aos-duration="800" data-aos-easing="ease-in-out">

            <h3 class="fw-semibold lh-sm mb-4" style="max-width: 680px; margin: 0 auto;">
                Transparan. Efisien. Berkelanjutan.
            </h3>

            <h5 class="fw-normal lh-base" style="max-width: 580px; margin: 0 auto;">
                Airin memudahkan pemantauan aliran air, pencatatan konsumsi, hingga pembayaran
            </h5>
        </div>

        <div class="d-flex flex-wrap justify-content-center mt-5 gap-4 fonts-color-primary">
            <!-- Card Template -->
            @php
                $fitur = [
                    [
                        'icon' => 'humidity.svg',
                        'judul' => 'Pemantauan Pemakaian Air',
                        'deskripsi' =>
                            'Lihat riwayat dan jumlah pemakaian air secara detail setiap bulan langsung dari dashboard.',
                    ],
                    [
                        'icon' => 'Wallet.svg',
                        'judul' => 'Bayar Air Tanpa Antre',
                        'deskripsi' =>
                            'Cukup buka aplikasi, lihat jumlah tagihan, dan bayar dalam beberapa langkah sederhana.',
                    ],
                    [
                        'icon' => 'Tablet.svg',
                        'judul' => 'Akses Mobile untuk Petugas',
                        'deskripsi' =>
                            'Mencatat meteran, memantau, dan mengelola tagihan langsung dari perangkat mobile.',
                    ],
                    [
                        'icon' => 'Pressure.svg',
                        'judul' => 'Pencatatan Meteran Otomatis',
                        'deskripsi' => 'Petugas cukup input angka meteran, sistem akan otomatis menghitung tagihan.',
                    ],
                    [
                        'icon' => 'Waterfall.svg',
                        'judul' => 'Transparansi Data dan Riwayat',
                        'deskripsi' => 'Pelanggan bisa melihat semua riwayat pemakaian dan pembayaran.',
                    ],
                    [
                        'icon' => 'Group.svg',
                        'judul' => 'Manajemen Pengguna & Petugas',
                        'deskripsi' =>
                            'Admin dapat membuat dan mengelola akun petugas serta warga, dan mengatur hak akses.',
                    ],
                ];
            @endphp

            @foreach ($fitur as $item)
                <div class="fitur-card mt-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="fitur-icon-wrapper">
                        <img src="{{ asset('assets/img/icons/' . $item['icon']) }}" alt="{{ $item['judul'] }}">
                    </div>
                    <h5 class="fonts-sora fitur-title">{{ $item['judul'] }}</h5>
                    <div class="fonts-sora fitur-desc">{{ $item['deskripsi'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
