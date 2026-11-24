@extends('layouts.app', ['title' => 'Daftar Pesanan & Antrean Dapur - Warung Jamsek'])

@section('content')
<x-header-admin active="orders" />

<main class="w-full pt-28 bg-surface flex-1 max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10">
<div class="flex flex-col w-full pb-16">
<!-- Top Ambient Banner & Realtime Metric Stats -->
<section class="w-full pt-4 pb-6">
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-6">
<div>
<div class="flex items-center gap-2 mb-1.5">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-primary/10 text-primary font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
            Kitchen Display &amp; Antrean Kasir
          </span>
<span class="font-label-sm text-label-sm text-outline">Pembaruan otomatis 10 dtk</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Daftar Antrean &amp; Tiket Pesanan</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">Pantau status pesanan dapur, kurir pengantaran, dan verifikasi pelunasan secara real-time.</p>
</div>
<div class="flex flex-wrap items-center gap-2.5">
<button class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors shadow-sm" id="btn-sound-toggle" onclick="toggleKitchenSound()" type="button">
<span class="material-symbols-outlined text-base text-primary" id="sound-icon">volume_up</span>
<span id="sound-text">Lonceng Dapur: Nyala</span>
</button>
<button class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md text-label-md transition-colors shadow-sm" onclick="refreshOrders()" type="button">
<span class="material-symbols-outlined text-base">refresh</span>
          Segarkan Data
        </button>
<button class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md shadow-md transition-all active:scale-95" type="button">
<span class="material-symbols-outlined text-base">add</span>
          Buat Pesanan Baru
        </button>
</div>
</div>
<!-- Metrics Bento Row -->
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3.5">
<!-- Total Pesanan -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between group hover:shadow-md transition-all">
<div class="flex items-center justify-between text-outline">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Total Hari Ini</span>
<span class="material-symbols-outlined text-lg text-outline">receipt_long</span>
</div>
<div class="mt-3 flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">48</span>
<span class="font-label-sm text-label-sm text-outline">Tiket</span>
</div>
<div class="mt-1 flex items-center gap-1 font-label-sm text-label-sm text-secondary">
<span class="material-symbols-outlined text-xs">trending_up</span>
<span>+14% vs kemarin</span>
</div>
</div>
<!-- Menunggu Dapur -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between group hover:shadow-md transition-all relative overflow-hidden">
<div class="absolute top-0 left-0 right-0 h-1 bg-tertiary"></div>
<div class="flex items-center justify-between text-tertiary">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Menunggu Dapur</span>
<span class="material-symbols-outlined text-lg">hourglass_top</span>
</div>
<div class="mt-3 flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-tertiary">4</span>
<span class="font-label-sm text-label-sm text-tertiary/70">Pesanan</span>
</div>
<div class="mt-1 font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
          Perlu konfirmasi koki
        </div>
</div>
<!-- Sedang Dimasak -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between group hover:shadow-md transition-all relative overflow-hidden">
<div class="absolute top-0 left-0 right-0 h-1 bg-primary"></div>
<div class="flex items-center justify-between text-primary">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Sedang Dimasak</span>
<span class="material-symbols-outlined text-lg">skillet</span>
</div>
<div class="mt-3 flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-primary">5</span>
<span class="font-label-sm text-label-sm text-primary/70">Wajan Aktif</span>
</div>
<div class="mt-1 font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-xs text-primary">schedule</span>
          Rata-rata 12 Menit
        </div>
</div>
<!-- Siap Diantar / Saji -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between group hover:shadow-md transition-all relative overflow-hidden">
<div class="absolute top-0 left-0 right-0 h-1 bg-secondary"></div>
<div class="flex items-center justify-between text-secondary">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Siap Saji / Antar</span>
<span class="material-symbols-outlined text-lg">room_service</span>
</div>
<div class="mt-3 flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-secondary">3</span>
<span class="font-label-sm text-label-sm text-secondary/70">Pesanan</span>
</div>
<div class="mt-1 font-label-sm text-label-sm text-secondary flex items-center gap-1 font-semibold">
<span class="material-symbols-outlined text-xs">local_shipping</span>
          Kurir standby
        </div>
