@extends('layouts.app', ['title' => 'Lacak Status Pesanan - Warung Jamsek'])

@section('content')
<x-header-customer />

<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 pb-16">
    <div class="max-w-3xl mx-auto py-6">
        <!-- Breadcrumb & Top Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <a href="{{ url('/checkout') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-outline hover:text-primary mb-1 transition-colors">
                    <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali ke Checkout
                </a>
                <h1 class="text-2xl md:text-3xl font-bold text-on-surface">Pelacakan Pesanan Live</h1>
            </div>
            
            <!-- Ticket Search Form -->
            <div class="flex items-center gap-2">
                <div class="relative">
                    <input type="text" id="tracking-input" value="#WJ-8942" class="pl-3 pr-8 py-1.5 bg-surface-container-lowest text-on-surface text-xs font-mono font-bold rounded-lg border border-outline-variant/30 focus:outline-none focus:ring-1 focus:ring-primary shadow-xs w-36"/>
                </div>
                <button type="button" class="px-3.5 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-xs font-semibold transition-colors" onclick="alert('Memperbarui status tiket live...')">
                    Cari
                </button>
            </div>
        </div>

        <!-- Live Status Hero Card -->
        <div class="bg-surface-container-lowest rounded-2xl p-6 shadow-sm border border-surface-container-high/60 mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-surface-container-high">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xl font-bold text-primary font-mono">#WJ-8942</span>
                        <span class="px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-xs font-bold animate-pulse">
                            Sedang Diproses
                        </span>
                    </div>
                    <p class="text-xs text-on-surface-variant mt-1">
                        Atas Nama: <strong class="text-on-surface">Budi Santoso</strong> • WhatsApp: 0812-3456-7890
                    </p>
                </div>
                <div class="text-left sm:text-right">
                    <span class="text-xs text-outline block">Estimasi Makanan Tiba:</span>
                    <span class="text-xl font-bold text-secondary">15 - 20 Menit Lagi</span>
                </div>
            </div>

            <!-- Stepper Visual -->
            <div class="py-6">
                <div class="grid grid-cols-4 gap-2 relative text-center">
                    <!-- Progress Line -->
                    <div class="absolute left-8 right-8 top-5 h-1 bg-surface-container-highest z-0">
                        <div class="h-full bg-secondary transition-all w-2/4"></div>
                    </div>

                    <!-- Step 1: Diterima -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-bold text-xs shadow-sm mb-2">
                            <span class="material-symbols-outlined text-sm">done</span>
                        </div>
                        <span class="text-xs font-bold text-on-surface">Diterima</span>
                        <span class="text-[10px] text-outline">11:28 WIB</span>
                    </div>

                    <!-- Step 2: Dimasak -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-xs shadow-sm ring-4 ring-primary/20 mb-2">
                            <span class="material-symbols-outlined text-sm animate-spin">skillet</span>
                        </div>
                        <span class="text-xs font-bold text-primary">Dimasak</span>
                        <span class="text-[10px] text-primary font-semibold">11:32 WIB</span>
                    </div>

                    <!-- Step 3: Diantar Kurir -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-bold text-xs mb-2">
                            <span class="material-symbols-outlined text-sm">moped</span>
                        </div>
                        <span class="text-xs font-semibold text-outline">Diantar Kurir</span>
                        <span class="text-[10px] text-outline">Est. 11:45</span>
                    </div>

                    <!-- Step 4: Selesai -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-bold text-xs mb-2">
                            <span class="material-symbols-outlined text-sm">check_circle</span>
                        </div>
                        <span class="text-xs font-semibold text-outline">Tiba di Rumah</span>
                        <span class="text-[10px] text-outline">Est. 11:55</span>
                    </div>
                </div>
            </div>

            <!-- Courier & Delivery Info Strip -->
            <div class="bg-surface-container-low rounded-xl p-4 flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-xl">two_wheeler</span>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-on-surface block">Kurir Pengantar: Pak Slamet</span>
                        <span class="text-[11px] text-outline">Honda Vario Hitam (L 4920 BK)</span>
                    </div>
                </div>
                <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-secondary text-on-secondary text-xs font-bold shadow-xs hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-sm">chat</span> Hubungi Kurir
                </a>
            </div>
        </div>

        <!-- Order Items Detail & Delivery Address -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- Rincian Pesanan -->
            <div class="bg-surface-container-lowest rounded-2xl p-5 shadow-sm border border-surface-container-high/60">
                <h3 class="text-sm font-bold text-on-surface mb-3 flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-primary text-base">receipt</span> Rincian Hidangan
                </h3>
                <div class="space-y-2 text-xs">
                    <div class="flex justify-between py-1.5 border-b border-surface-container-high/60">
                        <span>1x Ayam Sambal Hitam + Nasi</span>
                        <span class="font-bold text-on-surface">Rp 18.000</span>
                    </div>
                    <div class="flex justify-between py-1.5 border-b border-surface-container-high/60">
                        <span>1x Nila Sambal Pecak + Nasi</span>
                        <span class="font-bold text-on-surface">Rp 18.000</span>
                    </div>
                    <div class="flex justify-between py-1.5 border-b border-surface-container-high/60">
                        <span>2x Jus Pokat (Alpukat Cokelat)</span>
                        <span class="font-bold text-on-surface">Rp 16.000</span>
                    </div>
                    <div class="flex justify-between py-1.5 border-b border-surface-container-high/60 text-outline">
                        <span>Ongkir Kurir Warung</span>
                        <span class="font-bold text-on-surface">Rp 8.000</span>
                    </div>
                    <div class="flex justify-between pt-2 text-sm font-bold">
                        <span>Total Pembayaran (QRIS):</span>
                        <span class="text-primary">Rp 64.000 (Lunas)</span>
                    </div>
                </div>
            </div>

            <!-- Alamat & Catatan -->
            <div class="bg-surface-container-lowest rounded-2xl p-5 shadow-sm border border-surface-container-high/60 flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-bold text-on-surface mb-3 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-secondary text-base">home_pin</span> Alamat Pengantaran
                    </h3>
                    <p class="text-xs text-on-surface-variant leading-relaxed">
                        Jl. Melati No. 14, RT 02/05, Gang Jamsek, dekat Masjid Al-Ikhlas, Surabaya.
                    </p>
                    <div class="mt-3 p-2.5 rounded-lg bg-surface-container-low text-xs text-tertiary">
                        <strong>Catatan Kurir:</strong> Pagar warna hitam, tolong titip security bila tidak ada orang.
                    </div>
                </div>

                <div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between">
                    <span class="text-xs text-outline">Pusat Bantuan Kasir:</span>
                    <a href="https://wa.me/6281234567890" class="text-xs font-bold text-primary hover:underline">
                        0812-3456-7890
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
