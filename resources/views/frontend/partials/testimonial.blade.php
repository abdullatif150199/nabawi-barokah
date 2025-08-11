@push('style')
    <style>
        .star-full {
            color: #f5b50a;

        }

        .star-empty {
            color: #cfcfcf;

        }
    </style>
@endpush

<section id="testimoni" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-emerald mb-4">Testimoni</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Pengalaman jamaah yang telah merasakan pelayanan terbaik kami</p>
        </div>

        <!-- Swiper Container -->
        <div class="relative">
            <div class="swiper mySwiperDokumentasi">
                <div class="swiper-wrapper">

                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover p-6 text-center">

                                <div class="flex justify-center mb-4">
                                    <img src="{{ asset('storage/' . $testimonial->img) }}"
                                        alt="{{ $testimonial->user }}"
                                        class="w-32 h-32 rounded-full object-cover border-4 border-emerald-500 shadow-md">
                                </div>

                                <div class="flex justify-center mt-3 mb-5">
                                    {{-- Bintang penuh sesuai rating --}}
                                    @for ($i = 1; $i <= $testimonial->rating; $i++)
                                        <i class="fa-solid fa-star star star-full" aria-hidden="true"></i>
                                    @endfor

                                    {{-- Bintang kosong untuk sisanya --}}
                                    @for ($i = $testimonial->rating + 1; $i <= 5; $i++)
                                        <i class="fa-regular fa-star star star-empty" aria-hidden="true"></i>
                                    @endfor
                                </div>

                                <p class="text-gray-600 italic mb-3">
                                    "{{ $testimonial->content }}"
                                </p>
                                <p class="font-semibold text-emerald">
                                    - {{ $testimonial->user }}
                                </p>

                            </div>
                        </div>
                    @endforeach


                    <!-- Slide 2 -->




                    <!-- Tambah slide jika perlu -->
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-6"></div>
            </div>

            <!-- Navigasi panah -->
            <div class="swiper-button-next text-emerald"></div>
            <div class="swiper-button-prev text-emerald"></div>
        </div>
    </div>
</section>

@push('script')
    <script>
        var swiperDokumentasi = new Swiper(".mySwiperDokumentasi", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
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