</div>
<!-- Selesai -->
<div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm flex flex-col justify-between group hover:shadow-md transition-all col-span-2 sm:col-span-1">
<div class="flex items-center justify-between text-outline">
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Terselesaikan</span>
<span class="material-symbols-outlined text-lg text-secondary">check_circle</span>
</div>
<div class="mt-3 flex items-baseline gap-1.5">
<span class="font-headline-lg text-headline-lg font-bold text-on-surface">36</span>
<span class="font-label-sm text-label-sm text-outline">Pesanan</span>
</div>
<div class="mt-1 font-label-sm text-label-sm text-outline">
          Total Omzet: <span class="text-on-surface font-semibold">Rp 1.420.000</span>
</div>
</div>
</div>
</section>
<!-- Filter Controls & Search -->
<section class="w-full flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
<!-- Filter Tabs (Pill style) -->
<div class="flex items-center gap-1.5 bg-surface-container p-1 rounded-full overflow-x-auto no-scrollbar shadow-inner">
<button class="filter-tab px-4 py-1.5 rounded-full font-label-md text-label-md transition-all bg-primary-container text-on-primary-container font-semibold shadow-sm" onclick="setFilter('semua', this)">
        Semua (12)
      </button>
<button class="filter-tab px-4 py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" onclick="setFilter('dine-in', this)">
        Dine-In (5)
      </button>
<button class="filter-tab px-4 py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" onclick="setFilter('delivery-takeaway', this)">
        Delivery / Takeaway (7)
      </button>
<button class="filter-tab px-4 py-1.5 rounded-full font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all flex items-center gap-1" onclick="setFilter('belum-bayar', this)">
<span>Belum Bayar</span>
<span class="w-2 h-2 rounded-full bg-error"></span>
</button>
</div>
<!-- Secondary Search & View Mode Switcher -->
<div class="flex items-center gap-2">
<div class="relative flex-1 sm:w-64">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-base">search</span>
<input class="w-full pl-9 pr-3 py-2 bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-primary/20" id="search-input" onkeyup="filterOrdersByName()" placeholder="Cari nama, meja, nota..." type="text"/>
</div>
<div class="hidden sm:flex items-center p-1 bg-surface-container rounded-full">
<button aria-label="Tampilan Grid Kartu" class="p-1.5 rounded-full bg-surface-container-lowest text-primary shadow-xs" type="button">
<span class="material-symbols-outlined text-sm">grid_view</span>
</button>
<button aria-label="Tampilan Tabel" class="p-1.5 rounded-full text-outline hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-sm">format_list_bulleted</span>
</button>
</div>
</div>
</section>
<!-- Interactive Order Cards Grid (Full ERD Support) -->
<section class="w-full">
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-space-md" id="orders-container">
<!-- CARD 1: #WJ-1042 (Sedang Dimasak | Delivery) -->
<article class="order-card bg-surface-container-lowest rounded-2xl p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between" data-payment="paid" data-status="cooking" data-type="delivery">
<div>
<!-- Header Card: Order ID, Type, Time -->
<div class="flex items-start justify-between gap-3 pb-3 mb-3 border-b border-surface-container-high/60">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">#WJ-1042</span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-xs">local_shipping</span>
                  Delivery Kurir
                </span>
</div>
<p class="font-label-sm text-label-sm text-outline mt-0.5 flex items-center gap-1">
<span>Dipesan 11:28 WIB</span>
<span>•</span>
<span class="text-on-surface-variant font-medium">Kasir: Siti Rahma</span>
</p>
</div>
<!-- Order Status Badge -->
<div class="text-right">
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-sm animate-spin">skillet</span>
                Sedang Dimasak
              </span>
<div class="text-[11px] text-outline font-label-sm mt-1">Est. Siap: 11:42 WIB</div>
</div>
</div>
<!-- Customer Identity & ERD Address/Notes -->
<div class="bg-surface-container-low/70 rounded-xl p-3 mb-3.5">
<div class="flex items-center justify-between mb-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Bpk. Rizky</span>
<a class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary hover:underline" href="tel:081234567890">
<span class="material-symbols-outlined text-xs">call</span>
                0812-3456-7890
              </a>
