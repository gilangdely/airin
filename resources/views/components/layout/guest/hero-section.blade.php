<style>
    @media (max-width: 768px) {
        .btn-lg {
            padding: 0.75rem 2rem;
            font-size: 0.95rem;
        }

        .lead {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
</style>

<section class="position-relative bg-white overflow-hidden d-flex flex-column justify-content-center"
    style="min-height: 100vh; padding-top: 6rem; padding-bottom: 10rem;"> <!-- padding-top dinaikkan -->

    <!-- Blur Background Ungu - Kiri -->
    <div class="position-absolute"
        style="top: 80%; left: -10%; width: 80vw; height: 80vw; max-width: 1073px; max-height: 1073px; background: #D0A3E4;
               border-radius: 50%; filter: blur(200px); z-index: 0; transform: translate(-50%, -50%);">
    </div>

    <!-- Blur Background Biru - Kanan -->
    <div class="position-absolute"
        style="top: 60%; right: -10%; width: 60vw; height: 60vw; max-width: 811px; max-height: 811px; background: #99A8F9;
               border-radius: 50%; filter: blur(200px); z-index: 0; transform: translate(50%, -50%);">
    </div>

    <!-- Konten Tengah -->
    <div class="container text-center position-relative px-3" style="z-index: 1;">
        <!-- Badge -->
        <div class="mb-3" data-aos="fade" data-aos-delay="100">
            <div class="rounded-pill border border-dark px-3 py-1 fonts-sora d-inline-block"
                style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); font-size: 0.85rem;">
                Mengenalkan airin website pencatatan dan pembayaran air pamsimas
            </div>
        </div>

        <!-- Headline & CTA -->
        <h1 class="fw-bold fonts-inter mb-3"
            style="color: #1a1a1a; font-size: clamp(1.75rem, 4vw, 2.75rem); line-height: 1.3;"
            data-aos="fade-up"
            data-aos-delay="300">
            Sistem digital untuk pencatatan dan<br class="d-none d-md-block"> pembayaran air desa
        </h1>

        <p class="lead fonts-inter mb-4 px-md-5"
            style="color: #4a4a4a; font-size: clamp(1rem, 2.5vw, 1.25rem);"
            data-aos="fade-up"
            data-aos-delay="500">
            Airin hadir sebagai solusi modern untuk memudahkan pencatatan pemakaian air dan pembayaran Pamsimas secara efisien dan transparan.
        </p>

        <a href="{{ route('login') }}"
            class="btn btn-light btn-lg shadow px-5 py-3 fonts-sora mb-4"
            style="background: rgba(255, 255, 255, 0.9);
              backdrop-filter: blur(10px);
              border: 1px solid rgba(0, 0, 0, 0.1);
              border-radius: 0.9rem; font-size: 1rem;"
            data-aos="zoom-in"
            data-aos-delay="700">
            Masuk
        </a>
    </div>

    <!-- Gambar Dashboard -->
    <div class="position-absolute start-50 translate-middle-x"
        style="bottom: 0; z-index: 1; width: 100%; max-width: 820px; padding: 0 1rem;"
        data-aos="fade-up"
        data-aos-delay="900">
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