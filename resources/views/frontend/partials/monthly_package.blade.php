<!-- Paket Umroh Bulan Ini -->
<section id="paket-umroh" class="py-20 bg-gradient-to-b from-white via-emerald-50 to-white">
    <div class="container mx-auto px-4">
        <!-- Title -->
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-emerald-700 mb-4">Paket Umroh Bulan Ini</h2>
            <p class="text-gray-700 text-lg max-w-2xl mx-auto">
                Pilihan paket terbaik dengan fasilitas lengkap untuk perjalanan spiritual Anda
            </p>
        </div>

        <!-- Swiper -->
        <div class="swiper mySwiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($packages as $package)
                    <div class="swiper-slide">
                        <div
                            class="bg-white text-gray-800 border border-emerald-100 rounded-2xl shadow-xl max-w-sm mx-auto transform transition-all hover:shadow-2xl hover:-translate-y-1 duration-300">

                            <!-- Header -->
                            <div class="bg-amber-500 text-white px-5 py-4">
                                <h3 class="text-lg font-bold uppercase tracking-wide">{{ $package->name }}</h3>
                                <p class="text-sm text-white/90 font-medium">
                                    {{ $package->duration ?? '-' }} • Berangkat
                                    {{ \Carbon\Carbon::parse($package->departure_date)->translatedFormat('d F Y') }}
                                </p>
                            </div>

                            <!-- Detail -->
                            <div class="p-6 space-y-4 text-sm text-gray-700">
                                @if ($package->airline)
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-plane text-emerald-600"></i>
                                        <span>Maskapai: {{ $package->airline }}</span>
                                    </div>
                                @endif
                                @if ($package->hotel_1)
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-hotel text-emerald-600"></i>
                                        <span>Hotel Madinah: {{ $package->hotel_1 }}</span>
                                    </div>
                                @endif
                                @if ($package->hotel_2)
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-building text-emerald-600"></i>
                                        <span>Hotel Mekkah: {{ $package->hotel_2 }}</span>
                                    </div>
                                @endif
                                @if ($package->ziarah)
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-map-marker-alt text-emerald-600"></i>
                                        <span>Ziarah: {{ $package->ziarah }}</span>
                                    </div>
                                @endif
                                @if ($package->acomodation)
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-bus text-emerald-600"></i>
                                        <span>Akomodasi: {{ $package->acomodation }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- CTA -->
                            <div class="p-6 pt-2">
                                <a href="https://wa.me/{{ $wa }}?text={{ urlencode('Assalamualaikum, saya tertarik dengan paket: ' . $package->name . '. Mohon info selengkapnya.') }}"
                                    target="_blank"
                                    class="block w-full text-center bg-gradient-to-r from-yellow-400 to-yellow-500 text-emerald-900 font-semibold py-2 rounded-lg hover:opacity-90 transition">
                                    Pilih Paket
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>

    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Swiper Init -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    1024: { slidesPerView: 3 },
                    768: { slidesPerView: 2 },
                    0: { slidesPerView: 1 }
                }
            });
        });
    </script>
</section>