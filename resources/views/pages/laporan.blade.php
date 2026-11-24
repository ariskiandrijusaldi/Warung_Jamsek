@extends('layouts.app', ['title' => 'Laporan Penjualan Harian - Warung Jamsek'])

@section('content')
<x-header-admin active="laporan" />

<main class="w-full pt-28 bg-surface flex-1 max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 pb-16">
    <!-- Top Header & Filter -->
    <section class="w-full pt-4 pb-6">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 mb-6">
            <div>
                <div class="flex items-center gap-2 mb-1.5">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-semibold">
                        <span class="material-symbols-outlined text-sm">analytics</span>
                        Rekapitulasi Penjualan Harian
                    </span>
                    <span class="text-xs text-outline">Shift 1 • Kasir: Siti Rahma</span>
                </div>
                <h1 class="text-2xl md:text-3xl text-on-surface font-bold tracking-tight">Laporan Omzet &amp; Transaksi</h1>
                <p class="text-xs text-on-surface-variant mt-0.5">Analisis pendapatan tunai, QRIS, performa menu terlaris, dan rincian waktu puncak.</p>
            </div>
            
            <div class="flex flex-wrap items-center gap-2">
                <div class="flex items-center gap-1 bg-surface-container-low px-3 py-1.5 rounded-xl text-xs text-on-surface">
                    <span class="material-symbols-outlined text-base text-primary">calendar_today</span>
                    <span class="font-semibold">Hari Ini (24 Nov 2026)</span>
                </div>
                <button type="button" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-surface-container-high hover:bg-surface-container-highest text-on-surface text-xs font-semibold transition-colors shadow-sm" onclick="alert('Mengekspor laporan ke format Excel / PDF...')">
                    <span class="material-symbols-outlined text-base">download</span>
                    Unduh Rekap (Excel)
                </button>
                <button type="button" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-primary hover:bg-primary-container text-on-primary text-xs font-bold shadow-md transition-all active:scale-95" onclick="window.print()">
                    <span class="material-symbols-outlined text-base">print</span>
                    Cetak Laporan Tutup Kasir
                </button>
            </div>
        </div>

        <!-- Bento Metric Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Omzet -->
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-outline mb-2">
                    <span class="text-xs uppercase tracking-wider font-semibold">Total Omzet Hari Ini</span>
                    <span class="material-symbols-outlined text-xl text-primary">payments</span>
                </div>
                <div class="flex items-baseline gap-1.5">
                    <span class="text-2xl font-bold text-primary">Rp 1.486.000</span>
                </div>
                <div class="mt-2 flex items-center gap-1 text-xs text-secondary font-semibold">
                    <span class="material-symbols-outlined text-xs">trending_up</span>
                    <span>+18.5% dari target harian</span>
                </div>
            </div>

            <!-- Total Transaksi -->
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-outline mb-2">
                    <span class="text-xs uppercase tracking-wider font-semibold">Total Transaksi</span>
                    <span class="material-symbols-outlined text-xl text-secondary">receipt_long</span>
                </div>
                <div class="flex items-baseline gap-1.5">
                    <span class="text-2xl font-bold text-on-surface">48</span>
                    <span class="text-xs text-outline">Nota</span>
                </div>
                <div class="mt-2 text-xs text-on-surface-variant">
                    Rata-rata: <strong class="text-on-surface">Rp 30.950</strong> / nota
                </div>
            </div>

            <!-- Metode QRIS vs Tunai -->
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-outline mb-2">
                    <span class="text-xs uppercase tracking-wider font-semibold">QRIS &amp; Transfer</span>
                    <span class="material-symbols-outlined text-xl text-tertiary">qr_code_scanner</span>
                </div>
                <div class="flex items-baseline gap-1.5">
                    <span class="text-2xl font-bold text-on-surface">68%</span>
                    <span class="text-xs text-outline">(Rp 1.010.000)</span>
                </div>
                <div class="mt-2 text-xs text-secondary font-semibold">
                    Tunai: 32% (Rp 476.000)
                </div>
            </div>

            <!-- Rata-rata Masak Dapur -->
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between text-outline mb-2">
                    <span class="text-xs uppercase tracking-wider font-semibold">Kecepatan Dapur</span>
                    <span class="material-symbols-outlined text-xl text-secondary">timer</span>
                </div>
                <div class="flex items-baseline gap-1.5">
                    <span class="text-2xl font-bold text-secondary">11.8</span>
                    <span class="text-xs text-outline">Menit / Pesanan</span>
                </div>
                <div class="mt-2 text-xs text-secondary font-semibold flex items-center gap-1">
                    <span class="material-symbols-outlined text-xs">verified</span>
                    <span>Pelayanan Sangat Cepat</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Two-Column Breakdown: Menu Terlaris & Rincian Pembayaran -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <!-- Menu Terlaris (7 Cols) -->
        <div class="lg:col-span-7 bg-surface-container-lowest p-6 rounded-2xl shadow-sm">
            <div class="flex items-center justify-between pb-3 mb-4 border-b border-surface-container-high">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">local_fire_department</span>
                    <h2 class="text-base font-bold text-on-surface">Menu Terlaris Hari Ini</h2>
                </div>
                <span class="text-xs text-outline">Berdasarkan Jumlah Porsi</span>
            </div>

            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-full bg-primary text-on-primary font-bold text-xs flex items-center justify-center">1</span>
                        <div>
                            <span class="text-xs font-bold text-on-surface block">Nila Sambal Pecak + Nasi</span>
                            <span class="text-[11px] text-outline">Kategori: New Menu • Terjual 19 Porsi</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-primary">Rp 342.000</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-full bg-primary-container text-on-primary-container font-bold text-xs flex items-center justify-center">2</span>
                        <div>
                            <span class="text-xs font-bold text-on-surface block">Ayam Sambal Hitam + Nasi</span>
                            <span class="text-[11px] text-outline">Kategori: Makanan • Terjual 16 Porsi</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-primary">Rp 288.000</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-full bg-surface-container-highest text-on-surface-variant font-bold text-xs flex items-center justify-center">3</span>
                        <div>
                            <span class="text-xs font-bold text-on-surface block">Jus Pokat (Alpukat)</span>
                            <span class="text-[11px] text-outline">Kategori: Minuman • Terjual 24 Gelas</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-primary">Rp 192.000</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-full bg-surface-container-highest text-on-surface-variant font-bold text-xs flex items-center justify-center">4</span>
                        <div>
                            <span class="text-xs font-bold text-on-surface block">Ayam Kremes + Nasi</span>
                            <span class="text-[11px] text-outline">Kategori: Makanan • Terjual 11 Porsi</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-primary">Rp 187.000</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-full bg-surface-container-highest text-on-surface-variant font-bold text-xs flex items-center justify-center">5</span>
                        <div>
                            <span class="text-xs font-bold text-on-surface block">Ceker Mercon [Only Kamis]</span>
                            <span class="text-[11px] text-outline">Kategori: Spesial • Terjual 14 Porsi</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-primary">Rp 140.000</span>
                </div>
            </div>
        </div>

        <!-- Rincian Kas Kasir & Shift (5 Cols) -->
        <div class="lg:col-span-5 flex flex-col gap-4">
            <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-surface-container-high">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">account_balance_wallet</span>
                        <h2 class="text-base font-bold text-on-surface">Rekap Uang di Laci Kasir</h2>
                    </div>
                    <span class="text-xs font-bold text-secondary bg-secondary-container px-2 py-0.5 rounded-full">Sesuai</span>
                </div>

                <div class="space-y-2.5 text-xs">
                    <div class="flex justify-between py-1 border-b border-surface-container-high/40">
                        <span class="text-on-surface-variant">Modal Awal Kasir:</span>
                        <span class="font-bold text-on-surface">Rp 200.000</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-surface-container-high/40">
                        <span class="text-on-surface-variant">Penerimaan Tunai:</span>
                        <span class="font-bold text-on-surface">Rp 476.000</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-surface-container-high/40">
                        <span class="text-on-surface-variant">Pengeluaran Kas Kecil (Es Batu):</span>
                        <span class="font-bold text-error">- Rp 25.000</span>
                    </div>
                    <div class="flex justify-between py-2 bg-surface-container p-2.5 rounded-xl mt-3">
                        <span class="font-bold text-on-surface">Total Fisik Uang di Laci:</span>
                        <span class="font-bold text-primary text-sm">Rp 651.000</span>
                    </div>
                </div>
            </div>

            <!-- Info Shift & Staff -->
            <div class="bg-surface-container-low p-4 rounded-xl flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img alt="Siti Rahma" class="w-10 h-10 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBb-sazlq3sH6GEbU-kL9M8pweOjmUuaSBdtusrm8iPRC3FoS_JoROtJxMnNJk6qHYVfs-kSlaOha-bgQHGAemwztwe_CraLQUloe4tTABWsw1O4RgJrfGRF969TW_Cq8QBBn-ZSoEZvMZaPVXi3FGHOSekobHRYsjRtGAhP4D5UpkHeGkISj9iV9tmmI2Sb7MbfBNbk8zWkYyHKuPU3Dt3iExH2-WKmu1BBVK9udc"/>
                    <div>
                        <span class="text-xs font-bold text-on-surface block">Kasir PJ: Siti Rahma</span>
                        <span class="text-[11px] text-outline">Shift 1 (08.00 - 16.00 WIB)</span>
                    </div>
                </div>
                <span class="text-xs px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-semibold">
                    Shift Aktif
                </span>
            </div>
        </div>
    </div>
</main>

<footer class="w-full bg-surface-container-low py-4 mt-9">
    <div class="max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-on-surface-variant">
        <div class="flex items-center gap-3">
            <span class="font-semibold text-on-surface">Warung Jamsek POS v2.4</span>
            <span>•</span>
            <span>Laporan Pembukuan Harian Terverifikasi</span>
        </div>
        <div>
            <span>Siti Rahma (Shift 1) • Terakhir diperbarui 5 menit lalu</span>
        </div>
    </div>
</footer>
@endsection
