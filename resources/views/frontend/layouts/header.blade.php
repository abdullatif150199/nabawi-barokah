<header class="bg-white/90 backdrop-blur-md shadow-md sticky top-0 z-50 transition-all">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4">
            <!-- Logo -->
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full overflow-hidden shadow">
                    <img src="{{ asset('backend-assets/images/logo.png') }}" alt="Logo"
                        class="w-full h-full object-contain">
                </div>
                <div>
                    <h1 class="text-lg md:text-xl font-bold text-emerald">Nabawi Barokah</h1>
                    <p class="text-xs text-gray-500">Travel Umroh Terpercaya</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden lg:flex items-center space-x-6">
                @php
                    $navItems = [
                        'Home' => '#hero',
                        'Legalitas' => '#legalitas',
                        'Tentang Kami' => '#tentang-kami',
                        'Layanan' => '#layanan',
                        'Paket Umroh' => '#paket-umroh',
                        'Testimoni' => '#testimoni',
                        'Dokumentasi' => '#dokumentasi',
                        'Artikel' => '#artikel',
                        'Konsultasi Gratis' => '#konsultasi',
                    ];
                @endphp

                @foreach ($navItems as $label => $href)
                    <a href="{{ $href }}"
                        class="text-sm font-medium text-gray-700 hover:text-gold transition-colors duration-200">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-emerald focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="p-6 flex flex-col h-full">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-emerald">Menu</h3>
                <button id="close-menu" class="text-emerald focus:outline-none">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <nav class="flex-grow space-y-4">
                @foreach ($navItems as $label => $href)
                    <a href="{{ $href }}"
                        class="block text-gray-700 hover:text-gold font-medium border-b border-gray-100 pb-2 transition-colors duration-200">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>

    <!-- Overlay -->
    <div id="menu-overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden lg:hidden"></div>
</header>
