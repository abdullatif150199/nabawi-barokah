<!-- About Us Section -->
<section id="tentang-kami" class="py-20 bg-white">
    <div class="container mx-auto px-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Visual/Ilustrasi Section -->


            <div class="relative w-full h-[400px] bg-gray-100 rounded-2xl shadow-lg overflow-hidden fade-in-left">
                <!-- Gambar Full -->
                <img src="{{ asset('backend-assets/images/team.jpeg') }}" alt="Tim Nabawi Barokah"
                    class="absolute inset-0 w-full h-full object-cover">

                {{-- <!-- Overlay hitam transparan biar teks lebih jelas -->
                <div class="absolute inset-0 bg-black bg-opacity-40"></div> --}}

                <!-- Konten di tengah -->
                {{-- <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
                    <p class="font-medium text-lg">Tim Nabawi Barokah</p>
                </div> --}}

                <!-- Label di pojok -->
                <div class="absolute bottom-0 right-0 bg-emerald text-white text-xs px-3 py-1 rounded-tl-lg z-10">
                    +12 Tahun Pengalaman
                </div>
            </div>


            <!-- Content Section -->
            <div class="fade-in-right">
                <h2 class="text-4xl font-bold text-emerald mb-6">Tentang <span class="text-gold">Nabawi Barokah</span>
                </h2>
                <p class="text-gray-700 text-lg leading-relaxed mb-8">
                    Kami hadir untuk memberikan pelayanan umroh terbaik dengan mengutamakan kenyamanan,
                    keamanan, dan kepuasan jamaah. Dengan pengalaman bertahun-tahun, kami berkomitmen
                    memberikan pengalaman spiritual yang <span class="font-semibold text-emerald">tak terlupakan</span>.
                </p>

                <!-- Value Icons -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Amanah -->
                    <div class="text-center">
                        <div
                            class="w-14 h-14 bg-emerald rounded-full flex items-center justify-center mx-auto mb-3 shadow-md">
                            <i class="fas fa-handshake text-white text-lg"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Amanah</h3>
                    </div>

                    <!-- Profesional -->
                    <div class="text-center">
                        <div
                            class="w-14 h-14 bg-gold rounded-full flex items-center justify-center mx-auto mb-3 shadow-md">
                            <i class="fas fa-star text-white text-lg"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Profesional</h3>
                    </div>

                    <!-- Terpercaya -->
                    <div class="text-center">
                        <div
                            class="w-14 h-14 bg-emerald rounded-full flex items-center justify-center mx-auto mb-3 shadow-md">
                            <i class="fas fa-heart text-white text-lg"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Terpercaya</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
