<x-layout.app title="Cetak Kartu" activeMenu="meteran.create" :withError="false">
    @push('style')
        <style>
            /* Google Fonts */
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap');

            /* Gaya dasar untuk kartu */
            .front-card,
            .behind-card {
                height: 53.98mm;
                width: 85.60mm;
                background-size: 100% 100%;
                border: 1px solid grey;
                box-sizing: border-box;
                position: relative;
                display: flex;
                padding: 10px;
                margin: 10px auto;
                background-color: #ffff;
                /* Warna latar belakang kartu */
                border-radius: 10px;
                /* Sudut kartu yang lembut */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                /* Shadow untuk kartu */
            }

            /* Front Card */
            .front-card {
                background-image: url("{{ asset('assets/img/card/depanHor.png') }}");
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            /* Logo dan Nama Airin di Kiri Atas */
            .front-card .logo-section {
                position: absolute;
                top: 10px;
                left: 10px;
                display: flex;
                align-items: center;
                gap: 8px;
                /* Jarak antara logo dan teks */
            }

            .front-card .logo-section img {
                width: 20px;
                /* Logo diperbesar */
                height: 25px;
                /* Logo diperbesar */
            }

            .front-card .logo-section p {
                font-family: 'Teko', sans-serif;
                font-size: 18px;
                /* Teks diperbesar */
                color: #ffff;
                /* Warna teks */
                text-transform: uppercase;
                margin: 0;
                /* Hilangkan margin default */
            }

            /* Informasi di Tengah */
            .front-card .info-section {
                text-align: center;
                margin-top: 30px;
                /* Jarak dari logo */
            }

            .front-card .info-section h3 {
                font-family: 'Raleway', sans-serif;
                font-size: 18px;
                /* Teks diperbesar */
                color: #ffff;
                /* Warna teks */
                margin: 0 0 5px 0;
                /* Jarak antara elemen */
                font-weight: bold;
                /* Tebalkan teks */
                text-transform: uppercase;
            }

            .front-card .info-section p {
                font-family: 'Roboto', sans-serif;
                font-size: 14px;
                /* Teks diperbesar */
                color: #ffff;
                /* Warna teks yang lebih lembut */
                margin: 0 0 8px 0;
                /* Jarak antara elemen */
            }

            .front-card .info-section .contact {
                position: relative;
                top: 18px;
                right: 3.9rem;
                text-align: left;
                line-height: 0.8;
            }

            /* Behind Card */
            .behind-card {
                background-image: url("{{ asset('assets/img/card/belakangHor.png') }}");
                justify-content: center;
                align-items: center;
            }

            .behind-card .qr-code img {
                width: 90px;
                height: 90px;
            }

            /* Responsive Styles */
            @media (max-width: 767.98px) {

                .front-card,
                .behind-card {
                    height: 53.98mm;
                    width: 85.60mm;
                    margin: 10px auto;
                }

                .front-card .logo-section img {
                    width: 25px;
                    height: 25px;
                }

                .front-card .logo-section p {
                    font-size: 16px;
                }

                .front-card .info-section h3 {
                    font-size: 16px;
                }

                .front-card .info-section p {
                    font-size: 12px;
                }

                .behind-card .qr-code img {
                    width: 70px;
                    height: 70px;
                }
            }

            @media (min-width: 768px) and (max-width: 991.98px) {
                .front-card .logo-section img {
                    width: 30px;
                    height: 30px;
                }

                .front-card .logo-section p {
                    font-size: 18px;
                }

                .front-card .info-section h3 {
                    font-size: 18px;
                }

                .front-card .info-section p {
                    font-size: 14px;
                }

                .behind-card .qr-code img {
                    width: 80px;
                    height: 80px;
                }
            }

            @media (min-width: 992px) {
                .front-card .logo-section img {
                    width: 20px;
                    height: 25px;
                }

                .front-card .logo-section p {
                    font-size: 18px;
                    margin-top: 5px;
                }

                .front-card .info-section h3 {
                    font-size: 20px;
                }

                .front-card .info-section p {
                    font-size: 16px;
                }

                .behind-card .qr-code img {
                    width: 90px;
                    height: 90px;
                }

                .front-card .info-section .contact p{
                    font-size: 12px;
                }
            }
        </style>
    @endpush
    <div class="container my-5">
        <x-breadcrumb title="Cetak Kartu" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Meteran', 'url' => route('meteran.index')],
            ['label' => 'Cetak Kartu'],
        ]" />

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <!-- Front Card -->
                    <div class="col-xl-4 col-md-6 col-sm-6 d-flex justify-content-center">
                        <div class="front-card">
                            <div class="logo-section">
                                <img src="{{ asset('assets/img/logo/Airin-Logo.png') }}" alt="Logo Airin">
                                <p>Airin</p>
                            </div>
                            <div class="info-section">
                                <h3>Akhmad Fauzan</h3>
                                <p>ID: 123456789</p>
                                <div class="contact">
                                    <p>Phone: +62 123 4567 890</p>
                                    <p>Email: info@airin.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Behind Card -->
                    <div class="col-xl-4 col-md-6 col-sm-6 d-flex justify-content-center">
                        <div class="behind-card">
                            <div class="qr-code">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=90x90&data=https://example.com&bgcolor=transparent"
                                    alt="QR Code">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
