<style>
    .logo-ajang img {
        width: 100%;
        height: auto;
        max-height: 60px;
        object-fit: contain;
        aspect-ratio: 3 / 1;
        transition: transform 0.3s ease;
    }

    .logo-ajang img:hover {
        transform: scale(1.05);
    }

    @media (min-width: 768px) {
        .logo-ajang img {
            max-height: 70px;
        }
    }
</style>

<section style="padding: 3rem 0;" class="bg-white">
    <div class="container">
        <!-- Judul -->
        <div class="text-center fonts-sora fonts-color-primary"
            data-aos="fade-up"
            data-aos-delay="100"
            data-aos-duration="800"
            data-aos-easing="ease-in-out">
            <h3 class="fw-semibold lh-sm mb-4" style="max-width: 680px; margin: 0 auto;">
                Telah Diikutsertakan dalam Beberapa Ajang & Institusi
            </h3>
        </div>

        <!-- Logo Grid -->
        <div class="row justify-content-center align-items-center g-3 text-center">
            <div class="col-4 col-md-2" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="800">
                <div class="logo-ajang">
                    <img src="{{ asset('assets/img/logo/pkm-logo.svg') }}" alt="pkm" class="img-fluid">
                </div>
            </div>
            <div class="col-4 col-md-2" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="800">
                <div class="logo-ajang">
                    <img src="{{ asset('assets/img/logo/amikom-logo.svg') }}" alt="amikom" class="img-fluid">
                </div>
            </div>
            <div class="col-4 col-md-2" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="800">
                <div class="logo-ajang">
                    <img src="{{ asset('assets/img/logo/proxocoris-logo.svg') }}" alt="proxocoris" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
