@extends('layouts.app', ['title' => 'Katalog Menu & Addons - Warung Jamsek'])

@section('content')
<x-header-admin active="menu" />

<main class="w-full pt-28 bg-surface flex-1 max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10">
<div class="flex flex-col w-full pb-16">
<!-- Status Bar & Quick Stats Strip -->
<section class="w-full mb-6">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-surface-container-low p-space-md rounded-xl shadow-sm">
<div class="flex items-center gap-space-md">
<div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary-container flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-2xl">restaurant_menu</span>
</div>
<div>
<div class="flex items-center gap-2">
<h1 class="font-headline-sm text-headline-sm text-on-surface font-bold">Katalog Menu &amp; Add-ons</h1>
<span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm">Sinkron POS Aktif</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Kelola relasi kategori, stok hidangan harian, dan kustomisasi addons dapur</p>
</div>
</div>
<!-- Quick Metrics Counters -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
<div class="bg-surface-container-lowest px-4 py-2 rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Total Menu</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">43</span>
</div>
<div class="bg-surface-container-lowest px-4 py-2 rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Kategori</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">4</span>
</div>
<div class="bg-surface-container-lowest px-4 py-2 rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Add-ons Aktif</span>
<span class="font-headline-sm text-headline-sm text-secondary font-bold">6</span>
</div>
<div class="bg-surface-container-lowest px-4 py-2 rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Menu Spesial</span>
<span class="font-headline-sm text-headline-sm text-tertiary-container font-bold">1 Hari</span>
</div>
</div>
</div>
</section>
<!-- Two-Panel Main Operational Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
<!-- LEFT PANEL: Kategori & Master Add-ons (col 4) -->
<aside class="lg:col-span-4 flex flex-col gap-space-lg">
<!-- Panel Kategori -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm">
<div class="flex items-center justify-between mb-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-xl">category</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Kategori Menu</h2>
</div>
<button class="inline-flex items-center gap-1 text-primary hover:bg-surface-container-low px-2.5 py-1 rounded-full font-label-md text-label-md transition-colors" onclick="document.getElementById('modal-tambah-kategori').classList.remove('hidden')" type="button">
<span class="material-symbols-outlined text-sm font-bold">add</span> Kategori Baru
          </button>
</div>
<div class="space-y-2" id="kategori-list">
<!-- Kategori: Makanan -->
<div class="group flex items-center justify-between p-3 rounded-lg bg-surface-container-high transition-all cursor-pointer">
<div class="flex items-center gap-3">
<span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-lg">skillet</span>
</span>
<div>
<span class="font-label-lg text-label-lg font-bold text-on-surface block">Makanan</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">15 item terdaftar</span>
</div>
</div>
<div class="flex items-center gap-1 opacity-80 group-hover:opacity-100">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant mr-1">Aktif</span>
<button class="p-1 text-outline hover:text-on-surface rounded-full"><span class="material-symbols-outlined text-base">more_vert</span></button>
</div>
</div>
<!-- Kategori: New Menu -->
<div class="group flex items-center justify-between p-3 rounded-lg bg-surface-container-low hover:bg-surface-container transition-all cursor-pointer">
<div class="flex items-center gap-3">
<span class="w-8 h-8 rounded-lg bg-tertiary-fixed text-tertiary flex items-center justify-center">
<span class="material-symbols-outlined text-lg">stars</span>
</span>
<div>
<span class="font-label-lg text-label-lg font-bold text-on-surface block">New Menu</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">6 item terdaftar</span>
</div>
</div>
<div class="flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant mr-1">Aktif</span>
<button class="p-1 text-outline hover:text-on-surface rounded-full"><span class="material-symbols-outlined text-base">more_vert</span></button>
</div>
</div>
<!-- Kategori: Minuman -->
<div class="group flex items-center justify-between p-3 rounded-lg bg-surface-container-low hover:bg-surface-container transition-all cursor-pointer">
<div class="flex items-center gap-3">
<span class="w-8 h-8 rounded-lg bg-secondary-fixed text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-lg">local_cafe</span>
</span>
<div>
<span class="font-label-lg text-label-lg font-bold text-on-surface block">Minuman</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">16 item terdaftar</span>
</div>
</div>
<div class="flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant mr-1">Aktif</span>
<button class="p-1 text-outline hover:text-on-surface rounded-full"><span class="material-symbols-outlined text-base">more_vert</span></button>
</div>
</div>
<!-- Kategori: Additional -->
<div class="group flex items-center justify-between p-3 rounded-lg bg-surface-container-low hover:bg-surface-container transition-all cursor-pointer">
<div class="flex items-center gap-3">
<span class="w-8 h-8 rounded-lg bg-surface-container-highest text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-lg">add_circle</span>
</span>
<div>
<span class="font-label-lg text-label-lg font-bold text-on-surface block">Additional</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">6 item pelengkap</span>
</div>
</div>
<div class="flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant mr-1">Aktif</span>
<button class="p-1 text-outline hover:text-on-surface rounded-full"><span class="material-symbols-outlined text-base">more_vert</span></button>
</div>
</div>
</div>
</div>
<!-- Panel Master Add-ons Global -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-xl">extension</span>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Master Add-ons</h2>
<span class="font-body-sm text-body-sm text-outline">Tambahan ekstra di POS Kasir</span>
</div>
</div>
<button class="px-3 py-1.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-md text-label-md font-semibold hover:bg-secondary-fixed-dim transition-colors flex items-center gap-1" onclick="document.getElementById('modal-tambah-addon').classList.remove('hidden')" type="button">
<span class="material-symbols-outlined text-sm">add</span> Buat Add-on
          </button>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4 bg-surface-container-low p-2.5 rounded-lg">
          Atur harga bawaan &amp; ketersediaan cepat. Perubahan otomatis berlaku ke kasir.
        </p>
