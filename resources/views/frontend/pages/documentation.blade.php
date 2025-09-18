@extends('frontend.layouts.main')

@section('title', $documentation->title . ' | Nabawi Barokah')
@section('meta_description', Str::limit(strip_tags($documentation->description??''), 160, '...'))
@section('meta_keywords', $documentation->title . ', umroh, haji, travel umroh, nabawi barokah')

@section('content')
    {{-- <section class="py-16 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4 relative">

            <!-- Judul dan Info -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-emerald-800 mb-3">{{ $documentation->title }}</h1>
                <p class="text-emerald-700 font-semibold italic tracking-wide flex items-center justify-center gap-2">
                    <span class="underline decoration-dotted underline-offset-4">Nabawi Barokah</span>
                </p>
            </div>


            <div class="bg-white rounded-xl shadow-lg p-8 relative z-10">
                <div class="absolute top-0 -left-8 w-2 h-full bg-emerald-700 rounded-r-lg hidden lg:block"></div>


                <div class="relative rounded-xl overflow-hidden shadow-lg mb-10">
                    <img id="mainImage" src="{{ asset('storage/' . $documentation->img_thumb) }}" alt="Gambar Utama"
                        class="w-full h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                </div>

                <!-- Thumbnail Galeri -->
                <div class="grid grid-cols-3 md:grid-cols-5 gap-4 mt-3">
                    @foreach ($documentation->images as $image)
                        <img src="{{ asset('storage/' . $image->url) }}"
                            class="thumbnail cursor-pointer rounded-lg shadow-md hover:scale-105 transition" alt="thumb">
                    @endforeach
                </div>

                <!-- Deskripsi -->
                <p class="mb-6 text-gray-800 leading-relaxed mt-6">
                    {!! $documentation->description !!}
                </p>

                <div class="mt-8 text-center">
                    <a href="{{ route('home') }}"
                        class="inline-block px-6 py-3 bg-emerald-700 text-white font-semibold rounded-lg shadow-md hover:bg-emerald-800 transition">
                        << Kembali ke Beranda </a>
                </div>


            </div>

            <!-- Hiasan Estetik Samping -->
            <div class="hidden lg:block absolute left-0 top-1/2 transform -translate-y-1/2">
                <div class="w-6 h-6 bg-emerald-600 rounded-full shadow-lg mb-2"></div>
                <div class="w-4 h-4 bg-emerald-400 rounded-full shadow-lg mb-2"></div>
                <div class="w-2 h-2 bg-emerald-300 rounded-full shadow-lg"></div>
            </div>

            <div class="hidden lg:block absolute right-0 top-1/2 transform -translate-y-1/2">
                <div class="w-6 h-6 bg-emerald-600 rounded-full shadow-lg mb-2"></div>
                <div class="w-4 h-4 bg-emerald-400 rounded-full shadow-lg mb-2"></div>
                <div class="w-2 h-2 bg-emerald-300 rounded-full shadow-lg"></div>
            </div>
        </div>
    </section> --}}

    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">

            <!-- Judul Artikel -->
            <header class="mb-8 text-center">
                <h1 class="text-3xl md:text-5xl font-extrabold text-emerald-900 leading-tight">
                    {{ $documentation->title }}
                </h1>
                <p class="mt-3 text-gray-600 text-sm md:text-base">
                    Diposting oleh
                    <span class="font-semibold text-emerald-700">Admin Nabawi Barokah</span>
                    &bull; {{ \Carbon\Carbon::parse($documentation->created_at)->format('d F Y') }}
                </p>
            </header>



            <div class="relative rounded-xl overflow-hidden shadow-lg mb-10">
                <img id="mainImage" src="{{ asset('storage/' . $documentation->img_thumb) }}" alt="Gambar Utama"
                    class="w-full h-72 lg:h-95 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
            </div>

            <div class="grid grid-cols-3 md:grid-cols-5 gap-4 mt-3">
                @foreach ($documentation->images as $image)
                    <img src="{{ asset('storage/' . $image->url) }}"
                        class="thumbnail cursor-pointer rounded-lg shadow-md hover:scale-105 transition" alt="thumb">
                @endforeach
            </div>


            <article class="prose prose-emerald max-w-none mx-auto text-gray-800 leading-relaxed mt-5">
                {!! $documentation->description !!}
            </article>


            <div class="mt-8 text-center">
                <a href="{{ route('home') }}"
                    class="inline-block px-6 py-3 bg-emerald-700 text-white font-semibold rounded-lg shadow-md hover:bg-emerald-800 transition">
                    << Kembali ke Beranda </a>
            </div>

        </div>
    </section>

    @include('frontend.partials.documentation')
@endsection

@push('script')
    <script>
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', () => {
                const newSrc = thumbnail.getAttribute('src');
                mainImage.setAttribute('src', newSrc);
            });
        });
    </script>
@endpush
