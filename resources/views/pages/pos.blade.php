@extends('layouts.app', ['title' => 'Kasir & POS - Warung Jamsek'])

@section('content')
<x-header-admin active="pos" />

<main class="w-full pt-28 bg-surface flex-1 max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10">
<div class="flex flex-col w-full">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start py-space-sm">
<!-- LEFT PANEL: Catalog, Filters, Search & Menu Grid (8 Cols on Desktop) -->
<section class="lg:col-span-7 xl:col-span-8 flex flex-col gap-space-md">
<!-- Top Action Bar & Ambient Status Banner -->
<div class="bg-surface-container-low rounded-xl p-space-md shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm min-w-0">
<div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">restaurant_menu</span>
</div>
<div class="min-w-0">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface">Pilih Menu Warung</span>
<span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-2 py-0.5 rounded-full font-semibold">19 Item Siap</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">Sentuh menu untuk menambahkan ke pesanan aktif kasir</p>
</div>
</div>
<!-- Quick Search & Shift Badge -->
<div class="flex items-center gap-space-xs self-stretch sm:self-auto">
<div class="relative flex-1 sm:w-56">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-base">search</span>
<input class="w-full pl-8 pr-3 py-1.5 bg-surface-container-lowest text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-full focus:outline-none focus:ring-2 focus:ring-primary/20 shadow-sm" id="menu-search-input" placeholder="Cari ayam, nila, jus..." type="text"/>
</div>
<button class="px-3 py-1.5 bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-sm text-label-sm rounded-full flex items-center gap-1 transition-colors shrink-0 shadow-sm" onclick="openAddonQuickModal()" title="Quick Add-on Modal" type="button">
<span class="material-symbols-outlined text-sm text-primary">add_circle</span>
<span class="hidden sm:inline">Addons Cepat</span>
</button>
</div>
</div>
<!-- Category Filter Pills (Horizontal Soft Scroll) -->
<div class="flex items-center gap-2 overflow-x-auto pb-1 no-scrollbar scroll-smooth">
<button class="category-pill active-pill px-4 py-2 rounded-full font-label-md text-label-md transition-all shrink-0 bg-primary text-on-primary shadow-sm flex items-center gap-1.5" onclick="filterCategory('all', this)" type="button">
<span class="material-symbols-outlined text-sm">grid_view</span>
          Semua Menu
        </button>
<button class="category-pill px-4 py-2 rounded-full font-label-md text-label-md transition-all shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface flex items-center gap-1.5" onclick="filterCategory('makanan', this)" type="button">
<span class="material-symbols-outlined text-sm text-primary">lunch_dining</span>
          Makanan
        </button>
<button class="category-pill px-4 py-2 rounded-full font-label-md text-label-md transition-all shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface flex items-center gap-1.5" onclick="filterCategory('new-menu', this)" type="button">
<span class="material-symbols-outlined text-sm text-tertiary">local_fire_department</span>
          New Menu
          <span class="w-2 h-2 rounded-full bg-primary animate-ping"></span>
</button>
<button class="category-pill px-4 py-2 rounded-full font-label-md text-label-md transition-all shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface flex items-center gap-1.5" onclick="filterCategory('minuman', this)" type="button">
<span class="material-symbols-outlined text-sm text-secondary">local_cafe</span>
          Minuman
        </button>
<button class="category-pill px-4 py-2 rounded-full font-label-md text-label-md transition-all shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface flex items-center gap-1.5" onclick="filterCategory('addons', this)" type="button">
<span class="material-symbols-outlined text-sm text-outline">tune</span>
          Additional/Addons
        </button>
</div>
<!-- Menu Grid: High Polish, Soft Biscotti Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-space-sm sm:gap-space-md" id="menu-cards-grid">
<!-- ITEM: Nila Sambal Pecak + Nasi (New Menu / Favorit) -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="new-menu makanan" onclick="handleMenuClick('Nila Sambal Pecak + Nasi', 18000, 'Ikan Nila goreng renyah disiram sambal rawit pecak segar rempah Jawa')">
<div class="relative w-full aspect-[4/3] rounded-lg overflow-hidden mb-space-sm bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Traditional Indonesian fried tilapia fish Nila Sambal Pecak with warm white rice, fresh tomato slices, shallots, crushed green bird's eye chili relish, served in rustic warm earthenware terracotta plating, food photography soft ambient morning light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBupdXrBjOyprPnY_7-1aN1i5BzUqxh185-mO8qYrdFt3WM7NnAXeYoqwSfIGbn-BJG--neehPAoHGvXGf6QK2pxL7kAzWZhTfGK2UaB7FXOkw8eFEV2-6ud-l24UXN-vrQH7JZWp4Dd7n7Nix9oIXQdKevnb0SrBPQTkQSeAgfKdfkHFXnXwdg4-_aEkHYlMkC__wVwbioPmRlYPMMYRaHsMxGnxViY03kBXOtvYI"/>
<div class="absolute top-2 left-2 flex flex-wrap gap-1">
<span class="bg-primary text-on-primary font-label-sm text-label-sm px-2 py-0.5 rounded-full shadow-sm flex items-center gap-0.5">
<span class="material-symbols-outlined text-[12px]">local_fire_department</span> New Menu
              </span>
<span class="bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded-full shadow-sm font-semibold">
                Favorit
              </span>