<div class="space-y-2.5">
<!-- Add-on 1: Tambah Sambal -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-base">soup_kitchen</span>
</div>
<div class="min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate block">Tambah Sambal</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Rp 2.000</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="p-1.5 text-outline hover:text-on-surface rounded-full hover:bg-surface-container" title="Ubah Harga">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary"></div>
</label>
</div>
</div>
<!-- Add-on 2: Ice Cream -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-tertiary-fixed text-tertiary flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-base">icecream</span>
</div>
<div class="min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate block">Ice Cream</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Rp 2.000</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="p-1.5 text-outline hover:text-on-surface rounded-full hover:bg-surface-container" title="Ubah Harga">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary"></div>
</label>
</div>
</div>
<!-- Add-on 3: Es Kul Kul -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-base">bakery_dining</span>
</div>
<div class="min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate block">Es Kul Kul</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Rp 1.000</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="p-1.5 text-outline hover:text-on-surface rounded-full hover:bg-surface-container" title="Ubah Harga">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary"></div>
</label>
</div>
</div>
<!-- Add-on 4: Oreo Topping -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-base">cookie</span>
</div>
<div class="min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate block">Oreo Topping</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Rp 1.000</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="p-1.5 text-outline hover:text-on-surface rounded-full hover:bg-surface-container" title="Ubah Harga">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary"></div>
</label>
</div>
</div>
<!-- Add-on 5: Keju Parut -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-tertiary-fixed text-tertiary flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-base">lunch_dining</span>
</div>
<div class="min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate block">Keju Parut</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Rp 1.000</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="p-1.5 text-outline hover:text-on-surface rounded-full hover:bg-surface-container" title="Ubah Harga">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary"></div>
</label>
</div>
</div>
<!-- Add-on 6: Chocochips -->
<div class="p-3 rounded-lg bg-surface-container-low flex items-center justify-between gap-3">
<div class="flex items-center gap-3 min-w-0">
<div class="w-8 h-8 rounded-full bg-outline-variant/50 text-on-surface flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-base">grain</span>
</div>
<div class="min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate block">Chocochips</span>
<span class="font-label-sm text-label-sm text-primary font-bold">Rp 1.000</span>
</div>
</div>
<div class="flex items-center gap-2">
<button class="p-1.5 text-outline hover:text-on-surface rounded-full hover:bg-surface-container" title="Ubah Harga">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-9 h-5 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary"></div>
</label>
</div>
</div>
</div>
</div>
</aside>
<!-- RIGHT PANEL: Master Menu Katalog Table (col 8) -->
<main class="lg:col-span-8 flex flex-col gap-space-md">
<!-- Toolbar Filter & Action -->
<div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-3">
<div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
<!-- Search field -->
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span>
<input class="w-full pl-9 pr-4 py-2 bg-surface-container-low text-on-surface rounded-lg font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Cari nama menu, sambal, minuman..." type="text"/>
</div>
<!-- Add Menu Primary Terracotta Action Button -->
<button class="px-5 py-2.5 rounded-full bg-primary-container text-on-primary-container font-label-lg text-label-lg font-bold shadow-md hover:brightness-105 active:scale-95 transition-all flex items-center justify-center gap-2 whitespace-nowrap" onclick="document.getElementById('modal-tambah-menu').classList.remove('hidden')" type="button">
<span class="material-symbols-outlined text-lg">add_circle</span>
            Tambah Menu Baru
          </button>
</div>
<!-- Filter Pill Selectors -->
<div class="flex items-center gap-2 overflow-x-auto no-scrollbar pt-1">
<span class="font-label-sm text-label-sm text-outline flex items-center gap-1">
<span class="material-symbols-outlined text-sm">filter_alt</span> Filter:
          </span>
