@push('style')
<style>

    #hero {
        background-image: url('{{ asset('backend-assets/images/hero-mobile.png') }}');
    }

    @media (min-width: 768px) {
        #hero {
            background-image: url('{{ asset('backend-assets/images/hero.jpg') }}');
        }
    }
</style>

@endpush
<!-- Hero Section -->
<section id="hero" class="hero-bg min-h-screen flex items-center bg-cover bg-center bg-no-repeat">
    <div class="container mx-auto px-4 text-center text-gold hero-content" data-aos="fade-up" data-aos-duration="1500">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight text-gray-800">
            Umroh Amanah & Eksklusif<br>
            <span class="text-gold">Bersama Nabawi Barokah</span>
        </h1>

        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-black">
            Private Umrah 12 Jamaah, Pelayanan Khusyuk & Nyaman
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/{{$wa}}" target="_blank"
                class="bg-emerald hover:bg-emerald-dark text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 flex items-center justify-center transform hover:scale-105">
                <i class="fab fa-whatsapp mr-2"></i>
                Konsultasi WhatsApp
            </a>
            {{-- <a href="#jadwal"
                class="bg-gold hover:bg-yellow-600 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105">
                Lihat Jadwal
            </a> --}}
        </div>
    </div>
</section>
