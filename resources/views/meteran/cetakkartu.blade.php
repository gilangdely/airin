<x-layout.app title="Cetak Kartu" activeMenu="meteran.create" :withError="false">
    @push('style')
        <style>
            /* Google Fonts */
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap');

            .front-card,
            .behind-card {
                height: 89.6mm;
                width: 56.6mm;
                background-size: 100% 100%;
                border: 1px solid grey;
                box-sizing: border-box;
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 15px;
                margin: 10px auto;
            }

            .front-card {
                background-image: url("{{ asset('assets/img/card/depanVer.png') }}");
            }

            .front-card .profile-card {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                overflow: hidden;
                margin-top: 10px;
                margin-bottom: 4px;
            }

            .front-card .profile-card img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .front-card .card-info {
                text-align: center;
            }

            .front-card .card-info h3 {
                margin: 5px 0;
                font-size: 16px;
                text-transform: uppercase;
            }

            .front-card .card-info h3 {
                margin-bottom: 4px;
                font-family: 'Raleway', sans-serif;
                font-size: 14px;
                color: #ffff;
            }

            .front-card .card-info p {
                margin: 2px 0;
                font-size: 10px;
                font-family: 'Roboto', sans-serif;
                color: #ffff;
            }

            .behind-card {
                background-image: url("{{ asset('assets/img/card/belakangVer.png') }}");
                text-align: center;
            }

            .behind-card .airin-logo {
                width: 30px;
                height: 30px;
                margin: 10px 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 5px;
            }

            .airin-logo p {
                color: #ffff;
                margin-bottom: 5px;
                font-size: 25px;
                font-family: 'Teko', sans-serif;
                text-transform: uppercase;
            }

            .behind-card .airin-logo img {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }

            .behind-card .qr-code img {
                width: 90px;
                height: 90px;
                margin-top: 10px;
            }

            .behind-card .behind-card-info p {
                margin-top: 10px;
                font-size: 14px;
                color: #ffff;
            }

            .behind-card .contact-us {
                margin-top: 5px;
                font-size: 10px;
            }

            .behind-card .contact-us p {
                margin: 2px 0;
                color: #ffff;
                font-size: 12px;
                font-family: 'Roboto', sans-serif;
            }

            /* Responsive Styles */
            @media (min-width: 768px) and (max-width: 1280px) {
                .kartu-container {
                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    gap: 20px;
                }
            }

            @media (max-width: 767px) {
                .kartu-container {
                    flex-direction: column;
                    gap: 10px;
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
                <div class="row">

                    <!-- Front Card -->
                    <div class="col-xl-3 col-md-5 col-sm-6 d-flex justify-content-center">
                        <div class="front-card">
                            <div class="profile-card">
                                <img src="https://ui-avatars.com/api/?background=random&name={{ $meteran->pelanggan->nama_pelanggan }}"
                                    alt="">
                            </div>
                            <div class="card-info">
                                <h3>{{ $meteran->pelanggan->nama_pelanggan }}</h3>
                                <p>{{ $meteran->nomor_meteran }}</p>
                                <p>{{ date('d-M-Y', strtotime($meteran->tanggal_pemasangan)) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Behind Card -->
                    <div class="col-xl-3 col-md-5 col-sm-6 d-flex justify-content-center">
                        <div class="behind-card">
                            <div class="airin-logo">
                                <img src="{{ asset('assets/img/logo/Airin-Logo.png') }}" alt="">
                                <p>Airin</p>
                            </div>
                            <div class="qr-code">
                                <img src="{{ route('qrcode.generate', ['info' => $meteran->nomor_meteran]) }}"
                                    alt="QRCode">
                            </div>
                            <div class="behind-card-info">
                                <p>Scan Untuk Pembayaran</p>
                            </div>
                            <div class="contact-us">
                                <p>Contact Us:</p>
                                <p>Phone: +62 123 4567 890</p>
                                <p>Email: info@airin.com</p>
                                <p>Website: www.airin.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
