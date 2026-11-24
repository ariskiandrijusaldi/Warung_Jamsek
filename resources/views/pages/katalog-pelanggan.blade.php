@extends('layouts.app', ['title' => 'Katalog Menu Autentik - Warung Jamsek'])

@section('content')
<x-header-customer />

<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 pb-24">
    <!-- Hero Banner -->
    <section class="w-full py-6">
        <div class="relative overflow-hidden rounded-3xl bg-surface-container-low p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6 border border-outline-variant/20 shadow-sm">
            <div class="max-w-xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed text-xs font-bold mb-3">
                    <span class="material-symbols-outlined text-sm">local_fire_department</span>
                    Menu Hangat Siap Antar Hari Ini
                </span>
                <h1 class="text-2xl md:text-4xl font-bold text-on-surface tracking-tight leading-snug">
                    Nikmati Santapan Rumahan <span class="text-primary">Khas Warung Jamsek</span>
                </h1>
                <p class="text-xs md:text-sm text-on-surface-variant mt-2 leading-relaxed">
                    Ayam sambal hitam, nila pecak segar, aneka tumisan kangkung, dan jus buah asli matang pohon. Dimasak fresh saat Anda memesan.
                </p>
                <div class="mt-4 flex items-center gap-3 text-xs text-secondary font-semibold">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-base">moped</span> Bebas Ongkir Area Sekitar
                    </span>
                    <span>•</span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-base">schedule</span> Waktu Masak: 10 - 15 Menit
                    </span>
                </div>
            </div>
            
            <div class="w-full md:w-72 h-44 rounded-2xl overflow-hidden shadow-md flex-shrink-0">
                <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6teQ_BfE__BeL8awwqkfJotqAE23nek8MwPsm9ju4UoPADuc4iyWeMVjKA6gY7seRM9q0yWJO52bDT6KLgwXyge1GMgq_j15QZazFYmABXbqhUg-2x_DrKvpMtJ9Niv_AVYuCYDVfhDfLHTdZ1tzSVkpppTC02ex_-BP3v1IKdQ9Bmzx9_RpS20q6D0vlnEBjwBKQvGKFMX8SJTa4UtS2buvhW3QANIC-OeFIe7w" alt="Ayam Sambal Hitam Warung Jamsek"/>
            </div>
        </div>
    </section>

    <!-- Filter & Search Bar -->
    <section class="sticky top-20 z-40 bg-surface/95 backdrop-blur-md py-3 mb-6 flex flex-col md:flex-row items-center justify-between gap-4 border-b border-surface-container-high/60">
        <!-- Category Filter Pills -->
        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar w-full md:w-auto">
            <button type="button" class="category-pill active-pill px-4 py-2 rounded-full text-xs font-semibold shrink-0 bg-primary text-on-primary shadow-sm flex items-center gap-1.5" onclick="filterCustomerCategory('all', this)">
                <span class="material-symbols-outlined text-sm">grid_view</span>
                Semua Menu (19)
            </button>
            <button type="button" class="category-pill px-4 py-2 rounded-full text-xs font-semibold shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high flex items-center gap-1.5 transition-colors" onclick="filterCustomerCategory('makanan', this)">
                <span class="material-symbols-outlined text-sm text-primary">lunch_dining</span>
                Makanan
            </button>
            <button type="button" class="category-pill px-4 py-2 rounded-full text-xs font-semibold shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high flex items-center gap-1.5 transition-colors" onclick="filterCustomerCategory('new-menu', this)">
                <span class="material-symbols-outlined text-sm text-tertiary">local_fire_department</span>
                New Menu
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-ping"></span>
            </button>
            <button type="button" class="category-pill px-4 py-2 rounded-full text-xs font-semibold shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high flex items-center gap-1.5 transition-colors" onclick="filterCustomerCategory('minuman', this)">
                <span class="material-symbols-outlined text-sm text-secondary">local_cafe</span>
                Minuman
            </button>
            <button type="button" class="category-pill px-4 py-2 rounded-full text-xs font-semibold shrink-0 bg-surface-container text-on-surface-variant hover:bg-surface-container-high flex items-center gap-1.5 transition-colors" onclick="filterCustomerCategory('spesial', this)">
                <span class="material-symbols-outlined text-sm text-error">event</span>
                Spesial Kamis
            </button>
        </div>

        <!-- Search Input -->
        <div class="relative w-full md:w-72">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-base">search</span>
            <input type="text" id="cust-search-menu" placeholder="Cari nasi, sambal, jus..." class="w-full pl-9 pr-4 py-2 bg-surface-container-low text-on-surface text-xs rounded-full focus:outline-none focus:ring-2 focus:ring-primary/20 shadow-xs"/>
        </div>
    </section>

    <!-- Menu Cards Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5" id="customer-menu-grid">
        <!-- ITEM 1: Ayam Sambal Hitam -->
        <div class="menu-item-card bg-surface-container-lowest rounded-2xl p-4 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group border border-surface-container-high/40" data-cat="makanan new-menu">
            <div>
                <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6teQ_BfE__BeL8awwqkfJotqAE23nek8MwPsm9ju4UoPADuc4iyWeMVjKA6gY7seRM9q0yWJO52bDT6KLgwXyge1GMgq_j15QZazFYmABXbqhUg-2x_DrKvpMtJ9Niv_AVYuCYDVfhDfLHTdZ1tzSVkpppTC02ex_-BP3v1IKdQ9Bmzx9_RpS20q6D0vlnEBjwBKQvGKFMX8SJTa4UtS2buvhW3QANIC-OeFIe7w" alt="Ayam Sambal Hitam + Nasi"/>
                    <span class="absolute top-2 left-2 bg-primary text-on-primary text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">
                        Favorit
                    </span>
                </div>
                <div class="flex items-start justify-between gap-2">
                    <h3 class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors leading-snug">
                        Ayam Sambal Hitam + Nasi
                    </h3>
                </div>
                <p class="text-xs text-on-surface-variant line-clamp-2 mt-1">
                    Ayam goreng gurih dengan bumbu hitam rempah Madura pekat pedas mantap.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between">
                <span class="text-sm font-bold text-primary">Rp 18.000</span>
                <div class="flex items-center gap-1.5">
                    <a href="{{ url('/detail-menu') }}" class="p-2 rounded-full bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors" title="Kustomisasi Pedas & Topping">
                        <span class="material-symbols-outlined text-sm">tune</span>
                    </a>
                    <button type="button" class="px-3.5 py-1.5 rounded-full bg-primary text-on-primary hover:bg-primary-container text-xs font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1" onclick="addToCustomerCart('Ayam Sambal Hitam', 18000)">
                        <span class="material-symbols-outlined text-sm">add</span>
                        Tambah
                    </button>
                </div>
            </div>
        </div>

        <!-- ITEM 2: Nila Sambal Pecak -->
        <div class="menu-item-card bg-surface-container-lowest rounded-2xl p-4 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group border border-surface-container-high/40" data-cat="makanan new-menu">
            <div>
                <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBupdXrBjOyprPnY_7-1aN1i5BzUqxh185-mO8qYrdFt3WM7NnAXeYoqwSfIGbn-BJG--neehPAoHGvXGf6QK2pxL7kAzWZhTfGK2UaB7FXOkw8eFEV2-6ud-l24UXN-vrQH7JZWp4Dd7n7Nix9oIXQdKevnb0SrBPQTkQSeAgfKdfkHFXnXwdg4-_aEkHYlMkC__wVwbioPmRlYPMMYRaHsMxGnxViY03kBXOtvYI" alt="Nila Sambal Pecak"/>
                    <span class="absolute top-2 left-2 bg-tertiary-fixed text-on-tertiary-fixed text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">
                        New Menu
                    </span>
                </div>
                <h3 class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors leading-snug">
                    Nila Sambal Pecak + Nasi
                </h3>
                <p class="text-xs text-on-surface-variant line-clamp-2 mt-1">
                    Ikan nila goreng garing disiram racikan sambal pecak rawit hijau segar.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between">
                <span class="text-sm font-bold text-primary">Rp 18.000</span>
                <div class="flex items-center gap-1.5">
                    <a href="{{ url('/detail-menu') }}" class="p-2 rounded-full bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors" title="Kustomisasi">
                        <span class="material-symbols-outlined text-sm">tune</span>
                    </a>
                    <button type="button" class="px-3.5 py-1.5 rounded-full bg-primary text-on-primary hover:bg-primary-container text-xs font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1" onclick="addToCustomerCart('Nila Sambal Pecak', 18000)">
                        <span class="material-symbols-outlined text-sm">add</span>
                        Tambah
                    </button>
                </div>
            </div>
        </div>

        <!-- ITEM 3: Ayam Kremes -->
        <div class="menu-item-card bg-surface-container-lowest rounded-2xl p-4 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group border border-surface-container-high/40" data-cat="makanan">
            <div>
                <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2ZA9WrHg5Dno3OOJTde16u89BnLota71PnnHOeKCtDOtIrhTsTRDOxLipA7LXYFZcTuocwJWZS2K5BAuZbqLtdny_2qOr2i7phO2dsgOPMW6sForeS1Bwx6sQef4eC3-aJFq2QSppCZXddJtrKblUS7pmoRw-lmocMTwmueOUQq82F0-8K9dDhpB2PtVsP0xXFUYYnFSF5STyChjJrvNxlHpRo5xOPjb7PnLaixo" alt="Ayam Kremes + Nasi"/>
                    <span class="absolute top-2 left-2 bg-secondary-container text-on-secondary-container text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">
                        Best Seller
                    </span>
                </div>
                <h3 class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors leading-snug">
                    Ayam Kremes + Nasi
                </h3>
                <p class="text-xs text-on-surface-variant line-clamp-2 mt-1">
                    Ayam ungkep rempah dengan limpahan kremes kriuk garing sarang burung.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between">
                <span class="text-sm font-bold text-primary">Rp 17.000</span>
                <button type="button" class="px-3.5 py-1.5 rounded-full bg-primary text-on-primary hover:bg-primary-container text-xs font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1" onclick="addToCustomerCart('Ayam Kremes', 17000)">
                    <span class="material-symbols-outlined text-sm">add</span>
                    Tambah
                </button>
            </div>
        </div>

        <!-- ITEM 4: Jus Pokat -->
        <div class="menu-item-card bg-surface-container-lowest rounded-2xl p-4 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group border border-surface-container-high/40" data-cat="minuman">
            <div>
                <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzw2z7cpXXboYJIm5fV6iixUIwisD10Fao6KluZuSPDGOR9jdJAcYU_M9lp7LS-ZM5ZhXbpCwFyYniBTjlUn9idmBd7Em3siA1mU0MhgogN9GU8qbzi6lu08Ujc6n4tjn_SePJfUTU7T-jRfe8ei3lVNjDwBJUtYGhxwbCQdAcEoqOwIrjwYbcBzM4LxZYM8Oq7jCH0jgbHgj8g4kGyi5Hz6fvmzXrLane0LVLmUY" alt="Jus Pokat"/>
                    <span class="absolute top-2 left-2 bg-secondary text-on-secondary text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">
                        Segar Alami
                    </span>
                </div>
                <h3 class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors leading-snug">
                    Jus Pokat (Alpukat)
                </h3>
                <p class="text-xs text-on-surface-variant line-clamp-2 mt-1">
                    Alpukat mentega matang pohon dengan lumuran saus cokelat manis legit.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between">
                <span class="text-sm font-bold text-primary">Rp 8.000</span>
                <button type="button" class="px-3.5 py-1.5 rounded-full bg-primary text-on-primary hover:bg-primary-container text-xs font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1" onclick="addToCustomerCart('Jus Pokat', 8000)">
                    <span class="material-symbols-outlined text-sm">add</span>
                    Tambah
                </button>
            </div>
        </div>

        <!-- ITEM 5: Ceker Mercon [Only Kamis] -->
        <div class="menu-item-card bg-surface-container-lowest rounded-2xl p-4 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group border border-surface-container-high/40" data-cat="makanan spesial">
            <div>
                <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-error-container/30 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-5xl">local_fire_department</span>
                </div>
                <div class="flex items-center gap-1 mb-1">
                    <span class="bg-error-container text-on-error-container text-[10px] font-bold px-2 py-0.5 rounded-full">Spesial Kamis</span>
                </div>
                <h3 class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors leading-snug">
                    Ceker Mercon
                </h3>
                <p class="text-xs text-on-surface-variant line-clamp-2 mt-1">
                    Ceker ayam lembut lepas tulang dengan baluran bumbu pedas rawit membakar selera.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between">
                <span class="text-sm font-bold text-primary">Rp 10.000</span>
                <button type="button" class="px-3.5 py-1.5 rounded-full bg-primary text-on-primary hover:bg-primary-container text-xs font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1" onclick="addToCustomerCart('Ceker Mercon', 10000)">
                    <span class="material-symbols-outlined text-sm">add</span>
                    Tambah
                </button>
            </div>
        </div>

        <!-- ITEM 6: Cah Kangkung -->
        <div class="menu-item-card bg-surface-container-lowest rounded-2xl p-4 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group border border-surface-container-high/40" data-cat="makanan">
            <div>
                <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-secondary-container/30 flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-5xl">skillet</span>
                </div>
                <h3 class="text-sm font-bold text-on-surface group-hover:text-primary transition-colors leading-snug">
                    Cah Kangkung Terasi
                </h3>
                <p class="text-xs text-on-surface-variant line-clamp-2 mt-1">
                    Sayur kangkung hijau dimasak cepat api besar dengan aroma terasi harum.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-surface-container-high flex items-center justify-between">
                <span class="text-sm font-bold text-primary">Rp 8.000</span>
                <button type="button" class="px-3.5 py-1.5 rounded-full bg-primary text-on-primary hover:bg-primary-container text-xs font-bold shadow-xs active:scale-95 transition-all flex items-center gap-1" onclick="addToCustomerCart('Cah Kangkung', 8000)">
                    <span class="material-symbols-outlined text-sm">add</span>
                    Tambah
                </button>
            </div>
        </div>
    </section>

    <!-- Floating Bottom Checkout Bar -->
    <div class="fixed bottom-6 left-4 right-4 max-w-xl mx-auto z-40 bg-on-surface text-surface p-3 md:p-4 rounded-2xl shadow-2xl flex items-center justify-between gap-4 border border-surface-container-highest/20 animate-in slide-in-from-bottom-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-on-primary font-bold">
                <span class="material-symbols-outlined text-xl">shopping_bag</span>
            </div>
            <div>
                <span class="text-xs font-bold block" id="floating-cart-count">2 Menu di Keranjang</span>
                <span class="text-sm font-bold text-primary-fixed" id="floating-cart-total">Total: Rp 36.000</span>
            </div>
        </div>
        <a href="{{ url('/checkout') }}" class="px-5 py-2.5 rounded-full bg-primary hover:bg-primary-container text-on-primary text-xs font-bold shadow-md transition-all flex items-center gap-1.5 active:scale-95">
            <span>Lanjut ke Checkout</span>
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>
</main>

<script>
    function filterCustomerCategory(cat, el) {
        document.querySelectorAll('.category-pill').forEach(btn => {
            btn.classList.remove('bg-primary', 'text-on-primary');
            btn.classList.add('bg-surface-container', 'text-on-surface-variant');
        });
        el.classList.remove('bg-surface-container', 'text-on-surface-variant');
        el.classList.add('bg-primary', 'text-on-primary');

        const cards = document.querySelectorAll('.menu-item-card');
        cards.forEach(card => {
            const itemCat = card.getAttribute('data-cat') || '';
            if (cat === 'all' || itemCat.includes(cat)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    let cartCount = 2;
    let cartTotal = 36000;
    function addToCustomerCart(name, price) {
        cartCount++;
        cartTotal += price;
        document.getElementById('floating-cart-count').textContent = cartCount + ' Menu di Keranjang';
        document.getElementById('floating-cart-total').textContent = 'Total: Rp ' + cartTotal.toLocaleString('id-ID');
        alert(name + ' ditambahkan ke keranjang pesanan Anda!');
    }

    const searchInput = document.getElementById('cust-search-menu');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            document.querySelectorAll('.menu-item-card').forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(query) ? 'flex' : 'none';
            });
        });
    }
</script>
@endsection
