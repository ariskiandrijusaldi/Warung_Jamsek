<header class="fixed top-0 w-full z-50 bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(133,94,72,0.06)]">
    <div class="h-20 max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 flex items-center justify-between gap-4">
        <!-- Logo -->
        <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold text-lg shadow-sm">
                    WJ
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-bold text-primary tracking-tight">Warung Jamsek</span>
                    <span class="text-[11px] text-on-surface-variant">Cita Rasa Hangat Rumahan</span>
                </div>
            </a>
        </div>

        <!-- Center Nav -->
        <nav class="hidden md:flex items-center gap-1 bg-surface-container p-1.5 rounded-full">
            <a class="px-4 py-1.5 rounded-full text-xs font-semibold text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" href="{{ url('/menu-katalog') }}">
                Katalog Menu
            </a>
            <a class="px-4 py-1.5 rounded-full text-xs font-semibold text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" href="{{ url('/cek-pesanan') }}">
                Lacak Pesanan
            </a>
            <a class="px-4 py-1.5 rounded-full text-xs font-semibold text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" href="{{ url('/kontak-cabang') }}">
                Kontak &amp; Cabang
            </a>
        </nav>

        <!-- Right action icons -->
        <div class="flex items-center gap-3">
            <a href="{{ url('/pos') }}" class="hidden sm:inline-flex items-center gap-1 px-3 py-1.5 rounded-full bg-surface-container text-xs font-semibold text-primary hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined text-[16px]">point_of_sale</span>
                Mode Kasir POS
            </a>
            
            <a aria-label="Keranjang Belanja" class="relative p-2 rounded-full bg-surface-container hover:bg-surface-container-high transition-colors flex items-center justify-center text-on-surface" href="{{ url('/checkout') }}">
                <span class="material-symbols-outlined text-[22px]">shopping_bag</span>
                <span class="absolute -top-1 -right-1 bg-primary text-on-primary text-[11px] font-bold rounded-full min-w-[20px] h-5 px-1 flex items-center justify-center shadow-sm">3</span>
            </a>
            
            <a href="{{ url('/') }}" class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary hover:bg-primary-container transition-colors" title="Menu Portal">
                <span class="material-symbols-outlined text-[18px]">home</span>
            </a>
        </div>
    </div>
</header>
