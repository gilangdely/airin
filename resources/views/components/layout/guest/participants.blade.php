<style>
  @media (min-width: 768px) {
    .logo-ajang img {
      max-height: none !important;
      height: auto !important;
      max-width: 100% !important;
    }
  }

  @media (max-width: 767px) {
    .logo-ajang img {
      max-height: 50px !important;
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
        <div class="row justify-content-center align-items-center g-2 text-center">
            <div class="col-4 col-md-2" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="800">
                <img src="{{ asset('assets/img/logo/pkm-logo.svg') }}"
                    alt="pkm"
                    class="img-fluid logo-ajang mt-2"
        >
            </div>
            <div class="col-4 col-md-2" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="800">
                <img src="{{ asset('assets/img/logo/amikom-logo.svg') }}"
                    alt="amikom"
                    class="img-fluid logo-ajang mt-2"
        >
            </div>
            <div class="col-4 col-md-2" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="800">
                <img src="{{ asset('assets/img/logo/proxocoris-logo.svg') }}"
                    alt="proxocoris"
                    class="img-fluid logo-ajang mt-2"
        >
            </div>
        </div>
    </div>
</section>