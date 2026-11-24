@extends('layouts.app', ['title' => 'Kontak & Cabang Warung Jamsek'])

@section('content')
<x-header-customer />

<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 pb-16">
    <div class="py-6">
        <!-- Header Section -->
        <div class="max-w-2xl mb-8">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container text-xs font-bold mb-3">
                <span class="material-symbols-outlined text-sm">storefront</span>
                Warung Jamsek Nusantara
            </span>
            <h1 class="text-3xl md:text-4xl font-bold text-on-surface">Lokasi, Fasilitas &amp; Kontak Cabang</h1>
            <p class="text-xs md:text-sm text-on-surface-variant mt-2 leading-relaxed">
                Kunjungi gerai kami untuk santap di tempat (*dine-in*) hangat bersama keluarga, pesan nasi kotak untuk acara kantor, atau pesan antar ke rumah Anda.
            </p>
        </div>

        <!-- 2 Column Layout: Branch Info & Reservation Form -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Left Info (7 cols) -->
            <div class="lg:col-span-7 flex flex-col gap-6">
                <!-- Branch Card Utama -->
                <div class="bg-surface-container-lowest rounded-2xl p-6 shadow-sm border border-surface-container-high/60">
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span class="px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed text-xs font-bold">
                                Cabang Utama
                            </span>
                            <h2 class="text-xl font-bold text-on-surface mt-1">Warung Jamsek - Melati Surabaya</h2>
                            <p class="text-xs text-on-surface-variant mt-0.5">
                                Jl. Melati No. 14, RT 02/05, Gang Jamsek, dekat Masjid Al-Ikhlas, Surabaya.
                            </p>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span> Buka Hari Ini
                        </span>
                    </div>

                    <!-- Operational Hours -->
                    <div class="bg-surface-container-low rounded-xl p-4 mb-5 text-xs space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-on-surface-variant font-medium flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base text-tertiary">schedule</span>
                                Senin - Sabtu:
                            </span>
                            <span class="font-bold text-on-surface">08.00 - 21.00 WIB</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-on-surface-variant font-medium flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base text-tertiary">event_busy</span>
                                Minggu &amp; Hari Libur:
                            </span>
                            <span class="font-bold text-on-surface">09.00 - 18.00 WIB</span>
                        </div>
                    </div>

                    <!-- Facilities Grid -->
                    <h3 class="text-xs uppercase tracking-wider font-bold text-outline mb-3">Fasilitas Gerai</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-xs">
                        <div class="p-3 rounded-xl bg-surface-container-low flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-primary text-xl">ac_unit</span>
                            <span class="font-medium text-on-surface">Ruang Ber-AC</span>
                        </div>
                        <div class="p-3 rounded-xl bg-surface-container-low flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-secondary text-xl">wifi</span>
                            <span class="font-medium text-on-surface">WiFi 100 Mbps</span>
                        </div>
                        <div class="p-3 rounded-xl bg-surface-container-low flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-tertiary text-xl">mosque</span>
                            <span class="font-medium text-on-surface">Musholla Bersih</span>
                        </div>
                        <div class="p-3 rounded-xl bg-surface-container-low flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-primary text-xl">local_parking</span>
                            <span class="font-medium text-on-surface">Parkir Mobil &amp; Motor</span>
                        </div>
                        <div class="p-3 rounded-xl bg-surface-container-low flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-secondary text-xl">power</span>
                            <span class="font-medium text-on-surface">Stopkontak di Meja</span>
                        </div>
                        <div class="p-3 rounded-xl bg-surface-container-low flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-tertiary text-xl">payments</span>
                            <span class="font-medium text-on-surface">QRIS &amp; EDC Mandiri</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Form (Reservasi & Katering) (5 cols) -->
            <div class="lg:col-span-5 bg-surface-container-lowest rounded-2xl p-6 shadow-sm border border-surface-container-high/60">
                <div class="flex items-center gap-2 mb-4 pb-3 border-b border-surface-container-high">
                    <span class="material-symbols-outlined text-primary text-2xl">table_restaurant</span>
                    <div>
                        <h2 class="text-base font-bold text-on-surface">Reservasi Meja &amp; Katering</h2>
                        <span class="text-xs text-outline">Langsung terhubung ke WhatsApp Kasir</span>
                    </div>
                </div>

                <form class="space-y-4" onsubmit="event.preventDefault(); alert('Permintaan Anda diteruskan ke WhatsApp Kasir Warung Jamsek!'); window.open('https://wa.me/6281234567890?text=Halo%20Warung%20Jamsek,%20saya%20ingin%20reservasi%20meja%20/%20pesan%20katering');">
                    <div>
                        <label class="block text-xs font-semibold text-on-surface mb-1">Nama Lengkap</label>
                        <input type="text" required placeholder="Contoh: Budi Santoso" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-on-surface mb-1">Nomor WhatsApp</label>
                        <input type="tel" required placeholder="0812-xxxx-xxxx" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-on-surface mb-1">Keperluan</label>
                            <select class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20">
                                <option>Makan Siang Keluarga</option>
                                <option>Rombongan Kantor (VIP)</option>
                                <option>Pesanan Nasi Kotak / Katering</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-on-surface mb-1">Jumlah Orang</label>
                            <input type="number" min="1" value="4" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-on-surface mb-1">Tanggal &amp; Jam Kedatangan</label>
                        <input type="datetime-local" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-on-surface mb-1">Catatan Tambahan</label>
                        <textarea rows="2" placeholder="Permintaan khusus meja dekat jendela atau pilihan menu..." class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-full bg-primary hover:bg-primary-container text-on-primary text-xs font-bold shadow-md transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">send</span>
                        Kirim Reservasi ke WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
