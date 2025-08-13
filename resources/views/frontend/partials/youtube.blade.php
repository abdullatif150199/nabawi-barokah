@php
// Helper aman: dukung URL watch?v=, youtu.be/, /shorts/, /embed/, dan <iframe ...>
if (!function_exists('getYoutubeIdFromInput')) {
    function getYoutubeIdFromInput($input) {
        $url = trim($input);

        // Jika input adalah iframe, ambil src-nya
        if (preg_match('/<iframe[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $url, $m)) {
            $url = $m[1];
        }

        // Normalisasi entity (&amp; dll)
        $url = html_entity_decode($url);

        // 1) youtu.be/ID
        if (preg_match('~youtu\.be/([A-Za-z0-9_-]{6,})~', $url, $m)) {
            return $m[1];
        }

        // 2) youtube.com/shorts/ID atau /embed/ID
        if (preg_match('~youtube\.com/(?:shorts|embed)/([A-Za-z0-9_-]{6,})~', $url, $m)) {
            return $m[1];
        }

        // 3) watch?v=ID (atau query param v)
        $parts = parse_url($url);
        if (!empty($parts['query'])) {
            parse_str($parts['query'], $qs);
            if (!empty($qs['v'])) {
                return $qs['v'];
            }
        }

        return null;
    }
}
@endphp

<section id="youtube-videos" class="py-16">
    <div class="container mx-auto px-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-emerald-700 mb-4">YouTube Videos</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Koleksi Video Testimoni & Perjalanan Ibadah Umroh</p>
        </div>

        <div class="swiper youtube-swiper">
            <div class="swiper-wrapper">
                @foreach ($videos as $video)
                    @php $videoId = getYoutubeIdFromInput($video->url); @endphp

                    <div class="swiper-slide">
                        <article class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
                            {{-- Fallback aspect-ratio agar aman walau plugin Tailwind belum aktif --}}
                            <div class="w-full" style="aspect-ratio: 16 / 9;">
                                @if ($videoId)
                                    <iframe
                                        class="w-full h-full"
                                        src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&autoplay=0"
                                        title="{{ $video->title }}"
                                        loading="lazy"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin"
                                        allowfullscreen>
                                    </iframe>
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                        <p class="p-4 text-center text-red-600">URL YouTube tidak valid</p>
                                    </div>
                                @endif
                            </div>

                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <h3 class="text-xl font-semibold mb-3">{{ $video->title }}</h3>
                                <p class="text-gray-600 text-sm flex-grow">
                                    {{ \Illuminate\Support\Str::words(strip_tags($video->description), 15, '...') }}
                                </p>
                                <a
                                    href="{{ $videoId ? 'https://www.youtube.com/watch?v='.$videoId : $video->url }}"
                                    target="_blank" rel="noopener"
                                    class="mt-4 inline-block text-emerald-700 font-semibold hover:text-emerald-900">
                                    Tonton di YouTube →
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination mt-6"></div>
        </div>
    </div>
</section>

@push('script')
<script>
    const totalSlides = {{ $videos->count() ?? 0 }};
    const youtubeSwiper = new Swiper('.youtube-swiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: totalSlides > 3,
        speed: 1000,
        // autoplay opsional:
        // autoplay: { delay: 3000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
        breakpoints: {
            1024: { slidesPerView: 3 },
            768:  { slidesPerView: 2 },
            0:    { slidesPerView: 1 },
        }
    });
</script>
@endpush
