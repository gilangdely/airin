<x-layout.app title="Cetak Kartu" activeMenu="meteran.create" :withError="false">
    @push('style')
        <style>
            /* Google Fonts */
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap');

            .front-card,
            .behind-card {
                height: 53.98mm;
                width: 85.60mm;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                border: 1px solid grey;
                box-sizing: border-box;
                position: relative;
                display: flex;
                padding: 10px;
                margin: 10px auto;
                background-color: #ffff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .front-card {
                background-image: url("{{ asset('assets/img/card/depanHor.png') }}");
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .front-card .logo-section {
                position: absolute;
                top: 10px;
                left: 10px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .front-card .logo-section img {
                width: 20px;
                height: 25px;
                object-fit: contain;
            }

            .front-card .logo-section p {
                font-family: 'Teko', sans-serif;
                font-size: 18px;
                color: #ffff;
                text-transform: uppercase;
                margin: 0;
            }

            .front-card .info-section {
                text-align: center;
                width: 100%;
            }

            .front-card .info-section h3 {
                font-family: 'Raleway', sans-serif;
                color: #ffff;
                font-weight: bold;
                text-transform: uppercase;
                font-size: 15px;
                margin-top: 1.5rem;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            .front-card .info-section p {
                font-family: 'Roboto', sans-serif;
                font-size: 14px;
                color: #ffff;
                margin: 0 0 8px 0;
            }

            .front-card .info-section .meteran-id {
                font-size: 13px;
                margin-top: -15px;
            }

            .front-card .info-section .contact {
                position: absolute;
                bottom: 10px;
                left: 10px;
                text-align: left;
                line-height: 1.2;
            }

            .front-card .info-section .contact p {
                font-size: 12px;
                margin: 0;
            }

            .behind-card {
                background-image: url("{{ asset('assets/img/card/belakangHor.png') }}");
                justify-content: center;
                align-items: center;
            }

            .behind-card .qr-code {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100%;
            }

            .behind-card .qr-code .text-qr {
                font-family: 'Roboto', sans-serif;
                color: #ffff;
                font-size: 16px;
                margin-top: -5px;
            }

            .behind-card .qr-code img {
                width: 90px;
                height: 90px;
                max-width: 80%;
                max-height: 80%;
                object-fit: contain;
                margin-top: 40px;
            }

            /* Responsive Styles */
            @media (max-width: 575.98px) {

                .front-card,
                .behind-card {
                    height: 45mm;
                    width: 70mm;
                }

                .front-card .logo-section img {
                    width: 18px;
                    height: 22px;
                }

                .front-card .logo-section p {
                    font-size: 14px;
                }

                .front-card .info-section h3 {
                    font-size: 12px;
                    margin-top: 1rem;
                }

                .front-card .info-section .meteran-id {
                    font-size: 10px;
                    margin-top: -15px;
                }

                .front-card .info-section .contact p {
                    font-size: 9px;
                }

                .behind-card .qr-code img {
                    width: 60px;
                    height: 60px;
                }

                .behind-card .qr-code .text-qr {
                    margin-top: 5px;
                }
            }

            /* Mobile */
            @media (min-width: 576px) and (max-width: 767.98px) {

                .front-card,
                .behind-card {
                    height: 50mm;
                    width: 80mm;
                }

                .front-card .logo-section img {
                    width: 20px;
                    height: 22px;
                }

                .front-card .info-section h3 {
                    font-size: 14px;
                }

                .front-card .info-section .meteran-id {
                    font-size: 12px;
                }

                .behind-card .qr-code img {
                    width: 70px;
                    height: 70px;
                }

                .behind-card .qr-code .text-qr {
                    margin-top: 5px;
                }
            }

            /* Tab */
            @media (min-width: 768px) and (max-width: 991.98px) {
                .front-card .logo-section img {
                    width: 20px;
                    height: 25px;
                }

                .front-card .info-section h3 {
                    font-size: 14px;
                }

                .front-card .info-section .meteran-id {
                    margin-top: -15px;
                }

                .behind-card .qr-code img {
                    width: 80px;
                    height: 80px;
                }

                .behind-card .qr-code .text-qr {
                    margin-top: -5px;
                }
            }
        </style>
    @endpush
    <div class="container my-5">
        <div class="noprint">
            <x-breadcrumb title="Cetak Kartu" :breadcrumbs="[
                ['label' => 'Dashboard', 'url' => url('/')],
                ['label' => 'Meteran', 'url' => route('meteran.index')],
                ['label' => 'Cetak Kartu'],
            ]" />

        </div>

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
                                <h3>{{ $meteran->pelanggan->nama_pelanggan }}</h3>
                                <p class="meteran-id">Nomor Meteran: {{ $meteran->nomor_meteran }}</p>
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
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=90x90&data={{ $meteran->nomor_meteran }}&bgcolor=transparent"
                                    alt="QR Code">
                                <h5 class="text-qr">Scan Disini</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Print Button -->
                <div class="row mt-4 noprint">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary" onclick="window.print()">Cetak Kartu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
