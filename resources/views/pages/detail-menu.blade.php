@extends('layouts.app', ['title' => 'Kustomisasi Menu - Warung Jamsek'])

@section('content')
<x-header-customer />

<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 pb-20">
    <div class="max-w-4xl mx-auto py-6">
        <!-- Back Link -->
        <a href="{{ url('/menu-katalog') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-outline hover:text-primary mb-4 transition-colors">
            <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali ke Katalog Menu
        </a>

        <!-- 2 Column Layout -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            <!-- Left: Big Food Image (5 cols) -->
            <div class="md:col-span-5 flex flex-col gap-3">
                <div class="w-full aspect-square rounded-3xl overflow-hidden shadow-md bg-surface-container">
                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6teQ_BfE__BeL8awwqkfJotqAE23nek8MwPsm9ju4UoPADuc4iyWeMVjKA6gY7seRM9q0yWJO52bDT6KLgwXyge1GMgq_j15QZazFYmABXbqhUg-2x_DrKvpMtJ9Niv_AVYuCYDVfhDfLHTdZ1tzSVkpppTC02ex_-BP3v1IKdQ9Bmzx9_RpS20q6D0vlnEBjwBKQvGKFMX8SJTa4UtS2buvhW3QANIC-OeFIe7w" alt="Ayam Sambal Hitam"/>
                </div>
                <div class="p-3 rounded-2xl bg-surface-container-low flex items-center justify-between text-xs text-secondary font-semibold">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-base">verified</span> 100% Halal &amp; Higienis
                    </span>
                    <span class="text-outline">Waktu Masak: ~12 Mnt</span>
                </div>
            </div>

            <!-- Right: Customizer Form (7 cols) -->
            <div class="md:col-span-7 bg-surface-container-lowest rounded-3xl p-6 shadow-sm border border-surface-container-high/60 flex flex-col gap-6">
                <!-- Title & Price -->
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="px-2.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed text-[11px] font-bold">Favorit Pelanggan</span>
                        <span class="text-xs text-outline">Kategori: Makanan</span>
                    </div>
                    <h1 class="text-2xl font-bold text-on-surface">Ayam Sambal Hitam + Nasi</h1>
                    <p class="text-xs text-on-surface-variant mt-1.5 leading-relaxed">
                        Ayam goreng empuk berpadu sempurna dengan bumbu hitam khas Madura yang kaya rempah sangrai dan aroma gurih sedap. Disajikan lengkap bersama nasi putih pulen hangat dan lalapan mentimun segar.
                    </p>
                    <div class="mt-3">
                        <span class="text-xl font-bold text-primary" id="base-price-display">Rp 18.000</span>
                    </div>
                </div>

                <!-- Customizer Option 1: Level Pedas -->
                <div>
                    <label class="block text-xs font-bold text-on-surface mb-2">Tingkat Kepedasan Sambal</label>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="cursor-pointer">
                            <input type="radio" name="spice_level" value="0" class="peer sr-only"/>
                            <div class="p-2.5 rounded-xl bg-surface-container-low text-center text-xs text-on-surface peer-checked:bg-primary peer-checked:text-on-primary font-semibold transition-all">
                                Tidak Pedas (0)
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="spice_level" value="2" checked class="peer sr-only"/>
                            <div class="p-2.5 rounded-xl bg-surface-container-low text-center text-xs text-on-surface peer-checked:bg-primary peer-checked:text-on-primary font-semibold transition-all">
                                Sedang (Level 2)
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="spice_level" value="5" class="peer sr-only"/>
                            <div class="p-2.5 rounded-xl bg-surface-container-low text-center text-xs text-on-surface peer-checked:bg-primary peer-checked:text-on-primary font-semibold transition-all">
                                Pedas Nampol (5)
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Customizer Option 2: Sambal Presentation -->
                <div>
                    <label class="block text-xs font-bold text-on-surface mb-2">Penyajian Sambal</label>
                    <div class="grid grid-cols-2 gap-2">
                        <label class="cursor-pointer">
                            <input type="radio" name="sambal_mode" value="pisah" checked class="peer sr-only"/>
                            <div class="p-2.5 rounded-xl bg-surface-container-low text-center text-xs text-on-surface peer-checked:bg-secondary peer-checked:text-on-secondary font-semibold transition-all">
                                Sambal Dipisah Wadah
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="sambal_mode" value="campur" class="peer sr-only"/>
                            <div class="p-2.5 rounded-xl bg-surface-container-low text-center text-xs text-on-surface peer-checked:bg-secondary peer-checked:text-on-secondary font-semibold transition-all">
                                Lumur di Atas Ayam
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Customizer Option 3: Add-on Ekstra -->
                <div>
                    <label class="block text-xs font-bold text-on-surface mb-2">Tambahan Add-on &amp; Topping (Opsional)</label>
                    <div class="space-y-2">
                        <label class="flex items-center justify-between p-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors text-xs">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="addon-check rounded text-primary focus:ring-primary accent-primary" data-price="2000" onchange="calculateCustomPrice()"/>
                                <span>Tambah Porsi Sambal Hitam</span>
                            </div>
                            <span class="font-bold text-primary">+Rp 2.000</span>
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors text-xs">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="addon-check rounded text-primary focus:ring-primary accent-primary" data-price="5000" onchange="calculateCustomPrice()"/>
                                <span>Ekstra Nasi Putih Pulen</span>
                            </div>
                            <span class="font-bold text-primary">+Rp 5.000</span>
                        </label>

                        <label class="flex items-center justify-between p-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors text-xs">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="addon-check rounded text-primary focus:ring-primary accent-primary" data-price="4000" onchange="calculateCustomPrice()"/>
                                <span>Telur Dadar Rempah</span>
                            </div>
                            <span class="font-bold text-primary">+Rp 4.000</span>
                        </label>
                    </div>
                </div>

                <!-- Kitchen Notes -->
                <div>
                    <label class="block text-xs font-bold text-on-surface mb-1">Catatan Khusus untuk Dapur</label>
                    <input type="text" placeholder="Misal: Jangan terlalu asin, ayam pilih bagian paha..." class="w-full px-3 py-2 bg-surface-container-low text-on-surface text-xs rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20"/>
                </div>

                <!-- Bottom CTA: Quantity & Add Button -->
                <div class="pt-4 border-t border-surface-container-high flex items-center justify-between gap-4">
                    <!-- Qty Counter -->
                    <div class="flex items-center gap-2 bg-surface-container-low rounded-full px-3 py-1.5">
                        <button type="button" class="w-6 h-6 rounded-full flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors" onclick="changeQty(-1)">
                            <span class="material-symbols-outlined text-sm">remove</span>
                        </button>
                        <span class="text-xs font-bold w-6 text-center" id="item-qty">1</span>
                        <button type="button" class="w-6 h-6 rounded-full flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors" onclick="changeQty(1)">
                            <span class="material-symbols-outlined text-sm">add</span>
                        </button>
                    </div>

                    <!-- Add Button -->
                    <a href="{{ url('/checkout') }}" class="flex-1 py-3 px-6 rounded-full bg-primary hover:bg-primary-container text-on-primary text-xs font-bold shadow-md transition-all flex items-center justify-center gap-2 active:scale-95" id="btn-add-custom">
                        <span class="material-symbols-outlined text-base">shopping_bag</span>
                        <span id="btn-add-label">Masukkan ke Keranjang (Rp 18.000)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let basePrice = 18000;
    let qty = 1;

    function calculateCustomPrice() {
        let addonTotal = 0;
        document.querySelectorAll('.addon-check:checked').forEach(cb => {
            addonTotal += parseInt(cb.getAttribute('data-price') || 0);
        });
        const total = (basePrice + addonTotal) * qty;
        document.getElementById('btn-add-label').textContent = 'Masukkan ke Keranjang (Rp ' + total.toLocaleString('id-ID') + ')';
    }

    function changeQty(delta) {
        qty = Math.max(1, qty + delta);
        document.getElementById('item-qty').textContent = qty;
        calculateCustomPrice();
    }
</script>
@endsection
