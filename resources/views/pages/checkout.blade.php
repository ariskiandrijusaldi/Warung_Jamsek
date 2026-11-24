@extends('layouts.app', ['title' => 'Checkout & Pembayaran Pesanan - Warung Jamsek'])

@section('content')
<x-header-customer />

<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10">
<div class="flex flex-col w-full py-space-md md:py-space-lg">
<!-- Progress Stepper (Flowchart Step F -> G -> H -> I) -->
<div class="w-full bg-surface-container-low rounded-xl p-space-md mb-space-lg shadow-sm">
<div class="flex items-center justify-between max-w-2xl mx-auto relative">
<div class="absolute left-6 right-6 top-1/2 -translate-y-1/2 h-1 bg-surface-container-highest z-0">
<div class="h-full bg-primary transition-all duration-500 w-3/4"></div>
</div>
<!-- Step 1: Menu (Completed) -->
<div class="relative z-10 flex flex-col items-center">
<div class="w-9 h-9 rounded-full bg-secondary text-on-secondary flex items-center justify-center font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[18px]">done</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1 hidden sm:block">Pilih Menu</span>
</div>
<!-- Step 2: Info & Alamat (Active F & G) -->
<div class="relative z-10 flex flex-col items-center">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[18px]">location_on</span>
</div>
<span class="font-label-sm text-label-sm text-primary font-bold mt-1 hidden sm:block">Pengantaran</span>
</div>
<!-- Step 3: Bayar (Active H) -->
<div class="relative z-10 flex flex-col items-center">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[18px]">payments</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface mt-1 hidden sm:block">Pembayaran</span>
</div>
<!-- Step 4: Konfirmasi (Ready I) -->
<div class="relative z-10 flex flex-col items-center">
<div class="w-9 h-9 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1 hidden sm:block">Selesai</span>
</div>
</div>
</div>
<!-- Main 2-Column Checkout Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
<!-- Left Column: Delivery Info & Payment Selection (7 Cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-lg">
<!-- Section 1: Informasi Pembeli & Alamat Pengantaran -->
<div class="bg-surface-container-lowest rounded-xl p-space-md md:p-space-lg shadow-sm">
<div class="flex items-center gap-space-sm mb-space-md">
<div class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed">
<span class="font-headline-sm text-headline-sm leading-none font-bold">1</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Informasi Pembeli &amp; Alamat Pengantaran</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Pastikan data tepat agar kurir warung sigap mengantarkan hidangan panas.</p>
</div>
</div>
<form class="space-y-space-md" onsubmit="event.preventDefault();">
<!-- Nama Lengkap -->
<div>
<label class="block font-label-lg text-label-lg text-on-surface mb-space-xs" for="buyer-name">
              Nama Lengkap
            </label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">person</span>
<input class="w-full bg-surface-container-low focus:bg-surface-container-lowest text-on-surface font-body-md text-body-md pl-10 pr-space-md py-2.5 rounded-lg outline-none transition-colors" id="buyer-name" placeholder="Contoh: Budi Santoso" type="text" value="Budi Santoso"/>
</div>
</div>
<!-- WhatsApp / HP -->
<div>
<div class="flex items-center justify-between mb-space-xs">
<label class="font-label-lg text-label-lg text-on-surface" for="buyer-phone">
                Nomor WhatsApp / HP
              </label>
<span class="font-label-sm text-label-sm text-secondary flex items-center gap-0.5">
<span class="material-symbols-outlined text-[14px]">notifications_active</span>
                Update status via WhatsApp
              </span>
</div>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">call</span>
<input class="w-full bg-surface-container-low focus:bg-surface-container-lowest text-on-surface font-body-md text-body-md pl-10 pr-space-md py-2.5 rounded-lg outline-none transition-colors" id="buyer-phone" placeholder="0812-xxxx-xxxx" type="tel" value="0812-3456-7890"/>
</div>
</div>
<!-- Alamat Lengkap Pengantaran -->
<div>
<label class="block font-label-lg text-label-lg text-on-surface mb-space-xs" for="buyer-address">
              Alamat Lengkap Pengantaran
            </label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-[20px]">home_pin</span>
<textarea class="w-full bg-surface-container-low focus:bg-surface-container-lowest text-on-surface font-body-md text-body-md pl-10 pr-space-md py-2.5 rounded-lg outline-none transition-colors resize-none" id="buyer-address" placeholder="Tuliskan nama jalan, RT/RW, nomor rumah, dan patokan lingkungan..." rows="3">Jl. Melati No. 14, RT 02/05, Gang Jamsek, dekat Masjid Al-Ikhlas</textarea>
</div>
</div>
<!-- Catatan Pengantaran -->
<div>
<label class="block font-label-lg text-label-lg text-on-surface mb-space-xs" for="buyer-notes">
              Catatan Khusus untuk Kurir (Opsional)
            </label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant text-[20px]">edit_note</span>
<textarea class="w-full bg-surface-container-low focus:bg-surface-container-lowest text-on-surface font-body-md text-body-md pl-10 pr-space-md py-2.5 rounded-lg outline-none transition-colors resize-none" id="buyer-notes" placeholder="Misal: Warna pagar, titip ke tetangga bila sedang sholat..." rows="2">Pagar warna hitam, tolong titip security bila tidak ada orang</textarea>
</div>
</div>
</form>
</div>
<!-- Section 2: Pilih Metode Pembayaran (Flowchart H) -->
<div class="bg-surface-container-lowest rounded-xl p-space-md md:p-space-lg shadow-sm">
<div class="flex items-center gap-space-sm mb-space-md">
<div class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed">
<span class="font-headline-sm text-headline-sm leading-none font-bold">2</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface">Pilih Metode Pembayaran</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Langkah H: Tentukan cara bayar paling nyaman bagi Anda.</p>
</div>
</div>
<div class="space-y-space-sm" id="payment-options">
<!-- Opsi 1: QRIS (Selected by default) -->
<label class="relative flex flex-col sm:flex-row sm:items-center justify-between p-space-md rounded-xl bg-surface-container cursor-pointer transition-all hover:bg-surface-container-high group" id="option-qris-container">
<div class="flex items-start gap-space-sm">
<input checked="" class="mt-1 w-4 h-4 text-primary accent-primary cursor-pointer" id="pay-qris" name="payment-method" onchange="togglePayment('qris')" type="radio" value="qris"/>
<div>
<div class="flex items-center gap-space-xs flex-wrap">
<span class="font-label-lg text-label-lg text-on-surface font-bold">QRIS (Pembayaran Instan)</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm">
                    Rekomendasi
                  </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  BCA, Mandiri, BRI, GoPay, OVO, Dana, ShopeePay.
                </p>
<div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-surface-container-lowest text-primary font-label-sm text-label-sm shadow-xs">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>Bebas Biaya Admin, Verifikasi Cepat oleh Kasir</span>
</div>
</div>
</div>
<div class="mt-3 sm:mt-0 flex items-center gap-1 self-end sm:self-center">
<span class="material-symbols-outlined text-primary text-[28px]">qr_code_scanner</span>
</div>
</label>
<!-- Opsi 2: COD -->
<label class="relative flex flex-col sm:flex-row sm:items-center justify-between p-space-md rounded-xl bg-surface-container-low cursor-pointer transition-all hover:bg-surface-container group" id="option-cod-container">
<div class="flex items-start gap-space-sm">
<input class="mt-1 w-4 h-4 text-primary accent-primary cursor-pointer" id="pay-cod" name="payment-method" onchange="togglePayment('cod')" type="radio" value="cod"/>
<div>
<div class="flex items-center gap-space-xs flex-wrap">
<span class="font-label-lg text-label-lg text-on-surface font-bold">COD (Bayar Tunai di Tempat)</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container-highest text-on-surface-variant font-label-sm text-label-sm">
                    Uang Tunai
                  </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  Bayar langsung ke kurir Warung Jamsek saat makanan tiba di alamat.
                </p>
<div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-surface-container text-tertiary font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px]">info</span>
<span>Siapkan uang pas saat kurir tiba demi kelancaran pengantaran</span>
</div>
</div>
</div>
<div class="mt-3 sm:mt-0 flex items-center gap-1 self-end sm:self-center">
<span class="material-symbols-outlined text-on-surface-variant text-[28px]">payments</span>
</div>
</label>
</div>
<!-- Trust Badges & Hygiene Assurance -->
<div class="mt-space-md p-space-sm bg-surface-container-low rounded-lg flex items-center gap-space-sm text-on-surface-variant">
<span class="material-symbols-outlined text-secondary text-[20px]">soup_kitchen</span>
<p class="font-body-sm text-body-sm">
            Makanan dikemas dalam wadah ramah lingkungan &amp; disegel stiker higienis Warung Jamsek.
          </p>
