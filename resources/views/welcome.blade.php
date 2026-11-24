@extends('layouts.app', ['title' => 'Warung Jamsek - Cita Rasa Hangat Rumahan'])

@push('styles')
<!-- Google Fonts for Editorial Serif & Warm Script -->
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<style>
    .font-serif-display {
        font-family: 'DM Serif Display', Georgia, serif;
    }
    .font-handwriting {
        font-family: 'Caveat', cursive;
    }
    .bg-warung-dark {
        background-color: #20130f;
    }
    .text-warung-orange {
        color: #d85d38;
    }
    .bg-warung-orange {
        background-color: #d85d38;
    }
    .border-warung-orange {
        border-color: #d85d38;
    }
    .text-warung-amber {
        color: #e59a38;
    }
</style>
@endpush

@section('content')
<div class="bg-[#20130f] text-[#f5ebe6] min-h-screen flex flex-col font-sans selection:bg-[#d85d38] selection:text-white">
    <!-- Top Header / Navbar (Matching Screenshot) -->
    <header class="w-full bg-[#20130f]/95 sticky top-0 z-50 backdrop-blur-md border-b border-white/5">
        <div class="max-w-[1320px] mx-auto px-6 md:px-10 lg:px-12 h-20 flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-[#d85d38] flex items-center justify-center text-white font-bold text-lg shadow-sm group-hover:scale-105 transition-transform">
                    <span class="sr-only">WJ</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-serif-display text-xl tracking-tight text-white leading-none">Warung Jamsek</span>
                    <span class="text-[9px] tracking-[0.2em] text-[#d1c2be] font-bold mt-1 uppercase">Cita Rasa Hangat Rumahan</span>
                </div>
            </a>

            <!-- Center Nav Links -->
            <nav class="hidden lg:flex items-center gap-7 text-xs font-semibold text-[#d1c2be]">
                <a href="{{ url('/') }}" class="text-[#d85d38] relative py-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:right-0 after:h-[2px] after:bg-[#d85d38] after:rounded-full">
                    Home
                </a>
                <a href="#tentang-kami" class="hover:text-white transition-colors">
                    Tentang Kami
                </a>
                <a href="{{ url('/menu-katalog') }}" class="hover:text-white transition-colors">
                    Menu &amp; Katalog
                </a>
                <a href="#galeri" class="hover:text-white transition-colors">
                    Galeri Masakan
                </a>
                <a href="#cara-pesan" class="hover:text-white transition-colors">
                    Cara Pesan
                </a>
                <a href="{{ url('/kontak-cabang') }}" class="hover:text-white transition-colors">
                    Kontak
                </a>
            </nav>

            <!-- Right CTAs -->
            <div class="flex items-center gap-3">
                <!-- Login Kasir Button -->
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full border border-white/20 bg-white/5 hover:bg-white/10 text-white text-xs font-semibold transition-all">
                    <span class="material-symbols-outlined text-[15px] text-[#d1c2be]">logout</span>
                    <span>Login Kasir</span>
                </a>

                <!-- Mulai Pesan Button -->
                <a href="{{ url('/menu-katalog') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-full bg-[#d85d38] hover:bg-[#bd4e2c] text-white text-xs font-bold shadow-md hover:shadow-lg transition-all active:scale-95">
                    <span class="material-symbols-outlined text-[15px]">shopping_bag</span>
                    <span>mulai pesan</span>
                </a>
            </div>
        </div>
    </header>

    <!-- HERO SECTION (Exact Match with Uploaded Screenshot) -->
    <section class="w-full relative overflow-hidden pt-8 md:pt-14 pb-16 md:pb-24">
        <div class="max-w-[1320px] mx-auto px-6 md:px-10 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-12 items-center">
            <!-- Left Content (6-7 Cols) -->
            <div class="lg:col-span-7 flex flex-col items-start z-10">
                <!-- Amber Cursive Script Tagline -->
                <span class="font-handwriting text-2xl md:text-3xl text-[#e59a38] font-bold mb-3 tracking-wide">
                    Sajian Hangat, Resep Otentik Warisan
                </span>

                <!-- Main Editorial Serif Heading -->
                <h1 class="font-serif-display text-4xl sm:text-5xl lg:text-6xl text-white font-normal leading-[1.12] tracking-tight mb-5">
                    Nikmati Kelezatan Makanan Rumahan yang Bikin Kangen Pulang
                </h1>

                <!-- Description Paragraph -->
                <p class="text-sm md:text-base text-[#d1c2be] leading-relaxed max-w-xl mb-8 font-light">
                    Dari racikan rempah pilihan nusantara hingga sambal ulek dadak yang menggugah selera. Setiap porsi dimasak dengan ketulusan untuk menghangatkan santap bersama keluarga &amp; sahabat tercinta.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 mb-10">
                    <a href="{{ url('/menu-katalog') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#d85d38] hover:bg-[#bd4e2c] text-white text-xs md:text-sm font-bold shadow-lg transition-all active:scale-95">
                        <span>Jelajahi Menu Kami</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>

                    <button type="button" onclick="openStoryModal()" class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-full border border-white/20 bg-white/5 hover:bg-white/10 text-white text-xs md:text-sm font-semibold transition-all">
                        <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-xs">play_arrow</span>
                        </span>
                        <span>CeritaWarung</span>
                    </button>
                </div>

                <!-- Carousel Slider Dots -->
                <div class="flex items-center gap-2">
                    <span class="w-6 h-1 rounded-full bg-[#d85d38]"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-white/20"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-white/20"></span>
                </div>
            </div>

            <!-- Right Visual: Capsule Shaped Food Image with Floating Badges (5-6 Cols) -->
            <div class="lg:col-span-5 relative flex justify-center lg:justify-end">
                <div class="relative w-full max-w-[540px]">
                    <!-- Pill / Capsule Shaped Main Container -->
                    <div class="w-full aspect-[16/11] rounded-[60px] overflow-hidden shadow-2xl relative border-4 border-white/5 bg-[#2d1b16]">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6teQ_BfE__BeL8awwqkfJotqAE23nek8MwPsm9ju4UoPADuc4iyWeMVjKA6gY7seRM9q0yWJO52bDT6KLgwXyge1GMgq_j15QZazFYmABXbqhUg-2x_DrKvpMtJ9Niv_AVYuCYDVfhDfLHTdZ1tzSVkpppTC02ex_-BP3v1IKdQ9Bmzx9_RpS20q6D0vlnEBjwBKQvGKFMX8SJTa4UtS2buvhW3QANIC-OeFIe7w" alt="Hidangan Warung Jamsek Sambal Hitam Tradisional"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    </div>

                    <!-- Top-Right Floating Rating Badge -->
                    <div class="absolute -top-3 right-4 sm:right-6 bg-white/95 text-[#1f1b1a] px-3.5 py-1.5 rounded-2xl shadow-xl flex items-center gap-2 backdrop-blur-md border border-white">
                        <span class="text-[#e59a38] text-sm font-bold flex items-center gap-0.5">
                            ★ 4.9
                        </span>
                        <div class="h-3 w-[1px] bg-black/15"></div>
                        <div class="flex flex-col">
                            <span class="text-[11px] font-bold leading-tight">25.000+</span>
                            <span class="text-[9px] text-[#56423c] leading-tight">Pelanggan Puas</span>
                        </div>
                    </div>

                    <!-- Bottom-Left Floating Specialty Badge -->
                    <div class="absolute -bottom-4 left-4 sm:left-6 bg-[#20130f]/90 text-white px-4 py-2.5 rounded-2xl shadow-xl flex items-center gap-2.5 backdrop-blur-md border border-white/10">
                        <span class="text-xl">🌶️</span>
                        <div class="flex flex-col">
                            <span class="text-[9px] font-bold tracking-wider text-[#d85d38] uppercase leading-tight">Spesialisasi</span>
                            <span class="text-xs font-bold text-white leading-tight">Sambal Dadak &amp; Hitam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Menu Unggulan Warung Jamsek -->
    <section class="w-full bg-[#271713] py-16 border-t border-white/5" id="menu">
        <div class="max-w-[1320px] mx-auto px-6 md:px-10 lg:px-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
                <div>
                    <span class="font-handwriting text-2xl text-[#e59a38] font-bold block mb-1">
                        Paling Banyak Dipesan
                    </span>
                    <h2 class="font-serif-display text-3xl md:text-4xl text-white font-normal">
                        Menu Favorit Pelanggan
                    </h2>
                </div>
                <a href="{{ url('/menu-katalog') }}" class="text-xs font-bold text-[#d85d38] hover:underline flex items-center gap-1">
                    Lihat Semua 19 Menu <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Item 1 -->
                <div class="bg-[#20130f] rounded-2xl p-4 border border-white/5 hover:border-[#d85d38]/50 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-black/20 relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6teQ_BfE__BeL8awwqkfJotqAE23nek8MwPsm9ju4UoPADuc4iyWeMVjKA6gY7seRM9q0yWJO52bDT6KLgwXyge1GMgq_j15QZazFYmABXbqhUg-2x_DrKvpMtJ9Niv_AVYuCYDVfhDfLHTdZ1tzSVkpppTC02ex_-BP3v1IKdQ9Bmzx9_RpS20q6D0vlnEBjwBKQvGKFMX8SJTa4UtS2buvhW3QANIC-OeFIe7w" alt="Ayam Sambal Hitam"/>
                            <span class="absolute top-2 left-2 bg-[#d85d38] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Favorit</span>
                        </div>
                        <h3 class="font-bold text-white text-sm">Ayam Sambal Hitam + Nasi</h3>
                        <p class="text-[11px] text-[#d1c2be] mt-1 line-clamp-2">Bumbu hitam khas Madura gurih rempah sangrai pedas mantap.</p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between">
                        <span class="font-bold text-[#d85d38] text-sm">Rp 18.000</span>
                        <a href="{{ url('/detail-menu') }}" class="px-3 py-1.5 rounded-full bg-[#d85d38] hover:bg-[#bd4e2c] text-white text-xs font-bold transition-colors">
                            Pesan
                        </a>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="bg-[#20130f] rounded-2xl p-4 border border-white/5 hover:border-[#d85d38]/50 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-black/20 relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBupdXrBjOyprPnY_7-1aN1i5BzUqxh185-mO8qYrdFt3WM7NnAXeYoqwSfIGbn-BJG--neehPAoHGvXGf6QK2pxL7kAzWZhTfGK2UaB7FXOkw8eFEV2-6ud-l24UXN-vrQH7JZWp4Dd7n7Nix9oIXQdKevnb0SrBPQTkQSeAgfKdfkHFXnXwdg4-_aEkHYlMkC__wVwbioPmRlYPMMYRaHsMxGnxViY03kBXOtvYI" alt="Nila Sambal Pecak"/>
                            <span class="absolute top-2 left-2 bg-[#e59a38] text-[#20130f] text-[10px] font-bold px-2 py-0.5 rounded-full">New Menu</span>
                        </div>
                        <h3 class="font-bold text-white text-sm">Nila Sambal Pecak + Nasi</h3>
                        <p class="text-[11px] text-[#d1c2be] mt-1 line-clamp-2">Nila goreng garing guyur sambal pecak rawit hijau segar asam gurih.</p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between">
                        <span class="font-bold text-[#d85d38] text-sm">Rp 18.000</span>
                        <a href="{{ url('/detail-menu') }}" class="px-3 py-1.5 rounded-full bg-[#d85d38] hover:bg-[#bd4e2c] text-white text-xs font-bold transition-colors">
                            Pesan
                        </a>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="bg-[#20130f] rounded-2xl p-4 border border-white/5 hover:border-[#d85d38]/50 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-black/20 relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2ZA9WrHg5Dno3OOJTde16u89BnLota71PnnHOeKCtDOtIrhTsTRDOxLipA7LXYFZcTuocwJWZS2K5BAuZbqLtdny_2qOr2i7phO2dsgOPMW6sForeS1Bwx6sQef4eC3-aJFq2QSppCZXddJtrKblUS7pmoRw-lmocMTwmueOUQq82F0-8K9dDhpB2PtVsP0xXFUYYnFSF5STyChjJrvNxlHpRo5xOPjb7PnLaixo" alt="Ayam Kremes"/>
                            <span class="absolute top-2 left-2 bg-[#426748] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Best Seller</span>
                        </div>
                        <h3 class="font-bold text-white text-sm">Ayam Kremes + Nasi</h3>
                        <p class="text-[11px] text-[#d1c2be] mt-1 line-clamp-2">Ayam empuk gurih berselimut limpahan kremes renyah sarang burung.</p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between">
                        <span class="font-bold text-[#d85d38] text-sm">Rp 17.000</span>
                        <a href="{{ url('/menu-katalog') }}" class="px-3 py-1.5 rounded-full bg-[#d85d38] hover:bg-[#bd4e2c] text-white text-xs font-bold transition-colors">
                            Pesan
                        </a>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="bg-[#20130f] rounded-2xl p-4 border border-white/5 hover:border-[#d85d38]/50 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="w-full aspect-[4/3] rounded-xl overflow-hidden mb-3 bg-black/20 relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzw2z7cpXXboYJIm5fV6iixUIwisD10Fao6KluZuSPDGOR9jdJAcYU_M9lp7LS-ZM5ZhXbpCwFyYniBTjlUn9idmBd7Em3siA1mU0MhgogN9GU8qbzi6lu08Ujc6n4tjn_SePJfUTU7T-jRfe8ei3lVNjDwBJUtYGhxwbCQdAcEoqOwIrjwYbcBzM4LxZYM8Oq7jCH0jgbHgj8g4kGyi5Hz6fvmzXrLane0LVLmUY" alt="Jus Pokat"/>
                            <span class="absolute top-2 left-2 bg-[#426748] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Segar Alami</span>
                        </div>
                        <h3 class="font-bold text-white text-sm">Jus Pokat (Alpukat Cokelat)</h3>
                        <p class="text-[11px] text-[#d1c2be] mt-1 line-clamp-2">Alpukat mentega asli dikocok kental dengan lumuran susu cokelat manis pas.</p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between">
                        <span class="font-bold text-[#d85d38] text-sm">Rp 8.000</span>
                        <a href="{{ url('/menu-katalog') }}" class="px-3 py-1.5 rounded-full bg-[#d85d38] hover:bg-[#bd4e2c] text-white text-xs font-bold transition-colors">
                            Pesan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Tentang Kami & Cerita Warung -->
    <section class="w-full py-16 border-t border-white/5" id="tentang-kami">
        <div class="max-w-[1320px] mx-auto px-6 md:px-10 lg:px-12 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div>
                <span class="font-handwriting text-2xl text-[#e59a38] font-bold block mb-2">
                    Hangat Khas Santapan Keluarga
                </span>
                <h2 class="font-serif-display text-3xl md:text-4xl text-white mb-4">
                    Tradisi Dapur Jamsek Dari Generasi ke Generasi
                </h2>
                <p class="text-xs md:text-sm text-[#d1c2be] leading-relaxed mb-4">
                    Warung Jamsek bermula dari kerinduan akan masakan ibu di kampung halaman: nasi hangat pulen yang baru mengepul, wangi terasi yang digoreng garing, dan aneka sambal racik yang selalu menggoda selera.
                </p>
                <p class="text-xs md:text-sm text-[#d1c2be] leading-relaxed mb-6">
                    Kini kami hadir melayani ribuan pelanggan setiap hari, baik yang bersantap langsung di gerai kami maupun memesan antar ke rumah dan kantor.
                </p>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                        <span class="font-serif-display text-2xl font-bold text-[#d85d38]">100%</span>
                        <span class="text-[11px] text-[#d1c2be] block mt-1">Bahan Alami</span>
                    </div>
                    <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                        <span class="font-serif-display text-2xl font-bold text-[#d85d38]">19+</span>
                        <span class="text-[11px] text-[#d1c2be] block mt-1">Pilihan Menu</span>
                    </div>
                    <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                        <span class="font-serif-display text-2xl font-bold text-[#d85d38]">25K+</span>
                        <span class="text-[11px] text-[#d1c2be] block mt-1">Pelanggan Puas</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <img class="w-full h-48 rounded-2xl object-cover shadow-lg" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBD_VYec1KvfH96zkIuhIA8Tp20ynYUcEp00mGKcyU1aH7kNOnQWZ7NQnR7hR8po-atVgW9u2vPHge3VHg4XTcJ8pgdjvAV2wjHe6gRp9Z3Vj5eHbxiiRH0v-j0AsXQ5SNcy12gi375JoYsoRIwrLFPfjjuz4e901TKrh3Fzz7NuDFtFJFIt0YNomFga_UeuRFhbgYV-waL8ApqYZeag7r5JX5VUPqHAwctiBIeap8" alt="Dapur Masak"/>
                <img class="w-full h-48 rounded-2xl object-cover shadow-lg mt-6" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBupdXrBjOyprPnY_7-1aN1i5BzUqxh185-mO8qYrdFt3WM7NnAXeYoqwSfIGbn-BJG--neehPAoHGvXGf6QK2pxL7kAzWZhTfGK2UaB7FXOkw8eFEV2-6ud-l24UXN-vrQH7JZWp4Dd7n7Nix9oIXQdKevnb0SrBPQTkQSeAgfKdfkHFXnXwdg4-_aEkHYlMkC__wVwbioPmRlYPMMYRaHsMxGnxViY03kBXOtvYI" alt="Penyajian Ikan"/>
            </div>
        </div>
    </section>

    <!-- SECTION: Cara Pesan (4 Langkah Mudah) -->
    <section class="w-full bg-[#271713] py-16 border-t border-white/5" id="cara-pesan">
        <div class="max-w-[1320px] mx-auto px-6 md:px-10 lg:px-12 text-center">
            <span class="font-handwriting text-2xl text-[#e59a38] font-bold block mb-2">
                Praktis &amp; Cepat
            </span>
            <h2 class="font-serif-display text-3xl md:text-4xl text-white mb-10">
                Cara Pesan di Warung Jamsek
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-left">
                <div class="bg-[#20130f] p-6 rounded-2xl border border-white/5">
                    <span class="w-10 h-10 rounded-full bg-[#d85d38] text-white font-bold text-sm flex items-center justify-center mb-4">1</span>
                    <h3 class="font-bold text-white text-base mb-1">Pilih Menu</h3>
                    <p class="text-xs text-[#d1c2be] leading-relaxed">Jelajahi menu ayam, ikan, tumisan, sambal dadak, serta minuman segar.</p>
                </div>
                <div class="bg-[#20130f] p-6 rounded-2xl border border-white/5">
                    <span class="w-10 h-10 rounded-full bg-white/10 text-white font-bold text-sm flex items-center justify-center mb-4">2</span>
                    <h3 class="font-bold text-white text-base mb-1">Tentukan Alamat</h3>
                    <p class="text-xs text-[#d1c2be] leading-relaxed">Masukkan alamat pengantaran kurir atau pilih nomor meja bila santap di tempat.</p>
                </div>
                <div class="bg-[#20130f] p-6 rounded-2xl border border-white/5">
                    <span class="w-10 h-10 rounded-full bg-white/10 text-white font-bold text-sm flex items-center justify-center mb-4">3</span>
                    <h3 class="font-bold text-white text-base mb-1">Bayar Fleksibel</h3>
                    <p class="text-xs text-[#d1c2be] leading-relaxed">Bayar praktis melalui QRIS instan bebas admin atau COD bayar tunai di tempat.</p>
                </div>
                <div class="bg-[#20130f] p-6 rounded-2xl border border-white/5">
                    <span class="w-10 h-10 rounded-full bg-white/10 text-white font-bold text-sm flex items-center justify-center mb-4">4</span>
                    <h3 class="font-bold text-white text-base mb-1">Makanan Tiba</h3>
                    <p class="text-xs text-[#d1c2be] leading-relaxed">Kurir warung mengantarkan hidangan panas dengan segel higienis ramah lingkungan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FLOATING DRAWER: 10 Modul Switcher untuk Developer & Pengujian -->
    <div class="w-full bg-[#180e0b] border-t border-white/10 py-6">
        <div class="max-w-[1320px] mx-auto px-6 md:px-10 lg:px-12">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#d85d38] text-lg">grid_view</span>
                    <span class="text-xs font-bold text-white uppercase tracking-wider">Navigasi Cepat 10 Layar Stitch Warung Jamsek</span>
                </div>
                <span class="text-[10px] text-[#d1c2be]">Semua modul terhubung</span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-5 gap-2 text-xs">
                <a href="{{ url('/pos') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">point_of_sale</span>
                    <span class="truncate">1. Kasir POS</span>
                </a>
                <a href="{{ url('/pesanan') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">skillet</span>
                    <span class="truncate">2. Antrean Dapur</span>
                </a>
                <a href="{{ url('/checkout') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">shopping_cart_checkout</span>
                    <span class="truncate">3. Checkout</span>
                </a>
                <a href="{{ url('/katalog') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">menu_book</span>
                    <span class="truncate">4. Master Menu</span>
                </a>
                <a href="{{ url('/laporan') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">analytics</span>
                    <span class="truncate">5. Laporan Omzet</span>
                </a>
                <a href="{{ url('/menu-katalog') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">restaurant</span>
                    <span class="truncate">6. Katalog Pembeli</span>
                </a>
                <a href="{{ url('/cek-pesanan') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">moped</span>
                    <span class="truncate">7. Lacak Pesanan</span>
                </a>
                <a href="{{ url('/kontak-cabang') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">storefront</span>
                    <span class="truncate">8. Kontak Cabang</span>
                </a>
                <a href="{{ url('/detail-menu') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">tune</span>
                    <span class="truncate">9. Detail Kustomisasi</span>
                </a>
                <a href="{{ url('/konfirmasi-pesanan') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-[#d85d38] text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">receipt</span>
                    <span class="truncate">10. Tiket E-Nota</span>
                </a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="w-full bg-[#140b08] py-8 border-t border-white/5">
        <div class="max-w-[1320px] mx-auto px-6 md:px-10 lg:px-12 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#a0908b]">
            <div class="flex items-center gap-3">
                <span class="font-serif-display text-sm text-white">Warung Jamsek</span>
                <span>•</span>
                <span>© 2026 Hak Cipta Dilindungi UMKM Nusantara</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ url('/kontak-cabang') }}" class="hover:text-white transition-colors">Surabaya, Indonesia</a>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-white transition-colors">WhatsApp Kasir</a>
            </div>
        </div>
    </footer>
