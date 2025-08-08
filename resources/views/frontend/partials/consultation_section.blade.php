<!-- Konsultasi Gratis -->
<section id="konsultasi" class="py-20 bg-green-300 text-white">
    <div class="container mx-auto px-4" data-aos="fade-up" data-aos-duration="1200">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold mb-4">Konsultasi Gratis</h2>
                <p class=" text-lg">
                    Langsung bersama tim <strong>Nabawi Barokah</strong> untuk memilih paket terbaik sesuai kebutuhan
                    Anda
                </p>
            </div>


            <!-- Form Card -->
            <div class="bg-white text-gray-800 rounded-2xl shadow-lg p-8 md:p-10">
                <form action="{{ route('applicants.store') }}" method="POST"
                    class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="col-span-1">
                        <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="name"
                            class="w-full px-5 py-3 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-green-400 focus:outline-none"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <!-- Nomor WhatsApp -->
                    <div class="col-span-1">
                        <label class="block text-sm font-medium mb-2">Nomor WhatsApp</label>
                        <input type="tel" name="wa"
                            class="w-full px-5 py-3 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-green-400 focus:outline-none"
                            placeholder="08xxxxxxxxxx" required>
                    </div>

                    <!-- Pilihan Paket -->
                    <div class="col-span-1 sm:col-span-2">
                        <label class="block text-sm font-medium mb-2">Pilihan Paket</label>
                        <select name="package_id"
                            class="w-full px-5 py-3 border border-gray-300 rounded-full shadow-sm bg-white focus:ring-2 focus:ring-green-400 focus:outline-none"
                            required>
                            <option value="">Pilih paket yang diminati</option>
                            @foreach ($packageLists as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pesan Opsional -->
                    <div class="col-span-1 sm:col-span-2">
                        <label class="block text-sm font-medium mb-2">Pesan (Opsional)</label>
                        <textarea name="message"
                            class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm resize-none focus:ring-2 focus:ring-green-400 focus:outline-none"
                            rows="4" placeholder="Tuliskan pertanyaan atau kebutuhan khusus Anda"></textarea>
                    </div>

                    <!-- Tombol -->
                    <div class="col-span-1 sm:col-span-2 text-center">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-semibold text-lg shadow-md transition-all duration-300 inline-flex items-center">
                            <i class="fab fa-whatsapp mr-2 text-xl"></i>
                            Kirim Konsultasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>