</div>
</div>
<!-- CTA Submit Button (Flowchart Step I) Desktop / Prominent -->
<div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm flex flex-col gap-space-sm">
<button class="w-full py-3.5 px-space-lg rounded-full bg-primary hover:bg-primary-container text-on-primary font-headline-sm text-headline-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-space-sm active:scale-[0.99]" id="btn-submit-order" onclick="handleOrderSubmit()">
<span class="material-symbols-outlined text-[24px]">send</span>
<span>Kirim Pesanan Sekarang (Rp 64.000)</span>
</button>
<p class="font-label-sm text-label-sm text-center text-on-surface-variant flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[14px]">lock</span>
          Pesanan diteruskan ke dapur kasir Warung Jamsek secara otomatis
        </p>
</div>
</div>
<!-- Right Column: Cart Summary & Cost Breakdown (5 Cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-md lg:sticky lg:top-24">
<div class="bg-surface-container-lowest rounded-xl p-space-md md:p-space-lg shadow-sm">
<div class="flex items-center justify-between pb-space-sm mb-space-md">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-primary text-[22px]">restaurant_menu</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Ringkasan Keranjang</h3>
</div>
<span class="px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-bold">
            3 Menu
          </span>
</div>
<!-- Rekap Item List -->
<div class="space-y-space-md">
<!-- Item 1: Ayam Sambal Hitam -->
<div class="flex gap-space-sm p-space-sm rounded-lg bg-surface-container-low transition-colors">
<img alt="Ayam Sambal Hitam" class="w-16 h-16 rounded-lg object-cover flex-shrink-0 shadow-xs" data-alt="Close up shot of authentic Indonesian Ayam Goreng covered in glossy rich black sambal hitam sauce with warm steaming white rice and cucumber slices on a rustic ceramic plate warm earthen lighting modern food photography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6teQ_BfE__BeL8awwqkfJotqAE23nek8MwPsm9ju4UoPADuc4iyWeMVjKA6gY7seRM9q0yWJO52bDT6KLgwXyge1GMgq_j15QZazFYmABXbqhUg-2x_DrKvpMtJ9Niv_AVYuCYDVfhDfLHTdZ1tzSVkpppTC02ex_-BP3v1IKdQ9Bmzx9_RpS20q6D0vlnEBjwBKQvGKFMX8SJTa4UtS2buvhW3QANIC-OeFIe7w"/>
<div class="flex-1 min-w-0">
<div class="flex items-start justify-between gap-1">
<h4 class="font-label-lg text-label-lg text-on-surface font-bold truncate">Ayam Sambal Hitam + Nasi</h4>
<span class="font-label-lg text-label-lg text-primary font-bold whitespace-nowrap">Rp 18.000</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant">Porsi: 1x</p>
<!-- Addons & Notes -->
<div class="mt-1 space-y-0.5">
<div class="inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary bg-tertiary-fixed/30 px-1.5 py-0.5 rounded">
<span class="material-symbols-outlined text-[13px]">add_circle</span>
<span>Tambah Sambal (+Rp 2.000)</span>
</div>
<div class="text-on-surface-variant font-body-sm text-body-sm flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">chat_bubble_outline</span>
<span class="italic">Catatan: Sambal dipisah</span>
</div>
</div>
</div>
</div>
<!-- Item 2: Nila Sambal Pecak -->
<div class="flex gap-space-sm p-space-sm rounded-lg bg-surface-container-low transition-colors">
<img alt="Nila Sambal Pecak" class="w-16 h-16 rounded-lg object-cover flex-shrink-0 shadow-xs" data-alt="Crispy fried Indonesian freshwater tilapia fish topped with fresh fiery green sambal pecak shallots green tomatoes fragrant citrus leaf served with rice warm bistro lighting clean presentation" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5exG62SL2_v6F8TRJ6ZweddJZOg9GRIe_7_SqkW6mMTylSO4MdMpzaqd08oGSFYC7KP8F6fX5cH2akfR03Io8Z4x8MEbMtdIoQcKZP5_zAWI10W6zju3gAdboLQOBn3x5fvgRoeW9PWMZGsrBuzwrlXfHoNOdzHc9hS3sfwVjbJ_QVdFSfUAvRmVkSTxtED2TtoG3RSMsK-dm6VjF3hadtiv8-gVpkOIB2YadzTo"/>
<div class="flex-1 min-w-0">
<div class="flex items-start justify-between gap-1">
<h4 class="font-label-lg text-label-lg text-on-surface font-bold truncate">Nila Sambal Pecak + Nasi</h4>
<span class="font-label-lg text-label-lg text-primary font-bold whitespace-nowrap">Rp 18.000</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant">Porsi: 1x</p>
<div class="mt-1">
<span class="font-body-sm text-body-sm text-secondary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">local_fire_department</span>
<span>Pedas Segar Standar</span>
</span>
</div>
</div>
</div>
<!-- Item 3: Jus Pokat -->
<div class="flex gap-space-sm p-space-sm rounded-lg bg-surface-container-low transition-colors">
<img alt="Jus Pokat" class="w-16 h-16 rounded-lg object-cover flex-shrink-0 shadow-xs" data-alt="Two tall glasses of creamy fresh Indonesian avocado juice smoothie drizzled with rich chocolate condensed milk topped with crunchy chocochips natural light warm wooden table bistro setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOkW_n11G2sRp8CFKlMb-Pl2TpjH6toYgtkJuE7GdszV3vR_59LuPcxYj5wwkZr4FgoaKDuZeyrjWfE6arTtpyC4crU6Mh-rOrct8zhqFyEwIPlm5uQTlZDolo92EPBw09ruCaq61NvY4JFsLGk0Tk8uNBkruq5FhDVrDVw-oNz53rrU_QRfF3wDPEQSFcp3dcX17ILegd3WAm-0TubJ6gGPdDYwFiMQHgNkSR1a0"/>
<div class="flex-1 min-w-0">
<div class="flex items-start justify-between gap-1">
<h4 class="font-label-lg text-label-lg text-on-surface font-bold truncate">Jus Pokat</h4>
<span class="font-label-lg text-label-lg text-primary font-bold whitespace-nowrap">Rp 16.000</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant">Porsi: 2x (@ Rp 8.000)</p>
<!-- Addon -->
<div class="mt-1">
<div class="inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary bg-tertiary-fixed/30 px-1.5 py-0.5 rounded">
<span class="material-symbols-outlined text-[13px]">add_circle</span>
<span>Chocochips (+Rp 2.000)</span>
</div>
</div>
</div>
</div>
</div>
<!-- Rincian Biaya -->
<div class="mt-space-md pt-space-md bg-surface-container-lowest space-y-space-xs">
<div class="flex items-center justify-between font-body-sm text-body-sm text-on-surface-variant">
<span>Subtotal Menu</span>
<span class="font-label-md text-label-md text-on-surface">Rp 52.000</span>
</div>
<div class="flex items-center justify-between font-body-sm text-body-sm text-on-surface-variant">
<span>Subtotal Add-on &amp; Topping</span>
<span class="font-label-md text-label-md text-on-surface">Rp 4.000</span>
</div>
<div class="flex items-center justify-between font-body-sm text-body-sm text-on-surface-variant">
<div class="flex items-center gap-1">
<span>Ongkir Kurir Warung</span>
<span class="material-symbols-outlined text-[16px] text-secondary">moped</span>
</div>
<span class="font-label-md text-label-md text-on-surface">Rp 8.000</span>
</div>
<div class="flex items-center justify-between font-body-sm text-body-sm text-secondary">
<span>Diskon Biaya Kemasan</span>
<span class="font-label-md text-label-md">- Rp 0</span>
</div>
<!-- Grand Total Bar -->
<div class="mt-space-md p-space-md rounded-xl bg-surface-container flex items-center justify-between">
<div>
<span class="block font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Grand Total</span>
<span class="font-headline-md text-headline-md text-primary font-bold">Rp 64.000</span>
</div>
<div class="text-right">
<span class="font-label-sm text-label-sm text-secondary bg-secondary-container px-2 py-1 rounded-full font-semibold">
                Sudah Termasuk Pajak
              </span>
</div>
</div>
</div>
<!-- Estimasi Waktu Pengantaran -->
<div class="mt-space-md p-space-sm bg-surface-container-low rounded-lg flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container flex-shrink-0">
<span class="material-symbols-outlined text-[18px]">avg_time</span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface">Estimasi Sampai: 25 - 35 Menit</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Dimasak segar langsung setelah pesanan terkonfirmasi.</p>
</div>
</div>
</div>
<!-- Help / Warung Direct Contact Card -->
<div class="bg-surface-container-low rounded-xl p-space-md flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-secondary text-[24px]">support_agent</span>
<div>
<h5 class="font-label-md text-label-md text-on-surface">Butuh Bantuan Pesanan?</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Admin standby via WhatsApp</p>
</div>
</div>
<a class="px-space-md py-1.5 rounded-full bg-surface-container-lowest text-on-surface hover:text-primary font-label-md text-label-md font-bold shadow-xs transition-colors" href="https://wa.me/6281234567890" target="_blank">
          Chat Kasir
        </a>
</div>
</div>
</div>
<!-- Notification Banner Modal / Overlay for Order Confirmation Simulation -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-xs p-space-md hidden opacity-0 transition-opacity duration-300" id="order-success-modal">
<div class="bg-surface-container-lowest rounded-2xl max-w-md w-full p-space-lg shadow-xl text-center flex flex-col items-center">
<div class="w-16 h-16 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center mb-space-sm">
<span class="material-symbols-outlined text-[36px]">check_circle</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-1">Pesanan Berhasil Dikirim!</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
        Terima kasih, Budi! Tiket pesanan <strong class="text-primary font-bold">#WJ-8942</strong> telah masuk ke dapur Warung Jamsek. Rincian telah dikirimkan ke WhatsApp Anda.
      </p>
<div class="w-full bg-surface-container p-space-sm rounded-lg mb-space-md text-left font-body-sm text-body-sm space-y-1">
<div class="flex justify-between">
<span class="text-on-surface-variant">Metode Bayar:</span>
<span class="font-semibold text-on-surface" id="modal-pay-label">QRIS Instan</span>
</div>
<div class="flex justify-between">
<span class="text-on-surface-variant">Total Bayar:</span>
<span class="font-bold text-primary">Rp 64.000</span>
</div>
</div>
<button class="w-full py-2.5 rounded-full bg-primary text-on-primary font-label-lg text-label-lg font-bold shadow-sm hover:bg-primary-container transition-colors" onclick="closeSuccessModal()">
        Lihat Status Pesanan
      </button>
</div>
</div>
<!-- Interactive Script for Payment Selection & Submission Flow -->
<script>
    function togglePayment(method) {
      const qrisBox = document.getElementById('option-qris-container');
      const codBox = document.getElementById('option-cod-container');
      
      if (method === 'qris') {
        qrisBox.classList.add('bg-surface-container');
        qrisBox.classList.remove('bg-surface-container-low');
        codBox.classList.add('bg-surface-container-low');
        codBox.classList.remove('bg-surface-container');
      } else {
        codBox.classList.add('bg-surface-container');
        codBox.classList.remove('bg-surface-container-low');
        qrisBox.classList.add('bg-surface-container-low');
        qrisBox.classList.remove('bg-surface-container');
      }
    }

    function handleOrderSubmit() {
      const btn = document.getElementById('btn-submit-order');
      const isQris = document.getElementById('pay-qris').checked;
      const modalPayLabel = document.getElementById('modal-pay-label');
      
      modalPayLabel.textContent = isQris ? 'QRIS Instan (Bebas Biaya Admin)' : 'COD (Bayar Tunai di Tempat)';

      btn.disabled = true;
      btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[20px]">progress_activity</span><span>Memproses Pesanan...</span>';

      setTimeout(() => {
        btn.disabled = false;
        btn.innerHTML = '<span class="material-symbols-outlined text-[24px]">send</span><span>Kirim Pesanan Sekarang (Rp 64.000)</span>';
        
        const modal = document.getElementById('order-success-modal');
        modal.classList.remove('hidden');
        setTimeout(() => modal.classList.remove('opacity-0'), 10);
      }, 700);
    }

    function closeSuccessModal() {
      const modal = document.getElementById('order-success-modal');
      modal.classList.add('opacity-0');
      setTimeout(() => modal.classList.add('hidden'), 300);
    }
  </script>
</div>
</main>

<footer class="w-full bg-surface-container-low mt-9" id="kontak">
    <div class="max-w-[1240px] mx-auto px-4 md:px-7 lg:px-10 py-9">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold">W</div>
                    <span class="text-lg font-bold text-primary">Warung Jamsek</span>
                </div>
                <p class="text-xs text-on-surface-variant leading-relaxed mb-4">
                    Menyajikan aneka masakan rumahan autentik, nasi bungkus hangat, aneka sambal racik, dan minuman segar dengan kehangatan khas santapan keluarga.
                </p>
                <div class="flex items-center gap-2 text-secondary">
                    <span class="material-symbols-outlined text-[18px]">verified</span>
                    <span class="text-xs font-semibold">Higienis, Halal &amp; Selalu Segar Tiap Hari</span>
                </div>
            </div>
            <div>
                <h3 class="text-base font-bold text-on-surface mb-3">Jam Buka &amp; Layanan</h3>
                <div class="space-y-2 text-on-surface-variant text-xs">
                    <p class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
                        <span>Senin - Sabtu: 08.00 - 21.00 WIB</span>
                    </p>
                    <p class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px] text-tertiary">event_busy</span>
                        <span>Minggu &amp; Hari Libur: 09.00 - 18.00 WIB</span>
                    </p>
                    <p class="flex items-center gap-2 mt-3">
                        <span class="material-symbols-outlined text-[18px] text-secondary">moped</span>
                        <span>Pesan Antar Kurir Lokal &amp; Ambil di Warung</span>
                    </p>
                </div>
            </div>
            <div>
                <h3 class="text-base font-bold text-on-surface mb-3">Bantuan &amp; WhatsApp</h3>
                <div class="space-y-3">
                    <a class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary-container text-on-secondary-container hover:bg-secondary-fixed transition-colors text-xs font-semibold" href="https://wa.me/6281234567890" target="_blank">
                        <span class="material-symbols-outlined text-[18px]">chat</span>
                        <span>WhatsApp: 0812-3456-7890</span>
                    </a>
                    <p class="text-xs text-on-surface-variant">Jl. Melati No. 14, Blok D, Dekat Pos Warga, Surabaya</p>
                </div>
            </div>
        </div>
        <div class="pt-4 border-t border-outline-variant/30 flex flex-col md:flex-row items-center justify-between gap-3 text-xs text-on-surface-variant">
            <p>© 2026 Warung Jamsek. Hak Cipta Dilindungi UMKM Nusantara.</p>
            <div class="flex items-center gap-4">
                <a class="hover:text-primary transition-colors" href="#">Syarat Pemesanan</a>
                <a class="hover:text-primary transition-colors" href="#">Privasi</a>
            </div>
        </div>
    </div>
</footer>
@endsection