</div>

<!-- Modal Cerita Warung -->
<div class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4" id="story-modal">
    <div class="bg-[#20130f] border border-white/10 max-w-lg w-full rounded-3xl p-6 text-left shadow-2xl animate-in zoom-in-95">
        <div class="flex items-center justify-between pb-3 border-b border-white/10 mb-4">
            <span class="font-handwriting text-2xl text-[#e59a38]">Cerita Warung Jamsek</span>
            <button onclick="closeStoryModal()" class="w-8 h-8 rounded-full bg-white/10 text-white flex items-center justify-center">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        </div>
        <p class="text-xs text-[#d1c2be] leading-relaxed mb-4">
            Warung Jamsek lahir dari sebuah dapur keluarga di Surabaya yang mendedikasikan waktu meracik bumbu sangrai hitam dan sambal ulek dadak. Kami percaya bahwa makanan yang disajikan hangat dengan ketulusan mampu menghapus rasa lelah setelah seharian beraktivitas.
        </p>
        <div class="w-full aspect-video rounded-2xl overflow-hidden mb-4 bg-black/40">
            <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6teQ_BfE__BeL8awwqkfJotqAE23nek8MwPsm9ju4UoPADuc4iyWeMVjKA6gY7seRM9q0yWJO52bDT6KLgwXyge1GMgq_j15QZazFYmABXbqhUg-2x_DrKvpMtJ9Niv_AVYuCYDVfhDfLHTdZ1tzSVkpppTC02ex_-BP3v1IKdQ9Bmzx9_RpS20q6D0vlnEBjwBKQvGKFMX8SJTa4UtS2buvhW3QANIC-OeFIe7w" alt="Cerita Warung"/>
        </div>
        <button onclick="closeStoryModal()" class="w-full py-2.5 rounded-full bg-[#d85d38] text-white text-xs font-bold">
            Tutup Cerita
        </button>
    </div>
</div>

<script>
    function openStoryModal() {
        document.getElementById('story-modal').classList.remove('hidden');
        document.getElementById('story-modal').classList.add('flex');
    }
    function closeStoryModal() {
        document.getElementById('story-modal').classList.add('hidden');
        document.getElementById('story-modal').classList.remove('flex');
    }
</script>
@endsection
