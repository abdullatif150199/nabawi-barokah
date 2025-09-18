@extends('frontend.layouts.main')

@section('title', $article->title . ' | Nabawi Barokah')
@section('meta_description', Str::limit(strip_tags($article->content), 160, '...'))
@section('meta_keywords', $article->title . ', umroh, haji, travel umroh, nabawi barokah')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">

            <!-- Judul Artikel -->
            <header class="mb-8 text-center">
                <h1 class="text-3xl md:text-5xl font-extrabold text-emerald-900 leading-tight">
                    {{ $article->title }}
                </h1>
                <p class="mt-3 text-gray-600 text-sm md:text-base">
                    Diposting oleh
                    <span class="font-semibold text-emerald-700">Admin Nabawi Barokah</span>
                    &bull; {{ \Carbon\Carbon::parse($article->created_at)->format('d F Y') }}
                </p>
            </header>


            <!-- Banner Gambar -->
            @if ($article->img)
                <figure class="mb-10 rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->title }}"
                        class="w-full h-72 object-cover object-center">
                    <figcaption class="sr-only">{{ $article->title }}</figcaption>
                </figure>
            @endif

            <!-- Konten Artikel -->
            <article class="prose prose-emerald max-w-none mx-auto text-gray-800 leading-relaxed">
                {!! $article->content !!}
            </article>

            <div class="mt-8 text-center">
                <a href="{{ route('home') }}"
                    class="inline-block px-6 py-3 bg-emerald-700 text-white font-semibold rounded-lg shadow-md hover:bg-emerald-800 transition">
                    << Kembali ke Beranda </a>
            </div>
        </div>
    </section>


    @include('frontend.partials.article')
@endsection
