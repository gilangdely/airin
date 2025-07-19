<section class="bg-white" style="padding: 5rem 0;">
    <div class="container">
        <div class="position-relative mx-auto"
            style="max-width: 1312px; height: 531px; background: linear-gradient(338deg, #6C9FF9 0%, #A18CFA 100%);
                    overflow: hidden; border-radius: 30px;">

            <!-- Background Blurs -->
            <div style="width: 406px; height: 406px; background: #B68BC9; position: absolute;
                        left: -88px; top: -105px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px;">
            </div>
            <div style="width: 406px; height: 406px; background: #5A71E8; position: absolute;
                        left: 280px; top: 481px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px;">
            </div>
            <div style="width: 406px; height: 406px; background: #99A8F9; position: absolute;
                        left: 997px; top: 250px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px;">
            </div>
            <div style="width: 406px; height: 406px; background: #5A71E8; position: absolute;
                        left: 717px; top: -157px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px;">
            </div>

            <!-- Heading -->
            <h1 class="position-absolute text-center"
                style="width: 902px; left: 205px; top: 130px; color: white; font-size: 48px;
                        font-family: Sora; font-weight: 600;">
                Bersama, Kita Wujudkan Layanan Air yang Adil dan Terbuka
            </h1>

            <!-- Description -->
            <div class="mt-4 position-absolute text-center"
                style="width: 721px; left: 296px; top: 275px; color: white; font-size: 18px;
                        font-family: Sora; font-weight: 400;">
                Airin membantu menciptakan kepercayaan antara warga dan pengelola air
                dengan sistem yang transparan dan mudah digunakan.
            </div>

            <!-- CTA Button -->
            <a href="{{ route('login') }}"
                class="position-absolute d-inline-flex align-items-center justify-content-center gap-2 fonts-sora"
                style="left: 549px; top: 361px;
                    width: auto;
                    padding: 0.75rem 2rem; /* py-3 = 0.75rem (12px), px-8 = 2rem (32px) */
                    background: #99A8F9;
                    border-radius: 100px;
                    box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.10);
                    color: white;
                    text-decoration: none;">
                Masuk Sekarang
                <span class="d-inline-flex align-items-center">
                    <img src="{{ asset('assets/img/icons/Arrow_right.svg') }}" alt="Arrow icon" style="height: 1rem;">
                </span>
            </a>
        </div>
    </div>
</section>