</div>
<div class="flex items-start gap-1.5 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-sm text-outline shrink-0 mt-0.5">place</span>
<span class="leading-snug">Jl. Flamboyan No. 12 (Masuk gang samping Alfamart Jamsek), Blok B2</span>
</div>
<div class="mt-2 pt-2 border-t border-outline-variant/30 flex items-start gap-1.5 font-label-sm text-label-sm text-tertiary">
<span class="material-symbols-outlined text-xs shrink-0 mt-0.5">info</span>
<span>Catatan Kurir: Pagar abu-abu, titip satpam jika hujan lebat.</span>
</div>
</div>
<!-- Line Items List -->
<div class="space-y-2 mb-4">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-bold">Rincian Menu (4 Item)</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">2x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Ayam Sambal Hitam + Nasi Daun Jeruk</div>
<div class="font-label-sm text-label-sm text-primary font-medium">+ Extra Sambal Hitam Pedas Nampol (2x Rp 3.000)</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 46.000</span>
</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">2x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Jus Mangga Arumanis</div>
<div class="font-label-sm text-label-sm text-outline">Less sugar, es pisah</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 12.000</span>
</div>
</div>
</div>
<!-- Card Footer: Total, Payment Status & Fast Action Pipeline -->
<div class="pt-3 border-t border-surface-container-high/60">
<div class="flex items-center justify-between mb-3.5">
<div>
<span class="font-label-sm text-label-sm text-outline block">Total Tagihan</span>
<span class="font-headline-sm text-headline-sm font-bold text-primary">Rp 58.000</span>
</div>
<div class="text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-xs">verified</span>
                Lunas (QRIS Statis)
              </span>
<span class="block text-[11px] text-outline font-label-sm mt-0.5">Reff: #QRS-99824</span>
</div>
</div>
<!-- Rapid Operational Actions -->
<div class="flex items-center gap-2">
<button class="flex-1 py-2.5 px-3 rounded-xl bg-secondary text-on-secondary font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 shadow-sm hover:opacity-95 active:scale-95 transition-all" onclick="changeOrderStatus(this, 'ready')" type="button">
<span class="material-symbols-outlined text-sm">room_service</span>
              Siap Saji / Kirim
            </button>
<button class="p-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors flex items-center justify-center" onclick="reprintTicket('WJ-1042')" title="Cetak Ulang Tiket Dapur &amp; Kasir">
<span class="material-symbols-outlined text-base">print</span>
</button>
<button class="p-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors flex items-center justify-center" onclick="openDetailModal('WJ-1042', 'Bpk. Rizky', 'Rp 58.000', 'QRIS Statis', 'Lunas')" title="Detail Pesanan &amp; Bukti">
<span class="material-symbols-outlined text-base">visibility</span>
</button>
</div>
</div>
</article>
<!-- CARD 2: #WJ-1043 (Siap Disajikan | Dine-In) -->
<article class="order-card bg-surface-container-lowest rounded-2xl p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between" data-payment="paid" data-status="ready" data-type="dine-in">
<div>
<!-- Header Card -->
<div class="flex items-start justify-between gap-3 pb-3 mb-3 border-b border-surface-container-high/60">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">#WJ-1043</span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-xs">table_restaurant</span>
                  Dine-In • Meja 02
                </span>
</div>
<p class="font-label-sm text-label-sm text-outline mt-0.5 flex items-center gap-1">
<span>Dipesan 11:34 WIB</span>
<span>•</span>
<span class="text-on-surface-variant font-medium">Kasir: Siti Rahma</span>
</p>
</div>
<!-- Order Status Badge -->
<div class="text-right">
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-secondary text-on-secondary font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-sm">notifications_active</span>
                Siap Disajikan
              </span>
<div class="text-[11px] text-secondary font-label-sm mt-1 font-semibold">Di Meja Penjemputan</div>
</div>
</div>
<!-- Customer Identity & Table notes -->
<div class="bg-surface-container-low/70 rounded-xl p-3 mb-3.5">
<div class="flex items-center justify-between mb-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Kak Anisa</span>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant">2 Tamu</span>
</div>
<div class="flex items-start gap-1.5 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-sm text-outline shrink-0 mt-0.5">location_on</span>
<span>Area Depan (Outdoor Non-Smoking) • Meja Kayu 02</span>
</div>
</div>
<!-- Line Items List -->
<div class="space-y-2 mb-4">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-bold">Rincian Menu (3 Item)</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">1x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Nila Bakar Sambal Terasi + Nasi Gurih</div>
<div class="font-label-sm text-label-sm text-outline">Lalapan timun kemangi lengkap</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 19.000</span>
</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">1x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Cah Kangkung Terasi Balacan</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 6.000</span>
</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">1x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Es Teh Manis Melati Jumbo</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 4.000</span>
</div>
</div>
</div>
<!-- Card Footer -->
<div class="pt-3 border-t border-surface-container-high/60">
<div class="flex items-center justify-between mb-3.5">
<div>
<span class="font-label-sm text-label-sm text-outline block">Total Tagihan</span>
<span class="font-headline-sm text-headline-sm font-bold text-primary">Rp 29.000</span>
</div>
<div class="text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-xs">payments</span>
                Lunas (Tunai Pas)
              </span>
