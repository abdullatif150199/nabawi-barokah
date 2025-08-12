@extends('frontend.layouts.main')

@section('content')
    @include('frontend.partials.hero_section')
    @include('frontend.partials.legalitas_section')
    @include('frontend.partials.aboutus_section')
    @include('frontend.partials.service_section')

    @if ($packages && $packages->isNotEmpty())
        @include('frontend.partials.monthly_package')
    @endif

    @if ($documentations && $documentations->isNotEmpty())
        @include('frontend.partials.documentation')
    @endif

    @if ($testimonials && $testimonials->isNotEmpty())
        @include('frontend.partials.testimonial')
    @endif

    @if ($articles && $articles->isNotEmpty())
        @include('frontend.partials.article')
    @endif

    @include('frontend.partials.consultation_section')
@endsection