<button class="px-3 py-1 rounded-full bg-primary text-on-primary font-label-sm text-label-sm font-semibold shadow-xs whitespace-nowrap">
            Semua Menu (43)
          </button>
<button class="px-3 py-1 rounded-full bg-surface-container-low text-on-surface-variant hover:bg-surface-container font-label-sm text-label-sm whitespace-nowrap">
            Makanan (15)
          </button>
<button class="px-3 py-1 rounded-full bg-surface-container-low text-on-surface-variant hover:bg-surface-container font-label-sm text-label-sm whitespace-nowrap">
            Minuman (16)
          </button>
<button class="px-3 py-1 rounded-full bg-surface-container-low text-on-surface-variant hover:bg-surface-container font-label-sm text-label-sm whitespace-nowrap">
            New Menu (6)
          </button>
<button class="px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-semibold flex items-center gap-1 whitespace-nowrap">
<span class="material-symbols-outlined text-xs">event</span> Hanya Kamis
          </button>
<button class="px-3 py-1 rounded-full bg-surface-container-low text-secondary font-label-sm text-label-sm font-semibold whitespace-nowrap">
            Status: Tersedia
          </button>
</div>
</div>
<!-- Menu Items Table Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-md text-label-md">
<th class="py-3.5 px-4 font-semibold">Menu &amp; Foto</th>
<th class="py-3.5 px-3 font-semibold">Kategori</th>
<th class="py-3.5 px-3 font-semibold">Harga (Rp)</th>
<th class="py-3.5 px-3 font-semibold">Add-ons Terkait</th>
<th class="py-3.5 px-3 font-semibold">Jadwal Sedia</th>
<th class="py-3.5 px-3 font-semibold">Stok POS</th>
<th class="py-3.5 px-4 font-semibold text-right">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-high font-body-sm text-body-sm">
<!-- Row 1: Ayam Sambal Hitam -->

