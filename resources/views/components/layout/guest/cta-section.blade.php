<style>
    /* Global tweak */
    .fonts-sora {
        line-height: 1.4;
        /* Lebih padat dan tetap terbaca */
    }

    /* Heading */
    h2.fonts-sora {
        font-size: 2rem;
        /* Lebih ringan di desktop */
        line-height: 1.3;
        margin-bottom: 1.5rem;
    }

    /* Paragraph */
    p.fonts-sora {
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    /* CTA Button */
    .btn.fonts-sora {
        font-size: 0.95rem;
        padding: 0.6rem 1.5rem;
    }

    /* Responsive for smaller screens */
    @media (max-width: 768px) {
        h2.fonts-sora {
            font-size: 1.5rem;
        }

        p.fonts-sora {
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .btn.fonts-sora {
            font-size: 0.875rem;
            padding: 0.5rem 1.25rem;
        }
    }
</style>

<section class="bg-white" style="padding: 5rem 0;">
    <div class="container">
        <div class="position-relative mx-auto"
            style="max-width: 1312px; height: auto; background: linear-gradient(338deg, #6C9FF9 0%, #A18CFA 100%);
                    overflow: hidden; border-radius: 30px; padding: 4rem 2rem;">

            <!-- Background Blurs -->
            <div style="width: 406px; height: 406px; background: #B68BC9; position: absolute;
                        left: -88px; top: -105px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px; z-index: 1;">
            </div>
            <div style="width: 406px; height: 406px; background: #5A71E8; position: absolute;
                        left: 280px; top: 481px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px; z-index: 1;">
            </div>
            <div style="width: 406px; height: 406px; background: #99A8F9; position: absolute;
                        left: 997px; top: 250px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px; z-index: 1;">
            </div>
            <div style="width: 406px; height: 406px; background: #5A71E8; position: absolute;
                        left: 717px; top: -157px; border-radius: 9999px; filter: blur(175px);
                        box-shadow: 350px 350px 350px; z-index: 1;">
            </div>

            <!-- Content Wrapper -->
            <div class="position-relative text-center" style="z-index: 2;">
                <!-- Heading -->
                <h2 class="fonts-sora fw-semibold mx-auto"
                    data-aos="fade-up"
                    style="font-size: 2.5rem; max-width: 900px; color: white;">
                    Bersama, Kita Wujudkan Layanan Air yang Adil dan Terbuka
                </h2>

                <!-- Description -->
                <p class="fonts-sora fw-normal mt-4 mx-auto"
                    data-aos="fade-up"
                    data-aos-delay="150"
                    style="font-size: 1.125rem; max-width: 720px; color: white;">
                    Airin membantu menciptakan kepercayaan antara warga dan pengelola air
                    dengan sistem yang transparan dan mudah digunakan.
                </p>

                <!-- CTA Button -->
                <a href="{{ route('login') }}"
                    class="btn d-inline-flex align-items-center justify-content-center gap-2 fonts-sora mt-4"
                    data-aos="fade-up"
                    data-aos-delay="300"
                    style="
                        background: #99A8F9;
                        border-radius: 100px;
                        box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.10);
                        color: white;
                        text-decoration: none;
                        padding: 0.75rem 2rem;
                        font-size: 1rem;">
                    Masuk Sekarang
                    <span class="d-inline-flex align-items-center">
                        <img src="{{ asset('assets/img/icons/Arrow_right.svg') }}" alt="Arrow icon" style="height: 1rem;">
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>