<span class="block text-[11px] text-outline font-label-sm mt-0.5">Diterima: Rp 30.000 (Kembali Rp 1.000)</span>
</div>
</div>
<!-- Rapid Operational Actions -->
<div class="flex items-center gap-2">
<button class="flex-1 py-2.5 px-3 rounded-xl bg-primary text-on-primary font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 shadow-sm hover:bg-primary-container active:scale-95 transition-all" onclick="changeOrderStatus(this, 'completed')" type="button">
<span class="material-symbols-outlined text-sm">check_circle</span>
              Tandai Telah Disajikan
            </button>
<button class="p-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors flex items-center justify-center" onclick="reprintTicket('WJ-1043')" title="Cetak Ulang Struk">
<span class="material-symbols-outlined text-base">print</span>
</button>
<button class="p-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors flex items-center justify-center" onclick="openDetailModal('WJ-1043', 'Meja 02 - Kak Anisa', 'Rp 29.000', 'Tunai', 'Lunas')" title="Detail Pesanan">
<span class="material-symbols-outlined text-base">visibility</span>
</button>
</div>
</div>
</article>
<!-- CARD 3: #WJ-1044 (Menunggu Konfirmasi | Takeaway | Menunggu Bukti Transfer) -->
<article class="order-card bg-surface-container-lowest rounded-2xl p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between ring-2 ring-tertiary-container/30" data-payment="unpaid" data-status="pending" data-type="takeaway">
<div>
<!-- Header Card -->
<div class="flex items-start justify-between gap-3 pb-3 mb-3 border-b border-surface-container-high/60">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">#WJ-1044</span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-xs">takeout_dining</span>
                  Takeaway (Bungkus)
                </span>
</div>
<p class="font-label-sm text-label-sm text-outline mt-0.5 flex items-center gap-1">
<span>Dipesan 11:41 WIB</span>
<span>•</span>
<span class="text-on-surface-variant font-medium">Online Web Order</span>
</p>
</div>
<!-- Order Status Badge -->
<div class="text-right">
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-sm">schedule</span>
                Menunggu Konfirmasi
              </span>
<div class="text-[11px] text-error font-label-sm mt-1 font-semibold">Belum Masuk Dapur</div>
</div>
</div>
<!-- Customer Identity -->
<div class="bg-surface-container-low/70 rounded-xl p-3 mb-3.5">
<div class="flex items-center justify-between mb-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Mas Bayu</span>
<span class="font-label-sm text-label-sm text-outline">Ambil Sendiri jam 12:05</span>
</div>
<div class="flex items-start gap-1.5 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-sm text-outline shrink-0 mt-0.5">shopping_bag</span>
<span>Bungkus terpisah dengan kantong ramah lingkungan.</span>
</div>
</div>
<!-- Line Items List -->
<div class="space-y-2 mb-4">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-bold">Rincian Menu (3 Item)</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">1x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Mie Pedas Jamsek (Level 3)</div>
<div class="font-label-sm text-label-sm text-tertiary font-medium">Level 3: Ekstra cabai rawit merah geprek</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 14.000</span>
</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">1x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Martabak Mie Telur Bebek</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 8.000</span>
</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">1x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Teh Tarik Hangat Khas Melayu</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 6.000</span>
</div>
</div>
</div>
<!-- Card Footer -->
<div class="pt-3 border-t border-surface-container-high/60">
<div class="flex items-center justify-between mb-3.5">
<div>
<span class="font-label-sm text-label-sm text-outline block">Total Tagihan</span>
<span class="font-headline-sm text-headline-sm font-bold text-primary">Rp 28.000</span>
</div>
<div class="text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-bold animate-pulse">
<span class="material-symbols-outlined text-xs">pending</span>
                Menunggu Bukti Transfer
              </span>
<button class="block text-[11px] text-primary font-label-sm font-bold underline hover:text-primary-container mt-0.5 ml-auto" onclick="showProofTransferModal()">
                Periksa Unggahan (1)
              </button>
</div>
</div>
<!-- Rapid Operational Actions -->
<div class="flex items-center gap-2">
<button class="flex-1 py-2.5 px-3 rounded-xl bg-tertiary-container text-on-tertiary-container font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 shadow-sm hover:opacity-95 active:scale-95 transition-all" onclick="approveAndCook(this)" type="button">
<span class="material-symbols-outlined text-sm">restaurant</span>
              Verifikasi &amp; Kirim ke Dapur
            </button>