<tr class="hover:bg-surface-container-low/60 transition-colors menu-row" data-category="makanan" data-name="ayam sambal hitam">
    <td class="py-3 px-4">
        <div class="flex items-center gap-3">
            <img alt="Ayam Sambal Hitam" class="w-12 h-12 rounded-lg object-cover shadow-xs flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAseBCgLlKvglK19k6q3tGfvM1iw9IBQmbXmn3ehLWSq8fbhHMDPDVz92jv8LZYOrzoowak64UMru87F42krHU6bbiku6zBLt_pSD-R0vHSdm5BjhKS0fY5s84m5Pf-53DzDFiL_6pbIEsvH0vaCzjQ8nVUnp7_aqaIMCB3moyjsTw15V3RQgcdoKtY0h3nF1kh57Tp1AA8W301LQqvP27lpeXQgv12u39cgkbrvsI"/>
            <div>
                <span class="text-sm text-on-surface font-bold block leading-snug">Ayam Sambal Hitam + Nasi</span>
                <span class="text-[11px] text-outline">SKU: WJ-MK-001</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-3">
        <span class="px-2.5 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold whitespace-nowrap">Makanan</span>
    </td>
    <td class="py-3 px-3">
        <span class="text-xs font-bold text-on-surface">Rp 18.000</span>
    </td>
    <td class="py-3 px-3">
        <div class="flex flex-wrap gap-1 max-w-[170px]">
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Sambal Ekstra</span>
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">+ Nasi</span>
        </div>
    </td>
    <td class="py-3 px-3 whitespace-nowrap">
        <span class="inline-flex items-center gap-1 text-xs text-secondary font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Setiap Hari
        </span>
    </td>
    <td class="py-3 px-3">
        <label class="relative inline-flex items-center cursor-pointer">
            <input checked class="sr-only peer" type="checkbox" onchange="toggleStockStatus('Ayam Sambal Hitam', this)"/>
            <div class="w-8 h-4 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-secondary"></div>
            <span class="ml-2 text-xs text-secondary font-semibold">Tersedia (8)</span>
        </label>
    </td>
    <td class="py-3 px-4 text-right whitespace-nowrap">
        <div class="flex items-center justify-end gap-1">
            <button class="p-1.5 text-outline hover:text-primary rounded-full hover:bg-surface-container transition-colors" title="Ubah Menu">
                <span class="material-symbols-outlined text-base">edit</span>
            </button>
            <button class="p-1.5 text-outline hover:text-error rounded-full hover:bg-surface-container transition-colors" title="Hapus Menu">
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-surface-container-low/60 transition-colors menu-row" data-category="new-menu" data-name="nila sambal pecak">
    <td class="py-3 px-4">
        <div class="flex items-center gap-3">
            <img alt="Nila Sambal Pecak" class="w-12 h-12 rounded-lg object-cover shadow-xs flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBupdXrBjOyprPnY_7-1aN1i5BzUqxh185-mO8qYrdFt3WM7NnAXeYoqwSfIGbn-BJG--neehPAoHGvXGf6QK2pxL7kAzWZhTfGK2UaB7FXOkw8eFEV2-6ud-l24UXN-vrQH7JZWp4Dd7n7Nix9oIXQdKevnb0SrBPQTkQSeAgfKdfkHFXnXwdg4-_aEkHYlMkC__wVwbioPmRlYPMMYRaHsMxGnxViY03kBXOtvYI"/>
            <div>
                <div class="flex items-center gap-1.5">
                    <span class="text-sm text-on-surface font-bold leading-snug">Nila Sambal Pecak + Nasi</span>
                    <span class="px-1.5 py-0.2 rounded bg-tertiary-fixed text-on-tertiary-fixed text-[10px] font-bold">New</span>
                </div>
                <span class="text-[11px] text-outline">SKU: WJ-NM-002</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-3">
        <span class="px-2.5 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-xs font-semibold whitespace-nowrap">New Menu</span>
    </td>
    <td class="py-3 px-3">
        <span class="text-xs font-bold text-on-surface">Rp 18.000</span>
    </td>
    <td class="py-3 px-3">
        <div class="flex flex-wrap gap-1 max-w-[170px]">
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Sambal Pecak</span>
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">+ Nasi</span>
        </div>
    </td>
    <td class="py-3 px-3 whitespace-nowrap">
        <span class="inline-flex items-center gap-1 text-xs text-secondary font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Setiap Hari
        </span>
    </td>
    <td class="py-3 px-3">
        <label class="relative inline-flex items-center cursor-pointer">
            <input checked class="sr-only peer" type="checkbox" onchange="toggleStockStatus('Nila Sambal Pecak', this)"/>
            <div class="w-8 h-4 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-secondary"></div>
            <span class="ml-2 text-xs text-secondary font-semibold">Tersedia (14)</span>
        </label>
    </td>
    <td class="py-3 px-4 text-right whitespace-nowrap">
        <div class="flex items-center justify-end gap-1">
            <button class="p-1.5 text-outline hover:text-primary rounded-full hover:bg-surface-container transition-colors" title="Ubah Menu">
                <span class="material-symbols-outlined text-base">edit</span>
            </button>
            <button class="p-1.5 text-outline hover:text-error rounded-full hover:bg-surface-container transition-colors" title="Hapus Menu">
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-surface-container-low/60 transition-colors menu-row" data-category="makanan" data-name="ayam kremes">
    <td class="py-3 px-4">
        <div class="flex items-center gap-3">
            <img alt="Ayam Kremes" class="w-12 h-12 rounded-lg object-cover shadow-xs flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2ZA9WrHg5Dno3OOJTde16u89BnLota71PnnHOeKCtDOtIrhTsTRDOxLipA7LXYFZcTuocwJWZS2K5BAuZbqLtdny_2qOr2i7phO2dsgOPMW6sForeS1Bwx6sQef4eC3-aJFq2QSppCZXddJtrKblUS7pmoRw-lmocMTwmueOUQq82F0-8K9dDhpB2PtVsP0xXFUYYnFSF5STyChjJrvNxlHpRo5xOPjb7PnLaixo"/>
            <div>
                <span class="text-sm text-on-surface font-bold block leading-snug">Ayam Kremes + Nasi</span>
                <span class="text-[11px] text-outline">SKU: WJ-MK-003</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-3">
        <span class="px-2.5 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold whitespace-nowrap">Makanan</span>
    </td>
    <td class="py-3 px-3">
        <span class="text-xs font-bold text-on-surface">Rp 17.000</span>
    </td>
    <td class="py-3 px-3">
        <div class="flex flex-wrap gap-1 max-w-[170px]">
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Ekstra Kremes</span>
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Sambal</span>
        </div>
    </td>
    <td class="py-3 px-3 whitespace-nowrap">
        <span class="inline-flex items-center gap-1 text-xs text-secondary font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Setiap Hari
        </span>
    </td>
    <td class="py-3 px-3">
        <label class="relative inline-flex items-center cursor-pointer">
            <input checked class="sr-only peer" type="checkbox" onchange="toggleStockStatus('Ayam Kremes', this)"/>
            <div class="w-8 h-4 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-secondary"></div>
            <span class="ml-2 text-xs text-secondary font-semibold">Tersedia (20)</span>
        </label>
    </td>
    <td class="py-3 px-4 text-right whitespace-nowrap">
        <div class="flex items-center justify-end gap-1">
            <button class="p-1.5 text-outline hover:text-primary rounded-full hover:bg-surface-container transition-colors" title="Ubah Menu">
                <span class="material-symbols-outlined text-base">edit</span>
            </button>
            <button class="p-1.5 text-outline hover:text-error rounded-full hover:bg-surface-container transition-colors" title="Hapus Menu">
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-surface-container-low/60 transition-colors menu-row" data-category="makanan" data-name="ayam rica rica">
    <td class="py-3 px-4">
        <div class="flex items-center gap-3">
            <img alt="Ayam Rica-Rica" class="w-12 h-12 rounded-lg object-cover shadow-xs flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBD_VYec1KvfH96zkIuhIA8Tp20ynYUcEp00mGKcyU1aH7kNOnQWZ7NQnR7hR8po-atVgW9u2vPHge3VHg4XTcJ8pgdjvAV2wjHe6gRp9Z3Vj5eHbxiiRH0v-j0AsXQ5SNcy12gi375JoYsoRIwrLFPfjjuz4e901TKrh3Fzz7NuDFtFJFIt0YNomFga_UeuRFhbgYV-waL8ApqYZeag7r5JX5VUPqHAwctiBIeap8"/>
            <div>
                <span class="text-sm text-on-surface font-bold block leading-snug">Ayam Rica-Rica + Nasi</span>
                <span class="text-[11px] text-outline">SKU: WJ-MK-004</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-3">
        <span class="px-2.5 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold whitespace-nowrap">Makanan</span>
    </td>
    <td class="py-3 px-3">
        <span class="text-xs font-bold text-on-surface">Rp 20.000</span>
    </td>
    <td class="py-3 px-3">
        <div class="flex flex-wrap gap-1 max-w-[170px]">
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Ekstra Pedas</span>
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">+ Nasi</span>
        </div>
    </td>
    <td class="py-3 px-3 whitespace-nowrap">
        <span class="inline-flex items-center gap-1 text-xs text-secondary font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Setiap Hari
        </span>
    </td>
    <td class="py-3 px-3">
        <label class="relative inline-flex items-center cursor-pointer">
            <input checked class="sr-only peer" type="checkbox" onchange="toggleStockStatus('Ayam Rica-Rica', this)"/>
            <div class="w-8 h-4 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-secondary"></div>
            <span class="ml-2 text-xs text-secondary font-semibold">Tersedia (11)</span>
        </label>
    </td>
    <td class="py-3 px-4 text-right whitespace-nowrap">
        <div class="flex items-center justify-end gap-1">
            <button class="p-1.5 text-outline hover:text-primary rounded-full hover:bg-surface-container transition-colors" title="Ubah Menu">
                <span class="material-symbols-outlined text-base">edit</span>
            </button>
            <button class="p-1.5 text-outline hover:text-error rounded-full hover:bg-surface-container transition-colors" title="Hapus Menu">
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-surface-container-low/60 transition-colors menu-row" data-category="minuman" data-name="jus pokat">
    <td class="py-3 px-4">
        <div class="flex items-center gap-3">
            <img alt="Jus Pokat" class="w-12 h-12 rounded-lg object-cover shadow-xs flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzw2z7cpXXboYJIm5fV6iixUIwisD10Fao6KluZuSPDGOR9jdJAcYU_M9lp7LS-ZM5ZhXbpCwFyYniBTjlUn9idmBd7Em3siA1mU0MhgogN9GU8qbzi6lu08Ujc6n4tjn_SePJfUTU7T-jRfe8ei3lVNjDwBJUtYGhxwbCQdAcEoqOwIrjwYbcBzM4LxZYM8Oq7jCH0jgbHgj8g4kGyi5Hz6fvmzXrLane0LVLmUY"/>
            <div>
                <span class="text-sm text-on-surface font-bold block leading-snug">Jus Pokat (Alpukat)</span>
                <span class="text-[11px] text-outline">SKU: WJ-MN-006</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-3">
        <span class="px-2.5 py-1 rounded-full bg-secondary-fixed text-secondary text-xs font-semibold whitespace-nowrap">Minuman</span>
    </td>
    <td class="py-3 px-3">
        <span class="text-xs font-bold text-on-surface">Rp 8.000</span>
    </td>
    <td class="py-3 px-3">
        <div class="flex flex-wrap gap-1 max-w-[170px]">
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Oreo</span>
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Chocochips</span>
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Ice Cream</span>
        </div>
    </td>
    <td class="py-3 px-3 whitespace-nowrap">
        <span class="inline-flex items-center gap-1 text-xs text-secondary font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Setiap Hari
        </span>
    </td>
    <td class="py-3 px-3">
        <label class="relative inline-flex items-center cursor-pointer">
            <input checked class="sr-only peer" type="checkbox" onchange="toggleStockStatus('Jus Pokat', this)"/>
            <div class="w-8 h-4 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-secondary"></div>
            <span class="ml-2 text-xs text-secondary font-semibold">Tersedia (25)</span>
        </label>
    </td>
    <td class="py-3 px-4 text-right whitespace-nowrap">
        <div class="flex items-center justify-end gap-1">
            <button class="p-1.5 text-outline hover:text-primary rounded-full hover:bg-surface-container transition-colors" title="Ubah Menu">
                <span class="material-symbols-outlined text-base">edit</span>
            </button>
            <button class="p-1.5 text-outline hover:text-error rounded-full hover:bg-surface-container transition-colors" title="Hapus Menu">
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-surface-container-low/60 transition-colors menu-row" data-category="makanan" data-name="ceker mercon">
    <td class="py-3 px-4">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-lg bg-error-container text-on-error-container flex items-center justify-center font-bold text-xs shadow-xs flex-shrink-0">
                <span class="material-symbols-outlined text-xl">local_fire_department</span>
            </div>
            <div>
                <div class="flex items-center gap-1.5">
                    <span class="text-sm text-on-surface font-bold leading-snug">Ceker Mercon [Only Kamis]</span>
                    <span class="px-1.5 py-0.2 rounded bg-error-container text-on-error-container text-[10px] font-bold">Spesial</span>
                </div>
                <span class="text-[11px] text-outline">SKU: WJ-MK-008</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-3">
        <span class="px-2.5 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold whitespace-nowrap">Makanan</span>
    </td>
    <td class="py-3 px-3">
        <span class="text-xs font-bold text-on-surface">Rp 10.000</span>
    </td>
    <td class="py-3 px-3">
        <div class="flex flex-wrap gap-1 max-w-[170px]">
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">+ Nasi</span>
        </div>
    </td>
    <td class="py-3 px-3 whitespace-nowrap">
        <span class="inline-flex items-center gap-1 text-xs text-tertiary-container font-semibold">
            <span class="material-symbols-outlined text-xs">event</span> Hanya Kamis
        </span>
    </td>
    <td class="py-3 px-3">
        <label class="relative inline-flex items-center cursor-pointer">
            <input checked class="sr-only peer" type="checkbox" onchange="toggleStockStatus('Ceker Mercon', this)"/>
            <div class="w-8 h-4 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-secondary"></div>
            <span class="ml-2 text-xs text-secondary font-semibold">Tersedia (18)</span>
        </label>
    </td>
    <td class="py-3 px-4 text-right whitespace-nowrap">
        <div class="flex items-center justify-end gap-1">
            <button class="p-1.5 text-outline hover:text-primary rounded-full hover:bg-surface-container transition-colors" title="Ubah Menu">
                <span class="material-symbols-outlined text-base">edit</span>
            </button>
            <button class="p-1.5 text-outline hover:text-error rounded-full hover:bg-surface-container transition-colors" title="Hapus Menu">
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    </td>
</tr>

