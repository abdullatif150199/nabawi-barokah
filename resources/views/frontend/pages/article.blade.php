@extends('frontend.layouts.main')

@section('content')
    <section class="py-16 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4 relative">

            <!-- Judul dan Info Penulis -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-emerald-800 mb-3">{{ $article->title }}</h1>
                <p class="text-gray-500">
                    Diposting oleh <span class="text-emerald-700 font-semibold">Admin Nabawi Barokah</span> |
                    {{ \Carbon\Carbon::parse($article->created_at)->format('d F Y') }}
                </p>
            </div>

            <!-- Konten Artikel -->
            <div class="bg-white rounded-xl shadow-lg p-8 leading-relaxed text-gray-800 relative z-10">
                <div class="absolute top-0 -left-8 w-2 h-full bg-emerald-700 rounded-r-lg hidden lg:block"></div>

                <!-- Banner Gambar -->
                @if ($article->img)
                    <div class="relative rounded-xl overflow-hidden shadow-lg mb-10">
                        <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->title }}"
                            class="w-full h-80 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                    </div>
                @endif

                <p class="my-5">
                    {!! $article->content !!}
                </p>

                <div class="mt-8 text-center">
                    <a href="{{ route('home') }}"
                        class="inline-block px-6 py-3 bg-emerald-700 text-white font-semibold rounded-lg shadow-md hover:bg-emerald-800 transition">
                        &laquo; Kembali ke Beranda
                    </a>
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

    @include('frontend.partials.article')
@endsection