<button class="p-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors flex items-center justify-center" onclick="showProofTransferModal()" title="Lihat Bukti Transfer BCA">
<span class="material-symbols-outlined text-base">receipt</span>
</button>
<button class="p-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors flex items-center justify-center" onclick="openDetailModal('WJ-1044', 'Mas Bayu', 'Rp 28.000', 'Transfer BCA', 'Menunggu Verifikasi')" title="Detail Pesanan">
<span class="material-symbols-outlined text-base">visibility</span>
</button>
</div>
</div>
</article>
<!-- CARD 4: #WJ-1040 (Selesai | Dine-In Rombongan) -->
<article class="order-card bg-surface-container-lowest/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between opacity-80 hover:opacity-100" data-payment="paid" data-status="completed" data-type="dine-in">
<div>
<!-- Header Card -->
<div class="flex items-start justify-between gap-3 pb-3 mb-3 border-b border-surface-container-high/60">
<div>
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">#WJ-1040</span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-xs">table_restaurant</span>
                  Dine-In • Meja 07 (VIP)
                </span>
</div>
<p class="font-label-sm text-label-sm text-outline mt-0.5 flex items-center gap-1">
<span>Dipesan 10:50 WIB • Selesai 11:32 WIB</span>
<span>•</span>
<span class="text-on-surface-variant font-medium">Kasir: Siti Rahma</span>
</p>
</div>
<!-- Order Status Badge -->
<div class="text-right">
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md font-semibold">
<span class="material-symbols-outlined text-sm text-secondary">check_circle</span>
                Selesai
              </span>
<div class="text-[11px] text-outline font-label-sm mt-1">Meja Bersih &amp; Ditutup</div>
</div>
</div>
<!-- Customer Identity -->
<div class="bg-surface-container-low/70 rounded-xl p-3 mb-3.5">
<div class="flex items-center justify-between mb-1">
<span class="font-label-lg text-label-lg font-bold text-on-surface">Rombongan Kantor BNI (Pak Hendra)</span>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded bg-surface-container text-on-surface-variant">6 Orang</span>
</div>
<div class="flex items-start gap-1.5 text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-sm text-outline shrink-0 mt-0.5">location_on</span>
<span>Ruang Dalam Ber-AC • Nota Faktur Kantor Terlampir</span>
</div>
</div>
<!-- Line Items List -->
<div class="space-y-2 mb-4">
<div class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-bold">Rincian Menu (10 Item)</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">4x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Ayam Rica-Rica Kemangi + Nasi Putih</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 88.000</span>
</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">2x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Ifumie Goreng Seafood Jamsek</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 30.000</span>
</div>
<div class="flex items-start justify-between gap-2 py-1">
<div class="flex items-start gap-2">
<span class="w-6 h-6 rounded-md bg-surface-container text-on-surface font-label-md text-label-md flex items-center justify-center font-bold">4x</span>
<div>
<div class="font-label-md text-label-md font-semibold text-on-surface">Jus Jeruk Peras Murni</div>
</div>
</div>
<span class="font-label-md text-label-md font-bold text-on-surface">Rp 16.000</span>
</div>
</div>
</div>
<!-- Card Footer -->
<div class="pt-3 border-t border-surface-container-high/60">
<div class="flex items-center justify-between mb-3.5">
<div>
<span class="font-label-sm text-label-sm text-outline block">Total Tagihan</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Rp 134.000</span>
</div>
<div class="text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-xs">credit_card</span>
                Lunas (Mesin EDC Mandiri)
              </span>
<span class="block text-[11px] text-outline font-label-sm mt-0.5">Approval Code: #481902</span>
</div>
</div>
<!-- Rapid Operational Actions -->
<div class="flex items-center gap-2">
<button class="flex-1 py-2.5 px-3 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 transition-colors" onclick="reprintTicket('WJ-1040')" type="button">
<span class="material-symbols-outlined text-sm">print</span>
              Cetak Ulang Faktur
            </button>