</div>
</div>
<div>
<div class="flex items-start justify-between gap-1">
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors leading-snug">Nila Sambal Pecak + Nasi</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Nila goreng garing berbumbu kunyit disiram racikan sambal pecak rawit segar khas Warung Jamsek.</p>
</div>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-outline">Harga Porsi</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 18.000</span>
</div>
<button class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center hover:scale-110 active:scale-95 transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-lg">add</span>
</button>
</div>
</div>
<!-- ITEM: Ayam Kremes + Nasi -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="makanan" onclick="handleMenuClick('Ayam Kremes + Nasi', 17000, 'Ayam ungkep rempah gurih disajikan dengan taburan kremesan sarang burung gurih melimpah')">
<div class="relative w-full aspect-[4/3] rounded-lg overflow-hidden mb-space-sm bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Indonesian golden crispy Ayam Goreng Kremes paired with steaming aromatic white rice, golden savory flakes batter crumbs, side cucumber and homemade sambal bajak, daylight bistro tabletop aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2ZA9WrHg5Dno3OOJTde16u89BnLota71PnnHOeKCtDOtIrhTsTRDOxLipA7LXYFZcTuocwJWZS2K5BAuZbqLtdny_2qOr2i7phO2dsgOPMW6sForeS1Bwx6sQef4eC3-aJFq2QSppCZXddJtrKblUS7pmoRw-lmocMTwmueOUQq82F0-8K9dDhpB2PtVsP0xXFUYYnFSF5STyChjJrvNxlHpRo5xOPjb7PnLaixo"/>
<div class="absolute top-2 left-2 flex gap-1">
<span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-2 py-0.5 rounded-full shadow-sm font-semibold">
                Best Seller
              </span>
</div>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors leading-snug">Ayam Kremes + Nasi</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Ayam goreng empuk berselimut rempah kemiri dengan limpahan kremes kriuk garing khas rumahan.</p>
</div>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-outline">Harga Porsi</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 17.000</span>
</div>
<button class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center hover:scale-110 active:scale-95 transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-lg">add</span>
</button>
</div>
</div>
<!-- ITEM: Ayam Rica-Rica + Nasi -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="makanan" onclick="handleMenuClick('Ayam Rica-Rica + Nasi', 20000, 'Potongan ayam empuk bumbu pedas daun kemangi wangi pedas nampol')">
<div class="relative w-full aspect-[4/3] rounded-lg overflow-hidden mb-space-sm bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Spicy Indonesian Ayam Rica-Rica stewed chicken glaced in fiery red aromatic chili sauce with torn lemon basil leaves kemangi, plated next to fresh rice bowl in warm earthy aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBD_VYec1KvfH96zkIuhIA8Tp20ynYUcEp00mGKcyU1aH7kNOnQWZ7NQnR7hR8po-atVgW9u2vPHge3VHg4XTcJ8pgdjvAV2wjHe6gRp9Z3Vj5eHbxiiRH0v-j0AsXQ5SNcy12gi375JoYsoRIwrLFPfjjuz4e901TKrh3Fzz7NuDFtFJFIt0YNomFga_UeuRFhbgYV-waL8ApqYZeag7r5JX5VUPqHAwctiBIeap8"/>
<div class="absolute top-2 left-2 flex gap-1">
<span class="bg-primary/10 text-primary font-label-sm text-label-sm px-2 py-0.5 rounded-full font-bold shadow-sm">
                Pedas Mantap
              </span>
</div>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors leading-snug">Ayam Rica-Rica + Nasi</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Ayam bumbu merah cabai rawit pedas harum kemangi segar, sudah lengkap dengan nasi putih pulen.</p>
</div>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-outline">Harga Porsi</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 20.000</span>
</div>
<button class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center hover:scale-110 active:scale-95 transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-lg">add</span>
</button>
</div>
</div>
<!-- ITEM: Nila Rica-Rica + Nasi (New Menu) -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="new-menu makanan" onclick="handleMenuClick('Nila Rica-Rica + Nasi', 18000, 'Ikan nila goreng renyah diguyur kuah rica pedas kemangi')">
<div class="flex items-start justify-between gap-2">
<div>
<span class="inline-block bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded-full mb-1">New Menu</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Nila Rica-Rica + Nasi</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 18.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Ikan nila segar digoreng renyah dengan siraman bumbu rica-rica kaya rempah wangi jeruk limau.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary flex items-center gap-1 font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>Tersedia 14 Porsi
            </span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Ayam Sambal Hitam + Nasi (New Menu) -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="new-menu makanan" onclick="handleMenuClick('Ayam Sambal Hitam + Nasi', 18000, 'Ayam goreng dengan sambal hitam khas Madura gurih pekat beraroma rempah sangrai')">
<div class="flex items-start justify-between gap-2">
<div>
<span class="inline-block bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded-full mb-1">New Menu</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Ayam Sambal Hitam + Nasi</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 18.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Karakter pedas gurih medok dari bumbu hitam kelapa sangrai dan rempah tradisi nusantara.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary flex items-center gap-1 font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>Tersedia 8 Porsi
            </span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Ayam Pecak + Nasi (New Menu) -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="new-menu makanan" onclick="handleMenuClick('Ayam Pecak + Nasi', 17000, 'Ayam goreng sambal pecak kuah asam segar pedas rawit')">