<tr class="hover:bg-surface-container-low/60 transition-colors menu-row" data-category="minuman" data-name="teh tarik milo">
    <td class="py-3 px-4">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-lg bg-surface-container text-primary flex items-center justify-center font-bold text-xs shadow-xs flex-shrink-0">
                <span class="material-symbols-outlined text-xl">local_cafe</span>
            </div>
            <div>
                <span class="text-sm text-on-surface font-bold block leading-snug">Teh Tarik / Milo Dingin</span>
                <span class="text-[11px] text-outline">SKU: WJ-MN-013</span>
            </div>
        </div>
    </td>
    <td class="py-3 px-3">
        <span class="px-2.5 py-1 rounded-full bg-secondary-fixed text-secondary text-xs font-semibold whitespace-nowrap">Minuman</span>
    </td>
    <td class="py-3 px-3">
        <span class="text-xs font-bold text-on-surface">Rp 6.000</span>
    </td>
    <td class="py-3 px-3">
        <div class="flex flex-wrap gap-1 max-w-[170px]">
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Ice Cream</span>
            <span class="px-1.5 py-0.5 rounded bg-surface-container-high text-on-surface-variant text-[10px]">Oreo</span>
        </div>
    </td>
    <td class="py-3 px-3 whitespace-nowrap">
        <span class="inline-flex items-center gap-1 text-xs text-secondary font-medium">
            <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Setiap Hari
        </span>
    </td>
    <td class="py-3 px-3">
        <label class="relative inline-flex items-center cursor-pointer">
            <input checked class="sr-only peer" type="checkbox" onchange="toggleStockStatus('Teh Tarik', this)"/>
            <div class="w-8 h-4 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-secondary"></div>
            <span class="ml-2 text-xs text-secondary font-semibold">Tersedia (40)</span>
        </label>
    </td>
    <td class="py-3 px-4 text-right whitespace-nowrap">
        <div class="flex items-center justify-end gap-1">
            <button class="p-1.5 text-outline hover:text-primary rounded-full hover:bg-surface-container transition-colors" title="Ubah Menu">
                <span class="material-symbols-outlined text-base">edit</span>
            </button>
            <button class="p-1.5 text-outline hover:text-error rounded-full hover:bg-surface-container transition-colors" title="Hapus Menu">
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    </td>
</tr>
</tbody>
</table>
</div>