<button class="p-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface transition-colors flex items-center justify-center" onclick="openDetailModal('WJ-1040', 'Meja 07 - Rombongan Kantor', 'Rp 134.000', 'EDC Mandiri', 'Lunas')" title="Detail Pesanan">
<span class="material-symbols-outlined text-base">receipt_long</span>
</button>
</div>
</div>
</article>
</div>
</section>
<!-- MODAL: Lihat Bukti Transfer Popover -->
<div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-xs hidden items-center justify-center p-4" id="proof-modal">
<div class="bg-surface-container-lowest max-w-md w-full rounded-2xl shadow-xl overflow-hidden animate-in fade-in zoom-in-95 duration-200">
<div class="p-4 bg-surface-container flex items-center justify-between border-b border-outline-variant/30">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary">verified_user</span>
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">Verifikasi Bukti Transfer</span>
</div>
<button class="p-1 rounded-full hover:bg-surface-container-high text-outline" onclick="closeProofTransferModal()">
<span class="material-symbols-outlined text-xl">close</span>
</button>
</div>
<div class="p-5">
<div class="flex items-center justify-between mb-3 text-on-surface font-label-md text-label-md">
<span>Pesanan: <strong class="text-primary font-bold">#WJ-1044</strong> (Mas Bayu)</span>
<span class="px-2 py-0.5 rounded bg-tertiary-fixed text-on-tertiary-fixed font-semibold text-xs">BCA Transfer</span>
</div>
<!-- Simulated Proof Image Preview -->
<div class="w-full h-56 rounded-xl bg-surface-container-high overflow-hidden relative shadow-inner mb-4 flex items-center justify-center">
<img class="w-full h-full object-cover" data-alt="A smartphone screenshot showing a successful Indonesian mobile banking transfer receipt to Warung Jamsek for Rp 28,000, clear green success badge, neat digital invoice typography, realistic screen capture aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUYUHd8qsbowKvkXgCltDykKIL8JSlbrd2UjF0keYiHgynbZAFz4eZGTx0LlTAldWrUE1LCDJy9kuWNLlUsxF3TFG1jMNUCOgt6zKJwWC7REay88NxrJICwhjwQ0vg5p39ZF_KYfGgbJKfZdBlI8IYt4ZoEKjY22hITCk4r6LYbSa9QowfNw9gnqNmOOACH_zmRxfbqShWdPP2W_IC-ipyw840qSAqA_DxgHscEOM"/>
<div class="absolute bottom-2 left-2 right-2 bg-on-surface/85 backdrop-blur-md text-on-primary-container px-3 py-1.5 rounded-lg text-xs flex justify-between">
<span>Nominal: <strong>Rp 28.000</strong></span>
<span>Jam: 11:43:10 WIB</span>
</div>
</div>
<div class="bg-surface-container-low rounded-xl p-3 mb-4 text-xs text-on-surface-variant space-y-1">
<div class="flex justify-between">
<span>Rekening Pengirim:</span>
<span class="font-mono font-medium text-on-surface">BAYU PRATAMA (BCA ****310)</span>
</div>
<div class="flex justify-between">
<span>Rekening Tujuan:</span>
<span class="font-medium text-on-surface">WARUNG JAMSEK (BCA 8820-192-11)</span>
</div>
<div class="flex justify-between">
<span>Catatan Transaksi:</span>
<span class="font-medium text-on-surface">WJ1044 Bayu</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="w-1/3 py-2.5 rounded-xl bg-error-container text-on-error-container font-label-md text-label-md font-bold hover:opacity-90" onclick="rejectProof()" type="button">
            Tolak
          </button>
<button class="w-2/3 py-2.5 rounded-xl bg-primary text-on-primary font-label-md text-label-md font-bold shadow-md hover:bg-primary-container" onclick="approveProofModalAction()" type="button">
            Konfirmasi Lunas &amp; Masak
          </button>