<div class="flex items-start justify-between gap-2">
<div>
<span class="inline-block bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded-full mb-1">New Menu</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Ayam Pecak + Nasi</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 17.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Sensasi asam gurih sambal ulek mentah disiram minyak panas wangi jahe dan bawang merah.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary flex items-center gap-1 font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>Tersedia
            </span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Jus Pokat (Minuman) -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="minuman" onclick="handleMenuClick('Jus Pokat', 8000, 'Alpukat mentega asli dikocok kental dengan susu cokelat manis pas')">
<div class="relative w-full aspect-[4/3] rounded-lg overflow-hidden mb-space-sm bg-surface-container">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Thick creamy Indonesian Avocado juice Jus Alpukat layered with swirls of chocolate condensed milk inside a clear tumbler glass, cafe setting warm tone natural light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzw2z7cpXXboYJIm5fV6iixUIwisD10Fao6KluZuSPDGOR9jdJAcYU_M9lp7LS-ZM5ZhXbpCwFyYniBTjlUn9idmBd7Em3siA1mU0MhgogN9GU8qbzi6lu08Ujc6n4tjn_SePJfUTU7T-jRfe8ei3lVNjDwBJUtYGhxwbCQdAcEoqOwIrjwYbcBzM4LxZYM8Oq7jCH0jgbHgj8g4kGyi5Hz6fvmzXrLane0LVLmUY"/>
<div class="absolute top-2 left-2 flex gap-1">
<span class="bg-secondary text-on-secondary font-label-sm text-label-sm px-2 py-0.5 rounded-full shadow-sm">
                Segar Alami
              </span>
</div>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors leading-snug">Jus Pokat</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Alpukat mentega matang pohon dengan spiral saus cokelat manis legit menyegarkan.</p>
</div>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-outline">Harga Gelas</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 8.000</span>
</div>
<button class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center hover:scale-110 active:scale-95 transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-lg">add</span>
</button>
</div>
</div>
<!-- ITEM: Nasi Goreng -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="makanan" onclick="handleMenuClick('Nasi Goreng', 12000, 'Nasi goreng kampung bumbu terasi harum dengan telur orak-arik dan kerupuk')">
<div class="flex items-start justify-between gap-2">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Nasi Goreng</h3>
<span class="font-label-sm text-label-sm text-outline">Favorit Malam &amp; Siang</span>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 12.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Aroma wok hei smokey gurih, dilengkapi irisan acar segar, sawi hijau, dan kerupuk kanji.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary font-semibold">Tersedia Cepat</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Ceker Mercon [Only Kamis] -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="makanan" onclick="handleMenuClick('Ceker Mercon [Only Kamis]', 10000, 'Ceker empuk bumbu cabai rawit melimpah pedas membakar lidah')">
<div class="flex items-start justify-between gap-2">
<div>
<span class="inline-block bg-error-container text-on-error-container font-label-sm text-label-sm px-2 py-0.5 rounded-full mb-1 font-bold">Spesial Kamis</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Ceker Mercon</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 10.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Ceker ayam lembut lepas tulang dengan baluran bumbu pedas rawit merah membakar selera.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-primary font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-sm">schedule</span>Hari ini tersedia
            </span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Mie Pedas (New Menu) -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="new-menu makanan" onclick="handleMenuClick('Mie Pedas', 10000, 'Mie kenyal pedas level rawit dengan taburan pangsit goreng renyah')">
