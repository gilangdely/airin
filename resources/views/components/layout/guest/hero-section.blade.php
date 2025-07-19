<section class="position-relative bg-white d-flex align-items-center overflow-hidden" style="height: 100vh; padding-top: 4.5rem;">
    <!-- Blur Background Ungu - Kiri -->
    <div class="position-absolute"
        style="top: 80%; left: -5%; width: 1073px; height: 1073px; background: #D0A3E4; border-radius: 50%; filter: blur(200px); z-index: 1; transform: translate(-50%, -50%);">
    </div>

    <!-- Blur Background Biru - Kanan -->
    <div class="position-absolute"
        style="top: 60%; right: -10%; width: 811px; height: 811px; background: #99A8F9; border-radius: 50%; filter: blur(200px); z-index: 1; transform: translate(50%, -50%);">
    </div>

    <!-- Main Content -->
    <div class="container px-4 position-relative" style="z-index: 2;">
        <div class="row justify-content-center">

            <!-- Badge/Pill -->
            <div class="col-12 d-flex justify-content-center mb-4">
                <div class="rounded-pill border border-dark px-4 py-2 fonts-sora"
                    style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">
                    <div class="text-center text-dark fw-normal" style="font-size: 16px;">
                        Mengenalkan airin website pencatatan dan pembayaran air pamsimas
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8 text-center">
                <h1 class="display-4 mb-3 fonts-inter fw-bold" style="color: #1a1a1a;">
                    Sistem digital untuk pencatatan dan pembayaran air desa
                </h1>
                <p class="lead mb-5 fonts-inter" style="color: #4a4a4a;">
                    Airin hadir sebagai solusi modern untuk memudahkan pencatatan pemakaian air dan pembayaran Pamsimas secara efisien dan transparan.
                </p>
                <a href="{{ route('login') }}"
                    class="btn btn-light btn-lg shadow px-8 py-3 fonts-sora"
                    style="background: rgba(255, 255, 255, 0.9);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(0, 0, 0, 0.1);
                        border-radius: 0.9rem; ">
                    Masuk
                </a>
            </div>

            

        </div>
    </div>
</section>