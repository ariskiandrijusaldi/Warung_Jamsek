@extends('layouts.app', ['title' => 'Tiket Pesanan #WJ-8942 - Warung Jamsek'])

@section('content')
<x-header-customer />

<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 pb-16">
    <div class="max-w-xl mx-auto py-8">
        <!-- Success Animation & Badge -->
        <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-8 shadow-sm border border-surface-container-high/60 text-center flex flex-col items-center">
            <div class="w-16 h-16 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center mb-4 shadow-sm animate-bounce">
                <span class="material-symbols-outlined text-3xl">check_circle</span>
            </div>
            
            <span class="px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed text-xs font-bold mb-2">
                Pesanan Berhasil Masuk ke Dapur
            </span>
            <h1 class="text-2xl font-bold text-on-surface">Terima Kasih, Budi!</h1>
            <p class="text-xs text-on-surface-variant mt-1.5 leading-relaxed max-w-md">
                Tiket pesanan <strong class="text-primary font-mono font-bold">#WJ-8942</strong> telah otomatis dicetak ke thermal printer kasir &amp; koki dapur Warung Jamsek siap memasak hidangan panas Anda.
            </p>

            <!-- Digital Invoice Slip (E-Receipt Box) -->
            <div class="w-full bg-surface-container-low rounded-2xl p-5 my-6 text-left text-xs space-y-3 border border-outline-variant/30">
                <div class="flex items-center justify-between pb-3 border-b border-outline-variant/30">
                    <div>
                        <span class="text-[11px] text-outline block">Nomor Nota Tiket:</span>
                        <span class="font-bold text-sm text-on-surface font-mono">#WJ-8942</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[11px] text-outline block">Waktu Pesan:</span>
                        <span class="font-semibold text-on-surface">Hari Ini • 11:28 WIB</span>
                    </div>
                </div>

                <!-- Items list -->
                <div class="space-y-1.5">
                    <div class="flex justify-between">
                        <span>1x Ayam Sambal Hitam + Nasi (Sambal Pisah)</span>
                        <span class="font-bold text-on-surface">Rp 18.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>1x Nila Sambal Pecak + Nasi (Level 2)</span>
                        <span class="font-bold text-on-surface">Rp 18.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>2x Jus Pokat (Topping Chocochips)</span>
                        <span class="font-bold text-on-surface">Rp 20.000</span>
                    </div>
                    <div class="flex justify-between text-outline">
                        <span>Ongkir Kurir Warung Jamsek</span>
                        <span>Rp 8.000</span>
                    </div>
                </div>

                <!-- Total -->
                <div class="pt-3 border-t border-outline-variant/30 flex items-center justify-between">
                    <div>
                        <span class="text-outline block text-[11px]">Metode Pembayaran:</span>
                        <span class="font-bold text-secondary">QRIS Instan (Lunas)</span>
                    </div>
                    <div class="text-right">
                        <span class="text-outline block text-[11px]">Total Tagihan:</span>
                        <span class="text-base font-bold text-primary">Rp 64.000</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="w-full space-y-2.5">
                <a href="{{ url('/cek-pesanan') }}" class="w-full py-3 px-4 rounded-full bg-primary hover:bg-primary-container text-on-primary text-xs font-bold shadow-md transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">moped</span>
                    Lacak Status Antrean &amp; Kurir
                </a>
                
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" class="py-2.5 px-3 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface text-xs font-semibold transition-colors flex items-center justify-center gap-1.5 shadow-xs" onclick="window.print()">
                        <span class="material-symbols-outlined text-sm">print</span> Cetak Struk
                    </button>
                    <a href="https://wa.me/6281234567890" target="_blank" class="py-2.5 px-3 rounded-full bg-secondary-container hover:bg-secondary-fixed text-on-secondary-container text-xs font-semibold transition-colors flex items-center justify-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-sm">chat</span> Konfirmasi WA
                    </a>
                </div>

                <a href="{{ url('/menu-katalog') }}" class="inline-block text-xs font-semibold text-outline hover:text-primary transition-colors pt-2">
                    Pesan Menu Lainnya &rarr;
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