<!-- Pagination Footer -->
<div class="p-4 bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-on-surface-variant border-t border-outline-variant/30">
    <div>
        <span>Menampilkan <strong class="text-on-surface">1 - 7</strong> dari <strong class="text-on-surface">43</strong> Menu Terdaftar</span>
    </div>
    <div class="flex items-center gap-1.5">
        <button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest text-outline hover:text-on-surface transition-colors shadow-xs" disabled>
            Sebelumnya
        </button>
        <button class="w-7 h-7 rounded-lg bg-primary text-on-primary font-bold shadow-xs flex items-center justify-center">1</button>
        <button class="w-7 h-7 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface font-semibold shadow-xs flex items-center justify-center">2</button>
        <button class="w-7 h-7 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface font-semibold shadow-xs flex items-center justify-center">3</button>
        <button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest text-on-surface hover:bg-surface-container transition-colors shadow-xs">
            Selanjutnya
        </button>
    </div>
</div>
</div>
</main>
</div>
</div>
<!-- MODAL: Tambah Menu Baru -->
<div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-xs hidden items-center justify-center p-4" id="modal-tambah-menu">
    <div class="bg-surface-container-lowest max-w-lg w-full rounded-2xl shadow-xl overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        <div class="p-4 bg-surface-container flex items-center justify-between border-b border-outline-variant/30">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">add_circle</span>
                <h3 class="text-base font-bold text-on-surface">Tambah Menu Baru</h3>
            </div>
            <button class="p-1 rounded-full hover:bg-surface-container-high text-outline" onclick="document.getElementById('modal-tambah-menu').classList.add('hidden')">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
        <form class="p-5 space-y-4" onsubmit="handleNewMenuSubmit(event)">
            <div>
                <label class="block text-xs font-semibold text-on-surface mb-1">Nama Menu</label>
                <input type="text" id="new-menu-name" required placeholder="Contoh: Bebek Goreng Sambal Ijo" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-on-surface mb-1">Kategori</label>
                    <select id="new-menu-category" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20">
                        <option value="makanan">Makanan</option>
                        <option value="new-menu">New Menu</option>
                        <option value="minuman">Minuman</option>
                        <option value="additional">Additional</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-on-surface mb-1">Harga (Rp)</label>
                    <input type="number" id="new-menu-price" required placeholder="20000" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-on-surface mb-1">Deskripsi Singkat</label>
                <textarea rows="2" id="new-menu-desc" placeholder="Tuliskan bumbu atau keunikan rasa hidangan..." class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 resize-none"></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-on-surface mb-1">Jadwal Ketersediaan</label>
                <select id="new-menu-schedule" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <option value="everyday">Setiap Hari</option>
                    <option value="kamis">Hanya Kamis (Spesial)</option>
                    <option value="weekend">Akhir Pekan (Sabtu - Minggu)</option>
                </select>
            </div>
            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" class="px-4 py-2 rounded-full text-xs font-semibold text-on-surface-variant hover:bg-surface-container" onclick="document.getElementById('modal-tambah-menu').classList.add('hidden')">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 rounded-full bg-primary text-on-primary text-xs font-bold shadow-md hover:bg-primary-container transition-colors">
                    Simpan Menu Baru
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL: Tambah Kategori Baru -->
<div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-xs hidden items-center justify-center p-4" id="modal-tambah-kategori">
    <div class="bg-surface-container-lowest max-w-sm w-full rounded-2xl shadow-xl overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        <div class="p-4 bg-surface-container flex items-center justify-between border-b border-outline-variant/30">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">category</span>
                <h3 class="text-base font-bold text-on-surface">Tambah Kategori Baru</h3>
            </div>
            <button class="p-1 rounded-full hover:bg-surface-container-high text-outline" onclick="document.getElementById('modal-tambah-kategori').classList.add('hidden')">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
        <form class="p-5 space-y-4" onsubmit="handleNewCategorySubmit(event)">
            <div>
                <label class="block text-xs font-semibold text-on-surface mb-1">Nama Kategori</label>
                <input type="text" id="new-cat-name" required placeholder="Contoh: Paket Hemat" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-on-surface mb-1">Icon Material Symbol</label>
                <input type="text" id="new-cat-icon" placeholder="lunch_dining" value="restaurant" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" class="px-4 py-2 rounded-full text-xs font-semibold text-on-surface-variant hover:bg-surface-container" onclick="document.getElementById('modal-tambah-kategori').classList.add('hidden')">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 rounded-full bg-primary text-on-primary text-xs font-bold shadow-md hover:bg-primary-container transition-colors">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL: Tambah Master Add-on -->