</div>
</div>
</div>
</div>
<!-- MODAL: Detail Pesanan Standar & Cetak Nota -->
<div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-xs hidden items-center justify-center p-4" id="detail-modal">
<div class="bg-surface-container-lowest max-w-lg w-full rounded-2xl shadow-xl overflow-hidden">
<div class="p-4 bg-surface-container flex items-center justify-between border-b border-outline-variant/30">
<div>
<h3 class="font-headline-sm text-headline-sm font-bold text-on-surface" id="modal-order-id">Detail Tiket</h3>
<p class="font-label-sm text-label-sm text-outline" id="modal-customer">Pelanggan</p>
</div>
<button class="p-1 rounded-full hover:bg-surface-container-high text-outline" onclick="closeDetailModal()">
<span class="material-symbols-outlined text-xl">close</span>
</button>
</div>
<div class="p-5 space-y-4">
<div class="grid grid-cols-2 gap-3 text-xs bg-surface-container-low p-3 rounded-xl">
<div>
<span class="text-outline block">Metode Bayar:</span>
<span class="font-bold text-on-surface" id="modal-payment-method">-</span>
</div>
<div>
<span class="text-outline block">Status Pembayaran:</span>
<span class="font-bold text-secondary" id="modal-payment-status">-</span>
</div>
<div>
<span class="text-outline block">Grand Total:</span>
<span class="font-bold text-primary font-headline-sm" id="modal-total">-</span>
</div>
<div>
<span class="text-outline block">Kasir PJ:</span>
<span class="font-semibold text-on-surface">Siti Rahma (Shift 1)</span>
</div>
</div>
<div class="space-y-2 border-t border-surface-container-high pt-3">
<div class="font-label-sm text-label-sm font-bold text-outline uppercase tracking-wider">Aktivitas Terakhir</div>
<ul class="text-xs text-on-surface-variant space-y-1.5 pl-3 list-disc">
<li>Pesanan dibuat di POS • 11:28 WIB</li>
<li>Struk dapur dicetak otomatis ke Thermal Printer 80mm • 11:28 WIB</li>
<li>Status pesanan diubah ke Sedang Dimasak • 11:30 WIB</li>
</ul>
</div>
<div class="flex items-center justify-end gap-2 pt-2">
<button class="px-4 py-2 rounded-xl bg-surface-container text-on-surface font-label-md text-label-md" onclick="closeDetailModal()" type="button">
            Tutup
          </button>
<button class="px-4 py-2 rounded-xl bg-primary text-on-primary font-label-md text-label-md font-bold flex items-center gap-1.5 shadow-sm" onclick="executePrint()" type="button">
<span class="material-symbols-outlined text-sm">print</span>
            Cetak Tiket Fisik
          </button>