<div class="flex items-start justify-between gap-2">
<div>
<span class="inline-block bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded-full mb-1">New Menu</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Mie Pedas</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 10.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Mie telur kenyal berlumur minyak cabai gurih wangi bawang dengan topping taburan renyah.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary font-semibold">Tersedia</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Ifumie Goreng -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="makanan" onclick="handleMenuClick('Ifumie Goreng', 13000, 'Ifumie renyah gurih goreng dengan sayuran dan bakso')">
<div class="flex items-start justify-between gap-2">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Ifumie Goreng</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 13.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Mi kering renyah digoreng bumbu rempah gurih lengkap dengan sawi segar, telur, dan irisan bakso.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-outline">Pilihan Favorit Meja</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Cah Kangkung -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="makanan" onclick="handleMenuClick('Cah Kangkung', 8000, 'Kangkung segar tumis bawang putih terasi gurih hangat')">
<div class="flex items-start justify-between gap-2">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Cah Kangkung</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 8.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Sayur kangkung hijau dimasak cepat api besar, kuah gurih terasi harum menggugah selera makan.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary font-semibold">Tersedia</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Jus Mangga -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="minuman" onclick="handleMenuClick('Jus Mangga', 9000, 'Jus mangga harum manis dingin kental')">
<div class="flex items-start justify-between gap-2">
<div>
<span class="inline-block bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-2 py-0.5 rounded-full mb-1">Musim Manis</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Jus Mangga</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 9.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Daging buah mangga harum manis murni diblender halus dengan es batu dan gula tebu alami.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary font-semibold">Dingin &amp; Segar</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Jus Naga -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="minuman" onclick="handleMenuClick('Jus Naga', 10000, 'Buah naga merah segar tinggi vitamin')">
<div class="flex items-start justify-between gap-2">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Jus Naga</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 10.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Warna magenta pekat alami dari buah naga merah segar dengan susu kental manis lembut.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary font-semibold">Tersedia</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Teh Tarik / Milo -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="minuman" onclick="handleMenuClick('Teh Tarik / Milo', 6000, 'Teh tarik berbusa lembut atau milo cokelat dingin')">
<div class="flex items-start justify-between gap-2">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Teh Tarik / Milo</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 6.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Pilihan seduhan teh tarik busa tebal atau cokelat malt Milo legendaris dingin nikmat.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-outline">Bisa Panas / Dingin</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Teh Es -->
<div class="menu-card group bg-surface-container-lowest hover:bg-surface-container-low transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm hover:shadow-md flex flex-col justify-between cursor-pointer" data-category="minuman" onclick="handleMenuClick('Teh Es', 3000, 'Teh melati wangi sejuk pelepas dahaga')">
<div class="flex items-start justify-between gap-2">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Teh Es</h3>
</div>
<span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 3.000</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mt-1">Seduhan teh melati tradisional wangi pekat dengan kesegaran es batu kristal higienis.</p>
<div class="flex items-center justify-between mt-space-md pt-space-xs">
<span class="font-label-sm text-label-sm text-secondary font-semibold">Tersedia Cepat</span>
<button class="w-8 h-8 rounded-full bg-surface-container-high group-hover:bg-primary-container group-hover:text-on-primary-container text-on-surface-variant flex items-center justify-center transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-base">add</span>
</button>
</div>
</div>
<!-- ITEM: Addons Card Shortcut -->
<div class="menu-card group bg-surface-container-high/60 hover:bg-surface-container-highest transition-all duration-200 rounded-xl p-space-sm sm:p-space-md shadow-sm flex flex-col justify-between cursor-pointer" data-category="addons" onclick="openAddonQuickModal()">
<div>
<div class="w-10 h-10 rounded-full bg-tertiary/15 text-tertiary flex items-center justify-center mb-2">
<span class="material-symbols-outlined text-xl">tune</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Koleksi Add-ons &amp; Topping</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Sambal ekstra, Nasi putih hangat, Topping Oreo, Chocochips, Ice Cream &amp; Es Kul Kul.</p>
</div>
<div class="mt-space-md flex items-center justify-between text-primary font-label-md text-label-md font-semibold">
<span>Buka Selector Add-on</span>
<span class="material-symbols-outlined text-base">arrow_forward</span>
</div>
</div>
</div>
<!-- Quick Metrics Strip (Cashier Hygiene & Efficiency) -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-space-sm mt-space-xs">
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Total Nota Hari Ini</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">42 Nota</span>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Rata-rata Masak Dapur</span>
<span class="font-headline-sm text-headline-sm text-secondary font-bold">11 Menit</span>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Metode Terpopuler</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">QRIS 68%</span>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg shadow-sm">
<span class="font-label-sm text-label-sm text-outline block">Status Kitchen Printer</span>
<span class="font-label-md text-label-md text-secondary font-semibold flex items-center gap-1 mt-1">
<span class="w-2 h-2 rounded-full bg-secondary"></span>Siap Cetak
          </span>
</div>
</div>
</section>
<!-- RIGHT PANEL: Sticky Order Basket & Billing Checkout (4-5 Cols on Desktop) -->
<aside class="lg:col-span-5 xl:col-span-4 flex flex-col gap-space-md sticky top-32">
<div class="bg-surface-container-lowest rounded-xl shadow-md p-space-md sm:p-space-lg flex flex-col gap-space-md relative overflow-hidden">
<!-- Header Active Order Meta -->
<div class="flex items-center justify-between gap-2 pb-space-xs">
<div>
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary font-label-sm text-label-sm font-bold tracking-wider">#ORD-2024-089</span>
<span class="font-label-sm text-label-sm text-outline">Shift 1</span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface mt-0.5">Ringkasan Pesanan</h2>
</div>
<button class="text-error hover:bg-error-container/30 px-2 py-1 rounded-md font-label-sm text-label-sm flex items-center gap-0.5 transition-colors" onclick="clearCart()" title="Kosongkan Pesanan" type="button">
<span class="material-symbols-outlined text-sm">delete_sweep</span>
            Reset
          </button>
</div>
<!-- Customer & Order Mode Switcher (Dine-in vs Delivery based on ERD) -->
<div class="bg-surface-container-low rounded-lg p-space-sm flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-outline font-semibold">TIPE LAYANAN (ERD)</span>
<div class="inline-flex p-0.5 bg-surface-container-highest rounded-full text-label-sm font-label-sm">
<button class="px-3 py-1 rounded-full bg-primary text-on-primary font-semibold transition-all" id="tab-dinein" onclick="switchOrderType('dine-in')" type="button">
                Dine-In
              </button>
<button class="px-3 py-1 rounded-full text-on-surface-variant hover:text-on-surface transition-all" id="tab-delivery" onclick="switchOrderType('delivery')" type="button">
                Delivery / Kurir
              </button>
