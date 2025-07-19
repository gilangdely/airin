<footer class="fonts-sora" style="background: linear-gradient(135deg, #366AC6 0%, #826BE1 100%); position: relative; overflow: hidden; font-family: 'Sora', sans-serif;">
    <!-- Background decorative elements -->
    <div style="position: absolute; width: 300px; height: 300px; background: rgba(182, 139, 201, 0.3); border-radius: 50%; top: -150px; left: -100px; filter: blur(100px);"></div>
    <div style="position: absolute; width: 250px; height: 250px; background: rgba(90, 113, 232, 0.4); border-radius: 50%; bottom: -100px; right: -80px; filter: blur(80px);"></div>

    <div class="container position-relative" style="max-width: 1200px; padding: 4rem 1rem 2rem;">
        <div class="row align-items-start">
            <!-- Brand Section -->
            <div class="col-lg-6 col-md-6 mb-4">
                <a href="{{ url('/') }}" class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/img/logo/Logo-Airin.png') }}" alt="Airin Logo" height="50">
                </a>
                <p class="text-white mb-4" style="font-size: 16px; line-height: 1.6; max-width: 400px; opacity: 0.9;">
                    Meningkatkan transparansi layanan air, memperkuat kepercayaan masyarakat dalam setiap langkah pelayanan.
                </p>
                <!-- Social Icons -->
                <div class="d-flex gap-3">
                    <a href="#" class="text-decoration-none" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.15); border-radius: 8px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <img src="{{ asset('assets/img/icons/whatsapp.svg') }}" height="22" alt="WhatsApp">
                    </a>
                    <a href="#" class="text-decoration-none" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.15); border-radius: 8px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <img src="{{ asset('assets/img/icons/instagram.svg') }}" height="22" alt="Instagram">
                    </a>
                    <a href="#" class="text-decoration-none" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.15); border-radius: 8px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <img src="{{ asset('assets/img/icons/facebook.svg') }}" height="22" alt="Facebook">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 mb-6 mt-4 text-end">
                <h5 class="text-white mb-3" style="font-weight: 500; font-size: 18px;">Home</h5>
                <ul class="list-unstyled text-end" style="line-height: 1.4;">
                    <li class="mb-2">
                        <a href="#" class="text-white text-decoration-none mb-0"
                            style="font-size: 14px; opacity: 0.8; transition: opacity 0.3s ease;">
                            Keunggulan Kami
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-white text-decoration-none mb-0"
                            style="font-size: 14px; opacity: 0.8; transition: opacity 0.3s ease;">
                            Manfaat
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-white text-decoration-none mb-0"
                            style="font-size: 14px; opacity: 0.8; transition: opacity 0.3s ease;">
                            Pertanyaan Seputar Airin
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="col-lg-3 col-md-3 mb-6 mt-4 text-end">
                <h5 class="text-white mb-3" style="font-weight: 500; font-size: 18px;">Kontak Kami</h5>
                <ul class="list-unstyled text-end" style="line-height: 1.4;">
                    <li class="mb-2">
                        <p class="text-white mb-0" style="font-size: 14px; opacity: 0.8;">
                            Kurawal.site <span><img src="{{ asset('assets/img/icons/globe.svg') }}" alt=""></span>
                        </p>
                    </li>
                    <li class="mb-2">
                        <p class="text-white mb-0" style="font-size: 14px; opacity: 0.8;">
                            Kurawal.Creative@gmail.com <span><img src="{{ asset('assets/img/icons/Message.svg') }}" alt=""></span>
                        </p>
                    </li>
                    <li class="mb-2">
                        <p class="text-white mb-0" style="font-size: 14px; opacity: 0.8;">
                            081344916095 <span><img src="{{ asset('assets/img/icons/Phone.svg') }}" alt=""></span>
                        </p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <hr class="border-0 my-4" style="height: 2px; background: rgba(255, 255, 255, 0.2); border-radius: 2px;">

        <!-- Copyright -->
        <div class="text-center">
            <p class="text-white mb-0" style="font-size: 14px; opacity: 0.8;">
                © {{ date('Y') }} Airin. All rights reserved
            </p>
        </div>
    </div>
</footer>