</div>
</div>
</div>
</div>
<!-- Notification Toast Container -->
<div class="fixed bottom-6 right-6 z-50 bg-on-surface text-surface px-4 py-3 rounded-xl shadow-lg transform translate-y-20 opacity-0 transition-all flex items-center gap-2 font-label-md text-label-md" id="toast">
<span class="material-symbols-outlined text-secondary text-base">check_circle</span>
<span id="toast-message">Operasi berhasil</span>
</div>
</div>
<script>
  // Simple Sound Toggle Simulation
  let soundEnabled = true;
  function toggleKitchenSound() {
    soundEnabled = !soundEnabled;
    const icon = document.getElementById('sound-icon');
    const text = document.getElementById('sound-text');
    if (soundEnabled) {
      icon.textContent = 'volume_up';
      text.textContent = 'Lonceng Dapur: Nyala';
      showToast('Notifikasi audio dapur aktif');
    } else {
      icon.textContent = 'volume_off';
      text.textContent = 'Lonceng Dapur: Mute';
      showToast('Notifikasi audio dapur dinonaktifkan');
    }
  }

  // Filter Tabs logic
  function setFilter(type, buttonEl) {
    document.querySelectorAll('.filter-tab').forEach(tab => {
      tab.classList.remove('bg-primary-container', 'text-on-primary-container', 'font-semibold', 'shadow-sm');
      tab.classList.add('text-on-surface-variant');
    });
    buttonEl.classList.add('bg-primary-container', 'text-on-primary-container', 'font-semibold', 'shadow-sm');
    buttonEl.classList.remove('text-on-surface-variant');

    const cards = document.querySelectorAll('.order-card');
    cards.forEach(card => {
      const cardType = card.getAttribute('data-type');
      const cardPayment = card.getAttribute('data-payment');
      
      if (type === 'semua') {
        card.style.display = 'flex';
      } else if (type === 'dine-in') {
        card.style.display = (cardType === 'dine-in') ? 'flex' : 'none';
      } else if (type === 'delivery-takeaway') {
        card.style.display = (cardType === 'delivery' || cardType === 'takeaway') ? 'flex' : 'none';
      } else if (type === 'belum-bayar') {
        card.style.display = (cardPayment === 'unpaid') ? 'flex' : 'none';
      }
    });
  }

  // Search filter
  function filterOrdersByName() {
    const query = document.getElementById('search-input').value.toLowerCase();
    const cards = document.querySelectorAll('.order-card');
    cards.forEach(card => {
      const text = card.innerText.toLowerCase();
      if (text.includes(query)) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  // Fast Update Status in Card
  function changeOrderStatus(btn, nextState) {
    const card = btn.closest('.order-card');
    if (nextState === 'ready') {
      btn.innerHTML = '<span class="material-symbols-outlined text-sm">done_all</span> Selesaikan Pesanan';
      btn.className = 'flex-1 py-2.5 px-3 rounded-xl bg-primary text-on-primary font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 shadow-sm hover:opacity-95 active:scale-95 transition-all';
      btn.setAttribute('onclick', "changeOrderStatus(this, 'completed')");
      showToast('Status #WJ-1042 diubah: Siap Dikirim ke Kurir');
    } else if (nextState === 'completed') {
      card.style.opacity = '0.6';
      btn.disabled = true;
      btn.innerHTML = '<span class="material-symbols-outlined text-sm">check</span> Selesai';
      btn.className = 'flex-1 py-2.5 px-3 rounded-xl bg-surface-container text-outline font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5 cursor-not-allowed';
      showToast('Pesanan selesai dan meja/tiket ditutup');
    }
  }

  // Proof Modal
  function showProofTransferModal() {
    document.getElementById('proof-modal').classList.remove('hidden');
    document.getElementById('proof-modal').classList.add('flex');
  }

  function closeProofTransferModal() {
    document.getElementById('proof-modal').classList.add('hidden');
    document.getElementById('proof-modal').classList.remove('flex');
  }

  function approveProofModalAction() {
    closeProofTransferModal();
    const targetCard = document.querySelector('[data-type="takeaway"]');
    if (targetCard) {
      targetCard.setAttribute('data-payment', 'paid');
      targetCard.setAttribute('data-status', 'cooking');
      targetCard.classList.remove('ring-2', 'ring-tertiary-container/30');
      showToast('Transfer BCA Rp 28.000 Terverifikasi! Pesanan diteruskan ke koki.');
    }
  }

  function rejectProof() {
    closeProofTransferModal();
    showToast('Bukti transfer ditolak. Notifikasi dikirimkan ke kontak WhatsApp pembeli.');
  }

  function approveAndCook(btn) {
    btn.innerHTML = '<span class="material-symbols-outlined text-sm">done</span> Sedang Dimasak';
    btn.className = 'flex-1 py-2.5 px-3 rounded-xl bg-primary text-on-primary font-label-md text-label-md font-semibold flex items-center justify-center gap-1.5';
    showToast('Pesanan #WJ-1044 dikonfirmasi & masuk antrean wajan dapur');
  }

  // Details Modal
  function openDetailModal(id, cust, total, method, status) {
    document.getElementById('modal-order-id').innerText = '#' + id;
    document.getElementById('modal-customer').innerText = 'Pemesan: ' + cust;
    document.getElementById('modal-total').innerText = total;
    document.getElementById('modal-payment-method').innerText = method;
    document.getElementById('modal-payment-status').innerText = status;
    document.getElementById('detail-modal').classList.remove('hidden');
    document.getElementById('detail-modal').classList.add('flex');
  }

  function closeDetailModal() {
    document.getElementById('detail-modal').classList.add('hidden');
    document.getElementById('detail-modal').classList.remove('flex');
  }

  function reprintTicket(id) {
    showToast('Mencetak ulang tiket dapur #' + id + ' ke Printer POS...');
  }

  function executePrint() {
    closeDetailModal();
    showToast('Mencetak nota kasir...');
  }

  function refreshOrders() {
    showToast('Memperbarui daftar pesanan...');
  }

  // Simple Toast UI
  function showToast(msg) {
    const toast = document.getElementById('toast');
    const toastMsg = document.getElementById('toast-message');
    toastMsg.innerText = msg;
    toast.classList.remove('translate-y-20', 'opacity-0');
    toast.classList.add('translate-y-0', 'opacity-100');
    setTimeout(() => {
      toast.classList.add('translate-y-20', 'opacity-0');
      toast.classList.remove('translate-y-0', 'opacity-100');
    }, 2800);
  }
</script>
</main>

<footer class="w-full bg-surface-container-low py-4 mt-9">
    <div class="max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-on-surface-variant">
        <div class="flex items-center gap-3">
            <span class="font-semibold text-on-surface">Warung Jamsek POS v2.4</span>
            <span>•</span>
            <span>Terhubung ke Kitchen Display &amp; Printer POS (Online)</span>
        </div>
        <div>
            <span>Operasional Kasir: Siti Rahma (Shift 1) • Realtime Mode</span>
        </div>
    </div>
</footer>
@endsection