</div>
</div>
<div class="grid grid-cols-2 gap-2 mt-1">
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Nama Pelanggan</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-outline text-sm">person</span>
<input class="w-full pl-7 pr-2 py-1.5 bg-surface-container-lowest text-on-surface font-body-sm text-body-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-primary shadow-xs" id="cust-name" type="text" value="Ibu Dewi"/>
</div>
</div>
<div id="table-select-container">
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Nomor Meja</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-outline text-sm">table_restaurant</span>
<input class="w-full pl-7 pr-2 py-1.5 bg-surface-container-lowest text-on-surface font-body-sm text-body-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-primary shadow-xs" id="table-number" type="text" value="Meja 04"/>
</div>
</div>
</div>
<!-- Collapsible Delivery Metadata (Address & Courier Notes in ERD) -->
<div class="hidden flex-col gap-2 mt-2 pt-2 bg-surface-container/50 p-2 rounded-lg" id="delivery-info-container">
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-0.5">Alamat Pengantaran</label>
<input class="w-full px-2.5 py-1.5 bg-surface-container-lowest text-on-surface font-body-sm text-body-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-primary" placeholder="Contoh: Jl. Anggrek No. 12, RT 02/04" type="text"/>
</div>
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-0.5">Catatan Kurir / No. HP</label>
<input class="w-full px-2.5 py-1.5 bg-surface-container-lowest text-on-surface font-body-sm text-body-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-primary" placeholder="0812-xxxx-xxxx (Pagar hijau sebelah pos ronda)" type="text"/>
</div>
</div>
</div>
<!-- Cart Items List: Real Data with Nested Add-ons -->
<div class="flex flex-col gap-space-sm max-h-[340px] overflow-y-auto pr-1 no-scrollbar" id="cart-item-list">
<!-- Item 1: Nila Sambal Pecak + Nasi -->
<div class="cart-item bg-surface-container-low rounded-lg p-space-sm flex flex-col gap-2 transition-all">
<div class="flex items-start justify-between gap-2">
<div class="flex-1 min-w-0">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md text-primary font-bold">1x</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface truncate">Nila Sambal Pecak + Nasi</h4>
</div>
<span class="font-body-sm text-body-sm text-outline">@ Rp 18.000</span>
</div>
<span class="font-label-lg text-label-lg text-on-surface font-bold whitespace-nowrap">Rp 20.000</span>
</div>
<!-- Nested Add-ons & Kitchen Notes -->
<div class="bg-surface-container-lowest rounded-md p-2 flex flex-col gap-1.5">
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-1 text-tertiary">
<span class="material-symbols-outlined text-[13px]">add_circle</span>
<span>Tambah Sambal</span>
</div>
<span class="font-semibold text-on-surface">+Rp 2.000</span>
</div>
<div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm bg-surface-container-high/40 px-2 py-1 rounded">
<span class="material-symbols-outlined text-[14px] text-outline">edit_note</span>
<span class="italic text-xs">"Sambal dipisah ya mbak"</span>
</div>
</div>
<div class="flex items-center justify-between pt-1">
<button class="text-primary hover:text-primary-container font-label-sm text-label-sm flex items-center gap-0.5" onclick="openDishCustomizer('Nila Sambal Pecak + Nasi', 18000)" type="button">
<span class="material-symbols-outlined text-sm">tune</span> Ubah Addon
              </button>
<div class="flex items-center gap-1.5 bg-surface-container-highest rounded-full px-2 py-0.5">
<button class="w-5 h-5 rounded-full flex items-center justify-center text-on-surface-variant hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-xs">remove</span>
</button>
<span class="font-label-sm text-label-sm text-on-surface font-semibold px-1">1</span>
<button class="w-5 h-5 rounded-full flex items-center justify-center text-on-surface-variant hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-xs">add</span>
</button>
</div>
</div>
</div>
<!-- Item 2: Ayam Kremes + Nasi -->
<div class="cart-item bg-surface-container-low rounded-lg p-space-sm flex flex-col gap-2 transition-all">
<div class="flex items-start justify-between gap-2">
<div class="flex-1 min-w-0">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md text-primary font-bold">1x</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface truncate">Ayam Kremes + Nasi</h4>
</div>
<span class="font-body-sm text-body-sm text-outline">@ Rp 17.000</span>
</div>
<span class="font-label-lg text-label-lg text-on-surface font-bold whitespace-nowrap">Rp 22.000</span>
</div>
<!-- Nested Add-ons -->
<div class="bg-surface-container-lowest rounded-md p-2 flex flex-col gap-1.5">
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-1 text-tertiary">
<span class="material-symbols-outlined text-[13px]">add_circle</span>
<span>Ekstra Nasi Putih</span>
</div>
<span class="font-semibold text-on-surface">+Rp 5.000</span>
</div>
</div>
<div class="flex items-center justify-between pt-1">
<button class="text-primary hover:text-primary-container font-label-sm text-label-sm flex items-center gap-0.5" onclick="openDishCustomizer('Ayam Kremes + Nasi', 17000)" type="button">
<span class="material-symbols-outlined text-sm">tune</span> Ubah Addon
              </button>
