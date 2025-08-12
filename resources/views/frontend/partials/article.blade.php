<section id="artikel" class="py-16">
    <div class="container mx-auto px-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-emerald mb-4">Artikel & Berita</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Informasi terkini seputar umroh dan persiapan ibadah</p>
        </div>

        <!-- Swiper Container -->
        <div class="relative">
            <div class="swiper artikel-swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    @foreach ($articles as $article)
                        <div class="swiper-slide">
                            <article class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                                <a href="{{ route('artikel.detail', $article->slug) }}">
                                    <div class="h-48 bg-gray-200 bg-center bg-cover"
                                        style="background-image: url('{{ asset('storage/' . $article->img) }}');">
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold mb-3">{{ $article->title }}</h3>
                                        <p class="text-gray-600 mb-4">
                                            {{ Str::words(strip_tags($article->content), 15, '...') }}
                                        </p>
                                        <button class="text-emerald font-semibold hover:text-emerald-dark">
                                            Baca Selengkapnya →
                                        </button>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>

                {{-- <!-- Panah Navigasi -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}

                <!-- Pagination -->
                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>
    </div>
</section>


@push('script')
    <script>
        const artikelSwiper = new Swiper('.artikel-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                }
            }
        });
    </script>
@endpush
