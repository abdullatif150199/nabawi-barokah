@extends('frontend.layouts.main')

@section('content')
    <section class="py-16 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4 relative">

            <!-- Judul dan Info -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-emerald-800 mb-3">{{ $documentation->title }}</h1>
                <p class="text-emerald-700 font-semibold italic tracking-wide flex items-center justify-center gap-2">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 4v6m0 0h-4m4 0h4" />
                    </svg> --}}
                    <span class="underline decoration-dotted underline-offset-4">Nabawi Barokah</span>
                </p>
            </div>


            <!-- Konten Dokumentasi -->
            <div class="bg-white rounded-xl shadow-lg p-8 relative z-10">
                <div class="absolute top-0 -left-8 w-2 h-full bg-emerald-700 rounded-r-lg hidden lg:block"></div>

                <!-- Gambar Utama -->
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
                <!-- Tombol Kembali -->
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
