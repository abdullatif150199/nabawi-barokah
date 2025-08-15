<!-- Paket Umroh Bulan Ini -->
{{-- <section id="paket-umroh" class="py-20 bg-gradient-to-b from-white via-emerald-50 to-white">
    <div class="container mx-auto px-4">
        <!-- Title -->
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-emerald-700 mb-4">Paket Umroh Bulan Ini</h2>
            <p class="text-gray-700 text-lg max-w-2xl mx-auto">
                Pilihan paket terbaik dengan fasilitas lengkap untuk perjalanan spiritual Anda
            </p>
        </div>

        <!-- Swiper -->
        <div class="swiper packageSwiper" data-aos="fade-up" data-aos-delay="100">
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

            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>

    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Swiper Init -->

</section> --}}

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
        <div class="swiper packageSwiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($packages as $package)
                    <div class="swiper-slide">
                        <div
                            class="bg-white border border-emerald-100 rounded-2xl shadow-lg max-w-sm mx-auto flex flex-col overflow-hidden hover:shadow-2xl transition-all duration-300">

                            <!-- Header -->
                            <div class="bg-amber-500 text-white px-5 py-4">
                                <h3 class="text-lg font-bold uppercase tracking-wide">{{ $package->name }}</h3>
                                <p class="text-sm text-white/90 font-medium">
                                    {{ $package->duration ?? '-' }} • Berangkat
                                    {{ \Carbon\Carbon::parse($package->departure_date)->translatedFormat('d F Y') }}
                                </p>
                            </div>

                            <!-- Gambar -->
                            <div class="cursor-pointer overflow-hidden group"
                                onclick="openLightbox('{{ asset('storage/' . $package->image) }}', '{{ $package->detail ?? '' }}')">
                                <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}"
                                    class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>

                            <!-- Detail -->
                            <div class="p-6 space-y-3 text-sm text-gray-700 flex-1">
                                @if ($package->airline)
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-plane text-emerald-600 text-lg w-5 h-5 flex-shrink-0"></i>
                                        <div class="flex w-full">
                                            <span class="font-medium w-36 flex-shrink-0">Maskapai:</span>
                                            <span class="flex-1 ml-1">{{ $package->airline }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if ($package->hotel_1)
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-hotel text-emerald-600 text-lg w-5 h-5 flex-shrink-0"></i>
                                        <div class="flex w-full">
                                            <span class="font-medium w-36 flex-shrink-0">Hotel Madinah:</span>
                                            <span class="flex-1 ml-1">{{ $package->hotel_1 }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if ($package->hotel_2)
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-building text-emerald-600 text-lg w-5 h-5 flex-shrink-0"></i>
                                        <div class="flex w-full">
                                            <span class="font-medium w-36 flex-shrink-0">Hotel Mekkah:</span>
                                            <span class="flex-1 ml-1">{{ $package->hotel_2 }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if ($package->ziarah)
                                    <div class="flex items-start gap-3">
                                        <i
                                            class="fas fa-map-marker-alt text-emerald-600 text-lg w-5 h-5 flex-shrink-0"></i>
                                        <div class="flex w-full">
                                            <span class="font-medium w-36 flex-shrink-0">Ziarah:</span>
                                            <span class="flex-1 ml-1">{{ $package->ziarah }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if ($package->acomodation)
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-bus text-emerald-600 text-lg w-5 h-5 flex-shrink-0"></i>
                                        <div class="flex w-full">
                                            <span class="font-medium w-36 flex-shrink-0">Akomodasi:</span>
                                            <span class="flex-1 ml-1">{{ $package->acomodation }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- CTA -->
                            <div class="p-6 pt-0">
                                @if ($package->price)
                                    <p class="text-2xl font-bold text-center text-emerald mb-2">
                                        Rp {{ number_format($package->price, 0, ',', '.') }}
                                    </p>
                                @endif
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

            <div class="swiper-pagination mt-4"></div>
        </div>

    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox"
        class="hidden fixed inset-0 bg-black/80 z-50 flex items-center justify-center p-4 overflow-auto">
        <div class="relative bg-white rounded-xl shadow-2xl overflow-hidden max-w-[450px] w-full mt-10">

            <!-- Tombol Close -->
            <button onclick="closeLightbox()"
                class="absolute top-2 right-2 bg-white hover:bg-gray-200 text-gray-800 rounded-full w-10 h-10 flex items-center justify-center shadow-lg text-2xl font-bold transition z-10">
                &times;
            </button>

            <!-- Konten -->
            <div class="flex flex-col items-center">
                <!-- Gambar -->
                <img id="lightboxImage" src="" alt="Paket Umroh"
                    class="w-auto max-w-full max-h-[75vh] object-contain mx-auto rounded-lg shadow-md">

                <!-- Deskripsi -->
                <div class="w-full p-4 max-h-[25vh] overflow-y-auto border-t border-gray-200">
                    <article id="lightboxDesc" class="text-gray-700 text-sm leading-relaxed"></article>
                </div>
            </div>
        </div>
    </div>






</section>





@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".packageSwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 3
                    },
                    768: {
                        slidesPerView: 2
                    },
                    0: {
                        slidesPerView: 1
                    }
                }
            });
        });
    </script>

    <script>
        function openLightbox(imageSrc, description) {
            document.getElementById('lightboxImage').src = imageSrc;
            document.getElementById('lightboxDesc').innerHTML = description || '';
            document.getElementById('lightbox').classList.remove('hidden');
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
        }
    </script>
@endpush