<div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-xs hidden items-center justify-center p-4" id="modal-tambah-addon">
    <div class="bg-surface-container-lowest max-w-sm w-full rounded-2xl shadow-xl overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        <div class="p-4 bg-surface-container flex items-center justify-between border-b border-outline-variant/30">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">extension</span>
                <h3 class="text-base font-bold text-on-surface">Tambah Add-on Master</h3>
            </div>
            <button class="p-1 rounded-full hover:bg-surface-container-high text-outline" onclick="document.getElementById('modal-tambah-addon').classList.add('hidden')">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
        <form class="p-5 space-y-4" onsubmit="handleNewAddonSubmit(event)">
            <div>
                <label class="block text-xs font-semibold text-on-surface mb-1">Nama Add-on</label>
                <input type="text" id="new-addon-name" required placeholder="Contoh: Ekstra Sambal Bajak" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div>
                <label class="block text-xs font-semibold text-on-surface mb-1">Harga Ekstra (Rp)</label>
                <input type="number" id="new-addon-price" required placeholder="3000" class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-primary/20"/>
            </div>
            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" class="px-4 py-2 rounded-full text-xs font-semibold text-on-surface-variant hover:bg-surface-container" onclick="document.getElementById('modal-tambah-addon').classList.add('hidden')">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 rounded-full bg-secondary text-on-secondary text-xs font-bold shadow-md hover:opacity-95 transition-colors">
                    Simpan Add-on
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Toast Container -->
<div class="fixed bottom-6 right-6 z-50 bg-inverse-surface text-inverse-on-surface px-4 py-2.5 rounded-full shadow-lg transform translate-y-20 opacity-0 transition-all flex items-center gap-2 text-xs font-medium" id="katalog-toast">
    <span class="material-symbols-outlined text-secondary text-base">check_circle</span>
    <span id="katalog-toast-message">Operasi berhasil</span>
