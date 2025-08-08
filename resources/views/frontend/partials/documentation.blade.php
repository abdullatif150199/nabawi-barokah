<section id="dokumentasi" class="py-20 bg-gradient-to-b from-white via-gray-50 to-white">
    <div class="container mx-auto px-4" data-aos="fade-up" data-aos-duration="1200">
        <!-- Judul -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-emerald-700 mb-3">Dokumentasi</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Kumpulan dokumentasi perjalanan umroh yang telah dilaksanakan
            </p>
        </div>

        <!-- Swiper -->
        <div class="relative">
            <div class="swiper documentation-swiper">
                <div class="swiper-wrapper">
                    @foreach ($documentations as $documentation)
                        <div class="swiper-slide">
                            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 group">
                                <a href="{{ route('dokumentasi.detail', $documentation->slug) }}">
                                    <!-- Thumbnail -->
                                    <div class="aspect-w-16 aspect-h-10 bg-gray-200">
                                        <img src="{{ asset('storage/' . $documentation->img_thumb) }}" alt="{{ $documentation->title }}"
                                             class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-300">
                                    </div>

                                    <!-- Konten -->
                                    <div class="p-5">
                                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-emerald-700">
                                            {{ $documentation->title }}
                                        </h3>
                                        <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                            {{ Str::words(strip_tags($documentation->description), 15, '...') }}
                                        </p>
                                        <span class="inline-block text-emerald-700 font-medium hover:text-emerald-900 transition-colors duration-200">
                                            Baca Selengkapnya →
                                        </span>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- Navigasi -->
                <div class="swiper-button-next !text-emerald-700"></div>
                <div class="swiper-button-prev !text-emerald-700"></div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-6 !bottom-0"></div>
            </div>
        </div>
    </div>
</section>
@push('script')
<script>
    const documentationSwiper = new Swiper('.documentation-swiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            1024: { slidesPerView: 3 },
            768: { slidesPerView: 2 },
            0: { slidesPerView: 1 },
        },
    });
</script>
@endpush
