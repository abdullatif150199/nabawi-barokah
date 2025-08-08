<footer class="bg-emerald-dark text-white pt-12">
    <div class="container mx-auto px-4">
        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Brand Info -->
            <div>
                <div class="flex items-center mb-4">
                    <img src="{{ asset('backend-assets/images/logo.png') }}" alt="Logo"
                        class="w-12 h-12 rounded-full object-contain bg-white p-1 shadow-md">
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gold">Nabawi Barokah</h3>
                        <p class="text-sm text-emerald-light">Travel Umroh Terpercaya</p>
                    </div>
                </div>
                <p class="text-emerald-light text-sm leading-relaxed">
                    Memberikan pelayanan umroh terbaik dengan mengutamakan kenyamanan dan kepuasan jamaah.
                </p>
            </div>

            <!-- Kontak -->
            <div>
                <h4 class="text-lg font-semibold mb-4 text-gold">Kontak Kami</h4>
                <ul class="space-y-2 text-sm text-emerald-light">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-phone text-gold"></i>
                        <span>+62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-envelope text-gold"></i>
                        <span>info@nabawibarokah.com</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-gold"></i>
                        <span>Jakarta, Indonesia</span>
                    </li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4 text-gold">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#tentang-kami" class="hover:text-gold transition">Tentang Kami</a></li>
                    <li><a href="#paket-umroh" class="hover:text-gold transition">Paket Umroh</a></li>
                    <li><a href="#legalitas" class="hover:text-gold transition">Legalitas</a></li>
                    <li><a href="#dokumentasi" class="hover:text-gold transition">Dokumentasi</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h4 class="text-lg font-semibold mb-4 text-gold">Ikuti Kami</h4>
                <div class="flex space-x-4">
                    <a href="{{ $setting->fb ?? '#' }}"
                        class="w-10 h-10 rounded-full bg-gold flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-md">
                        <i class="fab fa-facebook-f text-emerald-dark"></i>
                    </a>
                    <a href="{{ $setting->ig ?? '#' }}"
                        class="w-10 h-10 rounded-full bg-gold flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-md">
                        <i class="fab fa-instagram text-emerald-dark"></i>
                    </a>
                    <a href="{{ $setting->yt ?? '#' }}"
                        class="w-10 h-10 rounded-full bg-gold flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-md">
                        <i class="fab fa-youtube text-emerald-dark"></i>
                    </a>
                    <a href="{{ 'https://wa.me/' . $wa ?? '#' }}"
                        class="w-10 h-10 rounded-full bg-gold flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-md">
                        <i class="fab fa-whatsapp text-emerald-dark"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="border-t border-emerald-light mt-10 pt-6 text-center text-sm text-emerald-light">
            &copy; {{ date('Y') }} <span class="text-white font-semibold">Nabawi Barokah</span>. All rights reserved.
        </div>
    </div>
</footer>

<script>
    const menuBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('menu-overlay');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
        overlay.classList.add('hidden');
    });

    overlay.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
        overlay.classList.add('hidden');
    });
</script>