</div>

<script>
    function showToast(msg) {
        const toast = document.getElementById('katalog-toast');
        const msgEl = document.getElementById('katalog-toast-message');
        msgEl.innerText = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0');
            toast.classList.remove('translate-y-0', 'opacity-100');
        }, 2500);
    }

    function toggleStockStatus(name, checkbox) {
        if (checkbox.checked) {
            showToast(name + ' diatur: Tersedia di Kasir');
        } else {
            showToast(name + ' diatur: Habis (Disembunyikan di Kasir)');
        }
    }

    function handleNewMenuSubmit(e) {
        e.preventDefault();
        const name = document.getElementById('new-menu-name').value;
        document.getElementById('modal-tambah-menu').classList.add('hidden');
        showToast('Menu baru "' + name + '" berhasil disimpan ke database!');
        e.target.reset();
    }

    function handleNewCategorySubmit(e) {
        e.preventDefault();
        const catName = document.getElementById('new-cat-name').value;
        document.getElementById('modal-tambah-kategori').classList.add('hidden');
        showToast('Kategori baru "' + catName + '" berhasil ditambahkan!');
        e.target.reset();
    }

    function handleNewAddonSubmit(e) {
        e.preventDefault();
        const addonName = document.getElementById('new-addon-name').value;
        document.getElementById('modal-tambah-addon').classList.add('hidden');
        showToast('Add-on "' + addonName + '" berhasil diaktifkan untuk POS!');
        e.target.reset();
    }

    // Search filter
    const searchMenu = document.querySelector('input[placeholder*="Cari nama menu"]');
    if (searchMenu) {
        searchMenu.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase().trim();
            const rows = document.querySelectorAll('.menu-row');
            rows.forEach(row => {
                const name = row.getAttribute('data-name') || '';
                const text = row.textContent.toLowerCase();
                if (text.includes(query) || name.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
</script>
</main>

<footer class="w-full bg-surface-container-low py-4 mt-9">
    <div class="max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-on-surface-variant">
        <div class="flex items-center gap-3">
            <span class="font-semibold text-on-surface">Warung Jamsek POS v2.4</span>
            <span>•</span>
            <span>Master Katalog &amp; Addons Terintegrasi Kitchen Display</span>
        </div>
        <div>
            <span>Kasir Shift 1 • Mode Manajemen Menu</span>
        </div>
    </div>
</footer>
@endsection