<section class="position-relative bg-white overflow-hidden d-flex flex-column justify-content-center" style="min-height: 100vh; padding-top: 4.5rem; padding-bottom: 12rem;">
    <!-- Blur Background Ungu - Kiri -->
    <div class="position-absolute"
        style="top: 80%; left: -5%; width: 1073px; height: 1073px; background: #D0A3E4;
               border-radius: 50%; filter: blur(200px); z-index: 0; transform: translate(-50%, -50%);">
    </div>

    <!-- Blur Background Biru - Kanan -->
    <div class="position-absolute"
        style="top: 60%; right: -10%; width: 811px; height: 811px; background: #99A8F9;
               border-radius: 50%; filter: blur(200px); z-index: 0; transform: translate(50%, -50%);">
    </div>

    <!-- Konten Tengah -->
    <div class="container text-center position-relative" style="z-index: 1;">
        <!-- Badge -->
        <div class="mb-3">
            <div class="rounded-pill border border-dark px-4 py-2 fonts-sora d-inline-block"
                style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); font-size: 16px;">
                Mengenalkan airin website pencatatan dan pembayaran air pamsimas
            </div>
        </div>

        <!-- Headline & CTA -->
        <h1 class="display-4 mb-3 fonts-inter fw-bold" style="color: #1a1a1a;">
            Sistem digital untuk pencatatan dan<br class="d-none d-md-block"> pembayaran air desa
        </h1>
        <p class="lead mb-4 fonts-inter" style="color: #4a4a4a;">
            Airin hadir sebagai solusi modern untuk memudahkan pencatatan pemakaian air dan pembayaran Pamsimas secara efisien dan transparan.
        </p>
        <a href="{{ route('login') }}"
           class="btn btn-light btn-lg shadow px-5 py-3 fonts-sora"
           style="background: rgba(255, 255, 255, 0.9);
                  backdrop-filter: blur(10px);
                  border: 1px solid rgba(0, 0, 0, 0.1);
                  border-radius: 0.9rem;">
            Masuk
        </a>
    </div>

    <!-- Gambar Dashboard (menempel di bawah) -->
    <div class="position-absolute start-50 translate-middle-x" style="bottom: 0; z-index: 1; width: 100%; max-width: 820px; padding: 0 1rem;">
        <div style="background: #FFFFFF;
                    box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.10);
                    border-top-left-radius: 30px; border-top-right-radius: 30px;
                    padding: 24px 12px 0 12px;">
            <img src="{{ asset('assets/img/front-pages/dasbor.png') }}"
                 alt="dasbor" class="img-fluid"
                 style="width: 100%; border-top-left-radius: 30px; border-top-right-radius: 30px;">
        </div>
    </div>
</section>