<div class="flex items-center gap-1.5 bg-surface-container-highest rounded-full px-2 py-0.5">
<button class="w-5 h-5 rounded-full flex items-center justify-center text-on-surface-variant hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-xs">remove</span>
</button>
<span class="font-label-sm text-label-sm text-on-surface font-semibold px-1">1</span>
<button class="w-5 h-5 rounded-full flex items-center justify-center text-on-surface-variant hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-xs">add</span>
</button>
</div>
</div>
</div>
<!-- Item 3: 2x Jus Pokat -->
<div class="cart-item bg-surface-container-low rounded-lg p-space-sm flex flex-col gap-2 transition-all">
<div class="flex items-start justify-between gap-2">
<div class="flex-1 min-w-0">
<div class="flex items-center gap-1.5">
<span class="font-label-md text-label-md text-primary font-bold">2x</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface truncate">Jus Pokat</h4>
</div>
<span class="font-body-sm text-body-sm text-outline">@ Rp 8.000 (Subtotal Rp 16.000)</span>
</div>
<span class="font-label-lg text-label-lg text-on-surface font-bold whitespace-nowrap">Rp 20.000</span>
</div>
<!-- Nested Add-ons (Oreo & Chocochips) -->
<div class="bg-surface-container-lowest rounded-md p-2 flex flex-col gap-1.5">
<div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-1 text-tertiary">
<span class="material-symbols-outlined text-[13px]">add_circle</span>
<span>Topping Oreo &amp; Chocochips</span>
</div>
<span class="font-semibold text-on-surface">+Rp 4.000</span>
</div>
<div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm bg-surface-container-high/40 px-2 py-1 rounded">
<span class="material-symbols-outlined text-[14px] text-outline">edit_note</span>
<span class="italic text-xs">"Sedikit gula"</span>
</div>
</div>
<div class="flex items-center justify-between pt-1">
<button class="text-primary hover:text-primary-container font-label-sm text-label-sm flex items-center gap-0.5" onclick="openDishCustomizer('Jus Pokat', 8000)" type="button">
<span class="material-symbols-outlined text-sm">tune</span> Ubah Addon
              </button>
