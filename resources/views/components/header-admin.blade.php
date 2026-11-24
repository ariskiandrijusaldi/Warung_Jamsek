@props(['active' => 'pos'])

<header class="fixed top-0 left-0 right-0 z-50 bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    <div class="h-28 w-full max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 flex flex-col justify-between pt-3 pb-2">
        <!-- Top bar -->
        <div class="flex items-center justify-between gap-4">
            <!-- Brand & Status -->
            <div class="flex items-center gap-4 min-w-0">
                <a href="{{ url('/') }}" class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold text-lg shadow-sm">
                        WJ
                    </div>
                    <span class="text-lg md:text-xl text-primary font-bold whitespace-nowrap">Warung Jamsek</span>
                </a>
                <span class="hidden md:inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant text-xs font-semibold whitespace-nowrap">
                    <span class="material-symbols-outlined text-sm text-outline">storefront</span>
                    Cabang Utama (Dine-in &amp; Delivery)
                </span>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-xs font-semibold">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-1.5 animate-pulse"></span>
                    Buka
                </span>
            </div>

            <!-- Search, Notifications, Profile -->
            <div class="flex items-center gap-3">
                <div class="relative hidden lg:block w-64">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span>
                    <input type="search" placeholder="Cari nomor nota, menu..." class="w-full pl-9 pr-3 py-1.5 bg-surface-container text-on-surface placeholder:text-outline text-xs rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20"/>
                </div>
                
                <div class="relative">
                    <button type="button" aria-label="Notifikasi pesanan baru" class="relative p-2 rounded-full text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute -top-1 -right-2 px-1.5 py-0.5 bg-primary text-on-primary text-[10px] leading-tight rounded-full font-bold shadow-sm whitespace-nowrap">3 Baru</span>
                    </button>
                </div>

                <div class="flex items-center gap-2.5 pl-2 border-l border-outline-variant/30">
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-xs text-on-surface font-semibold leading-tight">Siti Rahma</span>
                        <span class="text-[11px] text-outline leading-tight">Kasir Shift 1</span>
                    </div>
                    <img alt="Profile" class="w-8 h-8 rounded-full object-cover ring-2 ring-surface-container-high" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBb-sazlq3sH6GEbU-kL9M8pweOjmUuaSBdtusrm8iPRC3FoS_JoROtJxMnNJk6qHYVfs-kSlaOha-bgQHGAemwztwe_CraLQUloe4tTABWsw1O4RgJrfGRF969TW_Cq8QBBn-ZSoEZvMZaPVXi3FGHOSekobHRYsjRtGAhP4D5UpkHeGkISj9iV9tmmI2Sb7MbfBNbk8zWkYyHKuPU3Dt3iExH2-WKmu1BBVK9udc"/>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <nav class="flex items-center gap-1.5 overflow-x-auto no-scrollbar py-1">
            <a href="{{ url('/pos') }}" class="px-4 py-1.5 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ $active === 'pos' ? 'bg-primary-container text-on-primary-container shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                Kasir &amp; POS
            </a>
            <a href="{{ url('/pesanan') }}" class="px-4 py-1.5 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ $active === 'orders' ? 'bg-primary-container text-on-primary-container shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                Daftar Pesanan
            </a>
            <a href="{{ url('/katalog') }}" class="px-4 py-1.5 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ $active === 'menu' ? 'bg-primary-container text-on-primary-container shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                Katalog Menu &amp; Addons
            </a>
            <a href="{{ url('/laporan') }}" class="px-4 py-1.5 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ $active === 'laporan' ? 'bg-primary-container text-on-primary-container shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}">
                Laporan Harian
            </a>
            <div class="ml-auto pl-2">
                <a href="{{ url('/checkout') }}" class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-tertiary-fixed text-on-tertiary-fixed hover:bg-tertiary-fixed-dim transition-colors whitespace-nowrap">
                    <span class="material-symbols-outlined text-[15px]">shopping_cart_checkout</span>
                    Lihat Mode Pelanggan
                </a>
            </div>
        </nav>
    </div>
</header>
