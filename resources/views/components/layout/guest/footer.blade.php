<footer class="fonts-sora" style="background: linear-gradient(135deg, #366AC6 0%, #826BE1 100%); position: relative; overflow: hidden;">
    <!-- Background decorative elements -->
    <div style="position: absolute; width: 300px; height: 300px; background: rgba(182, 139, 201, 0.3); border-radius: 50%; top: -150px; left: -100px; filter: blur(100px);"></div>
    <div style="position: absolute; width: 250px; height: 250px; background: rgba(90, 113, 232, 0.4); border-radius: 50%; bottom: -100px; right: -80px; filter: blur(80px);"></div>

    <div class="container position-relative" style="max-width: 1200px; padding: 4rem 1rem 2rem;">
        <div class="row">
            <!-- Brand Section -->
            <div class="col-lg-6 col-md-6 col-12 mb-4" data-aos="fade-up">
                <a href="{{ url('/') }}" class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/img/logo/Airin-Logo-New.png') }}" alt="Airin Logo" height="60">
                </a>
                <p class="text-white mb-4" style="font-size: 14px; line-height: 1.6; max-width: 400px; opacity: 0.9;">
                    Meningkatkan transparansi layanan air, memperkuat kepercayaan masyarakat dalam setiap langkah pelayanan.
                </p>

                <!-- Social Icons -->
                <div class="d-flex gap-2">
                    <a href="#" class="text-decoration-none"
                        style="width: 36px; height: 36px; background: rgba(255,255,255,0.15); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('assets/img/icons/whatsapp.svg') }}" height="20" alt="WhatsApp">
                    </a>
                    <a href="#" class="text-decoration-none"
                        style="width: 36px; height: 36px; background: rgba(255,255,255,0.15); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('assets/img/icons/instagram.svg') }}" height="20" alt="Instagram">
                    </a>
                    <a href="#" class="text-decoration-none"
                        style="width: 36px; height: 36px; background: rgba(255,255,255,0.15); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('assets/img/icons/facebook.svg') }}" height="20" alt="Facebook">
                    </a>
                </div>
            </div>

            <!-- Home Section -->
            <div class="col-lg-3 col-md-3 col-12 mt-4 order-1" data-aos="fade-up" data-aos-delay="100">
                <h5 class="text-white mb-3" style="font-weight: 500; font-size: 16px;">Home</h5>
                <ul class="list-unstyled" style="line-height: 1.6;">
                    <li class="mb-2">
                        <a href="#keunggulan-kami" class="text-white text-decoration-none" style="font-size: 14px; opacity: 0.8;">Keunggulan Kami</a>
                    </li>
                    <li class="mb-2">
                        <a href="#manfaat" class="text-white text-decoration-none" style="font-size: 14px; opacity: 0.8;">Manfaat</a>
                    </li>
                    <li class="mb-2">
                        <a href="#faq" class="text-white text-decoration-none" style="font-size: 14px; opacity: 0.8;">Pertanyaan Seputar Airin</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="col-lg-3 col-md-3 col-12 mt-4 order-2" data-aos="fade-up" data-aos-delay="200">
                <h5 class="text-white mb-3" style="font-weight: 500; font-size: 16px;">Kontak Kami</h5>
                <ul class="list-unstyled" style="line-height: 1.6;">
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <img src="{{ asset('assets/img/icons/globe.svg') }}" alt="Website" style="height: 24px;">
                        <span class="text-white" style="font-size: 14px; opacity: 0.8;">Kurawal.site</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <img src="{{ asset('assets/img/icons/Message.svg') }}" alt="Email" style="height: 24px;">
                        <span class="text-white" style="font-size: 14px; opacity: 0.8;">Kurawal.Creative@gmail.com</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center gap-2">
                        <img src="{{ asset('assets/img/icons/Phone.svg') }}" alt="Phone" style="height: 24px;">
                        <span class="text-white" style="font-size: 14px; opacity: 0.8;">081344916095</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <hr class="border-0 my-4" style="height: 2px; background: rgba(255, 255, 255, 0.2); border-radius: 2px;">

        <!-- Copyright -->
        <div class="text-center py-4" data-aos="fade-up" data-aos-delay="300">
            <p class="text-white mb-0" style="font-size: 13px; opacity: 0.9;">
                © {{ date('Y') }} Airin. All rights reserved
            </p>
        </div>
    </div>
</footer>