<div class="flex items-center gap-1.5 bg-surface-container-highest rounded-full px-2 py-0.5">
<button class="w-5 h-5 rounded-full flex items-center justify-center text-on-surface-variant hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-xs">remove</span>
</button>
<span class="font-label-sm text-label-sm text-on-surface font-semibold px-1">2</span>
<button class="w-5 h-5 rounded-full flex items-center justify-center text-on-surface-variant hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-xs">add</span>
</button>
</div>
</div>
</div>
</div>
<!-- ERD Accounting Breakdown -->
<div class="bg-surface-container-low rounded-lg p-space-sm flex flex-col gap-1.5">
<div class="flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
<span>Subtotal Menu</span>
<span class="font-semibold text-on-surface">Rp 51.000</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
<span>Subtotal Add-on</span>
<span class="font-semibold text-on-surface">Rp 11.000</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
<span>Diskon Member</span>
<span class="font-semibold text-secondary">Rp 0</span>
</div>
<div class="pt-2 mt-1 flex items-baseline justify-between">
<div>
<span class="font-label-sm text-label-sm text-outline block">GRAND TOTAL</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Total Tagihan</span>
</div>
<span class="font-headline-lg text-headline-lg text-primary font-bold">Rp 62.000</span>
</div>
</div>
<!-- Payment Method Selector (payment_method in ERD: Tunai, QRIS/Transfer, EDC) -->
<div class="flex flex-col gap-1.5">
<span class="font-label-sm text-label-sm text-outline font-semibold">METODE PEMBAYARAN</span>
<div class="grid grid-cols-3 gap-2">
<label class="cursor-pointer">
<input class="peer sr-only" name="payment_method" type="radio" value="tunai"/>
<div class="p-2.5 rounded-lg bg-surface-container text-center font-label-sm text-label-sm text-on-surface peer-checked:bg-primary-container peer-checked:text-on-primary-container transition-all flex flex-col items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-lg">payments</span>
<span>Tunai</span>
</div>
</label>
<label class="cursor-pointer">
<input checked="" class="peer sr-only" name="payment_method" type="radio" value="qris"/>
<div class="p-2.5 rounded-lg bg-surface-container text-center font-label-sm text-label-sm text-on-surface peer-checked:bg-primary-container peer-checked:text-on-primary-container transition-all flex flex-col items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-lg">qr_code_scanner</span>
<span>QRIS / Bank</span>
</div>
</label>
<label class="cursor-pointer">
<input class="peer sr-only" name="payment_method" type="radio" value="edc"/>
<div class="p-2.5 rounded-lg bg-surface-container text-center font-label-sm text-label-sm text-on-surface peer-checked:bg-primary-container peer-checked:text-on-primary-container transition-all flex flex-col items-center gap-1 shadow-xs">
<span class="material-symbols-outlined text-lg">credit_card</span>
<span>EDC Gesek</span>
</div>
</label>
</div>
</div>
<!-- Primary Warm Action CTAs -->
<div class="flex flex-col gap-2 pt-1">
<button class="w-full py-3 px-4 rounded-full bg-primary hover:bg-primary-container active:scale-[0.99] text-on-primary font-headline-sm text-headline-sm font-semibold shadow-md flex items-center justify-center gap-2 transition-all" onclick="triggerKitchenOrder()" type="button">
<span class="material-symbols-outlined text-xl">restaurant</span>
<span>Kirim ke Dapur</span>
</button>
<div class="grid grid-cols-2 gap-2">
<button class="py-2.5 px-3 rounded-full bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-label-md text-label-md flex items-center justify-center gap-1.5 transition-all shadow-xs" onclick="triggerPrintReceipt()" type="button">
<span class="material-symbols-outlined text-base text-primary">print</span>
<span>Simpan &amp; Struk</span>
</button>
<button class="py-2.5 px-3 rounded-full bg-secondary-container hover:bg-secondary-fixed text-on-secondary-container font-label-md text-label-md flex items-center justify-center gap-1.5 transition-all shadow-xs" onclick="openAddonQuickModal()" type="button">
<span class="material-symbols-outlined text-base">tune</span>
<span>+ Add-on Menu</span>
</button>
</div>
</div>
</div>
</aside>
</div>
<!-- MODAL: Quick Add-ons & Dish Customizer (Soft Biscuit Level 3 Surface) -->
<div class="fixed inset-0 z-50 bg-inverse-surface/40 backdrop-blur-sm hidden items-center justify-center p-4" id="addon-modal">
<div class="bg-surface-container-lowest w-full max-w-lg rounded-2xl shadow-xl overflow-hidden flex flex-col animate-in fade-in zoom-in-95 duration-200">
<!-- Modal Header -->
<div class="p-space-md sm:p-space-lg bg-surface-container-low flex items-center justify-between">
<div>
<span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">Warung Jamsek Add-ons</span>
<h3 class="font-headline-md text-headline-md text-on-surface" id="modal-dish-title">Pilihan Add-on &amp; Topping</h3>
</div>
<button class="w-9 h-9 rounded-full bg-surface-container-highest text-on-surface-variant hover:text-on-surface flex items-center justify-center transition-colors" onclick="closeAddonModal()" type="button">
<span class="material-symbols-outlined text-lg">close</span>
</button>
</div>
<!-- Modal Body: Add-on Checkbox Grid based on true ERD master items -->
<div class="p-space-md sm:p-space-lg flex flex-col gap-space-md max-h-[614px] overflow-y-auto">
<p class="font-body-sm text-body-sm text-on-surface-variant">Pilih ekstra sambal, porsi nasi tambahan, atau topping manis untuk melengkapi pesanan.</p>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
<!-- Addon 1 -->
<label class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<div class="flex items-center gap-2.5">
<input checked="" class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox"/>
<div>
<span class="font-label-md text-label-md text-on-surface block">Tambah Sambal</span>
<span class="font-body-sm text-body-sm text-outline">Pecak / Hitam / Rica</span>
</div>
</div>
<span class="font-label-md text-label-md text-primary font-bold">+Rp 2.000</span>
</label>
<!-- Addon 2 -->
<label class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<div class="flex items-center gap-2.5">
<input class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox"/>
<div>
<span class="font-label-md text-label-md text-on-surface block">Ekstra Nasi Putih</span>
<span class="font-body-sm text-body-sm text-outline">1 Piring Pulen</span>
</div>
</div>
<span class="font-label-md text-label-md text-primary font-bold">+Rp 5.000</span>
</label>
<!-- Addon 3 -->
<label class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<div class="flex items-center gap-2.5">
<input class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox"/>
<div>
<span class="font-label-md text-label-md text-on-surface block">Ice Cream Scoop</span>
<span class="font-body-sm text-body-sm text-outline">Topping Minuman</span>
</div>
</div>
<span class="font-label-md text-label-md text-primary font-bold">+Rp 2.000</span>
</label>
<!-- Addon 4 -->
<label class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<div class="flex items-center gap-2.5">
<input class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox"/>
<div>
<span class="font-label-md text-label-md text-on-surface block">Es Kul Kul</span>
<span class="font-body-sm text-body-sm text-outline">Pisang / Buah Cokelat</span>
</div>
</div>
<span class="font-label-md text-label-md text-primary font-bold">+Rp 1.000</span>
</label>
<!-- Addon 5 -->
<label class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<div class="flex items-center gap-2.5">
<input class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox"/>
<div>
<span class="font-label-md text-label-md text-on-surface block">Topping Oreo</span>
<span class="font-body-sm text-body-sm text-outline">Remah Biskuit Hitam</span>
</div>
</div>
<span class="font-label-md text-label-md text-primary font-bold">+Rp 1.000</span>
</label>
<!-- Addon 6 -->
<label class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<div class="flex items-center gap-2.5">
<input class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox"/>
<div>
<span class="font-label-md text-label-md text-on-surface block">Topping Keju</span>
<span class="font-body-sm text-body-sm text-outline">Parutan Cheddar Gurih</span>
</div>
</div>
<span class="font-label-md text-label-md text-primary font-bold">+Rp 1.000</span>
</label>
<!-- Addon 7 -->
<label class="flex items-center justify-between p-3 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<div class="flex items-center gap-2.5">
<input class="w-4 h-4 rounded text-primary focus:ring-primary accent-primary" type="checkbox"/>
<div>
<span class="font-label-md text-label-md text-on-surface block">Chocochips</span>
<span class="font-body-sm text-body-sm text-outline">Cokelat Butir Renyah</span>
</div>
</div>
<span class="font-label-md text-label-md text-primary font-bold">+Rp 1.000</span>
</label>
</div>
<!-- Special Kitchen Instruction Field -->
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant block mb-1">Catatan Tambahan untuk Dapur (Kitchen Notes)</label>
<input class="w-full px-3 py-2 bg-surface-container-low text-on-surface rounded-lg font-body-sm text-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Contoh: Jangan terlalu asin, kuah sambal dipisah wadah..." type="text"/>
</div>
</div>
<!-- Modal Footer -->
<div class="p-space-md bg-surface-container-low flex items-center justify-end gap-2">
<button class="px-4 py-2 rounded-full font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high transition-colors" onclick="closeAddonModal()" type="button">
          Batal
        </button>
<button class="px-6 py-2 rounded-full bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md font-semibold shadow-sm transition-colors" onclick="confirmAddonSelection()" type="button">
          Simpan ke Pesanan
        </button>
</div>
</div>
</div>
<!-- Toast Notification Feedback Container -->
<div class="fixed bottom-6 right-6 z-50 transform translate-y-16 opacity-0 transition-all duration-300 pointer-events-none bg-inverse-surface text-inverse-on-surface px-4 py-2.5 rounded-full shadow-lg flex items-center gap-2 font-label-md text-label-md" id="pos-toast">
<span class="material-symbols-outlined text-secondary text-base">check_circle</span>
<span id="toast-message">Pesanan diperbarui</span>
</div>
</div>
<script>
  // Tab category filtering
  function filterCategory(category, element) {
    const pills = document.querySelectorAll('.category-pill');
    pills.forEach(p => {
      p.classList.remove('bg-primary', 'text-on-primary');
      p.classList.add('bg-surface-container', 'text-on-surface-variant');
    });

    element.classList.remove('bg-surface-container', 'text-on-surface-variant');
    element.classList.add('bg-primary', 'text-on-primary');

    const cards = document.querySelectorAll('.menu-card');
    cards.forEach(card => {
      const cardCats = card.getAttribute('data-category') || '';
      if (category === 'all' || cardCats.includes(category)) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  // Real-time search filter for menu
  const searchInput = document.getElementById('menu-search-input');
  if (searchInput) {
    searchInput.addEventListener('input', function(e) {
      const term = e.target.value.toLowerCase().trim();
      const cards = document.querySelectorAll('.menu-card');
      cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        if (text.includes(term)) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  }

  // Order Type switcher (Dine-in vs Delivery based on ERD)
  function switchOrderType(type) {
    const tabDinein = document.getElementById('tab-dinein');
    const tabDelivery = document.getElementById('tab-delivery');
    const tableContainer = document.getElementById('table-select-container');
    const deliveryContainer = document.getElementById('delivery-info-container');

    if (type === 'delivery') {
      tabDelivery.className = 'px-3 py-1 rounded-full bg-primary text-on-primary font-semibold transition-all';
      tabDinein.className = 'px-3 py-1 rounded-full text-on-surface-variant hover:text-on-surface transition-all';
      tableContainer.classList.add('hidden');
      deliveryContainer.classList.remove('hidden');
      deliveryContainer.classList.add('flex');
      showToast('Mode Pengantaran / Kurir diaktifkan');
    } else {
      tabDinein.className = 'px-3 py-1 rounded-full bg-primary text-on-primary font-semibold transition-all';
      tabDelivery.className = 'px-3 py-1 rounded-full text-on-surface-variant hover:text-on-surface transition-all';
      tableContainer.classList.remove('hidden');
      deliveryContainer.classList.add('hidden');
      deliveryContainer.classList.remove('flex');
      showToast('Mode Meja Dine-In diaktifkan');
    }
  }

  // Modal Controls
  function openAddonQuickModal() {
    const modal = document.getElementById('addon-modal');
    document.getElementById('modal-dish-title').textContent = 'Pilihan Add-on Warung Jamsek';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function openDishCustomizer(dishName, price) {
    const modal = document.getElementById('addon-modal');
    document.getElementById('modal-dish-title').textContent = 'Kustomisasi: ' + dishName;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeAddonModal() {
    const modal = document.getElementById('addon-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }

  function confirmAddonSelection() {
    closeAddonModal();
    showToast('Add-on berhasil ditambahkan ke pesanan');
  }

  function handleMenuClick(name, price, desc) {
    showToast(name + ' ditambahkan ke keranjang');
  }

  function clearCart() {
    showToast('Keranjang pesanan di-reset');
  }

  function triggerKitchenOrder() {
    showToast('Pesanan #ORD-2024-089 terkirim ke Layar Dapur!');
  }

  function triggerPrintReceipt() {
    showToast('Mencetak struk kasir & simpan ke pembukuan...');
  }

  function showToast(msg) {
    const toast = document.getElementById('pos-toast');
    const msgEl = document.getElementById('toast-message');
    msgEl.textContent = msg;
    toast.classList.remove('translate-y-16', 'opacity-0');
    toast.classList.add('translate-y-0', 'opacity-100');
    setTimeout(() => {
      toast.classList.add('translate-y-16', 'opacity-0');
      toast.classList.remove('translate-y-0', 'opacity-100');
    }, 2400);
  }
</script>
</main>

<footer class="w-full bg-surface-container-low py-4 mt-9">
    <div class="max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-on-surface-variant">
        <div class="flex items-center gap-3">
            <span class="font-semibold text-on-surface">Warung Jamsek POS v2.4</span>
            <span>•</span>
            <span>Terhubung ke Printer Dapur &amp; Kasir (Online)</span>
        </div>
        <div>
            <span>Operasional Kasir: Siti Rahma (Shift 1) • Mode Standby</span>
        </div>
    </div>
</footer>
@endsection