<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Mapping of Google Stitch Screen IDs
$screenMap = [
    '06d6acde14314746be3df8f3a8e7646a' => 'pages.pos',
    '3cd49cda4ded4432aae2a5739864ee84' => 'pages.orders',
    '3fe7b250bf0a4c6cb4ed364472a6af7f' => 'pages.checkout',
    '13207452315473676509'              => 'pages.menu',
    'a079c060a7944ae49a1ef53bdc0045ae' => 'pages.laporan',
    'bd1893363d5e4330a294941c6f0992a0' => 'pages.katalog-pelanggan',
    'c4d37eab5626485ba9304c2629a22be1' => 'pages.lacak-pesanan',
    'db772fa8aaf24eadafb00fbbd1641645' => 'pages.kontak-cabang',
    'e0a4403246274f4a9b61828dca00dca4' => 'pages.detail-menu',
    'e902a252899c40b888d316482f9b52e7' => 'pages.login',
];

// Home & Portal Hub
Route::get('/', function () use ($screenMap) {
    return view('welcome', ['screenMap' => $screenMap]);
})->name('home');

// 1. Kasir & POS
Route::get('/pos', function () {
    return view('pages.pos');
})->name('pos');
Route::get('/kasir', function () {
    return redirect()->route('pos');
});

// Kasir login (demo). A valid form submission opens the POS workspace.
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'pin' => ['required', 'digits:4'],
    ]);

    $request->session()->put('cashier_name', $validated['name']);

    return redirect()->route('pos');
})->name('login.submit');

// 2. Daftar Pesanan & Antrean Dapur
Route::get('/pesanan', function () {
    return view('pages.orders');
})->name('orders');
Route::get('/orders', function () {
    return redirect()->route('orders');
});

// 3. Checkout & Pembayaran
Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

// 4. Katalog Master Menu & Addons
Route::get('/katalog', function () {
    return view('pages.menu');
})->name('menu');
Route::get('/menu', function () {
    return redirect()->route('menu');
});

// 5. Laporan Penjualan Harian
Route::get('/laporan', function () {
    return view('pages.laporan');
})->name('laporan');

// 6. Katalog Menu Pelanggan
Route::get('/menu-katalog', function () {
    return view('pages.katalog-pelanggan');
})->name('katalog-pelanggan');

// 7. Cek / Lacak Pesanan Live
Route::get('/cek-pesanan', function () {
    return view('pages.lacak-pesanan');
})->name('lacak-pesanan');
Route::get('/lacak', function () {
    return redirect()->route('lacak-pesanan');
});

// 8. Kontak & Cabang
Route::get('/kontak-cabang', function () {
    return view('pages.kontak-cabang');
})->name('kontak-cabang');
Route::get('/cabang', function () {
    return redirect()->route('kontak-cabang');
});

// 9. Detail & Kustomisasi Menu
Route::get('/detail-menu', function () {
    return view('pages.detail-menu');
})->name('detail-menu');

// 10. Konfirmasi Sukses Pesanan / Tiket E-Nota
Route::get('/konfirmasi-pesanan', function () {
    return view('pages.konfirmasi-pesanan');
})->name('konfirmasi-pesanan');
Route::get('/sukses', function () {
    return redirect()->route('konfirmasi-pesanan');
});

// Stitch Direct Screen Resolvers
Route::get('/screens/{id}', function ($id) use ($screenMap) {
    if (isset($screenMap[$id])) {
        return view($screenMap[$id]);
    }
    return redirect()->route('home');
});

Route::get('/projects/{project}/screens/{id}', function ($project, $id) use ($screenMap) {
    if (isset($screenMap[$id])) {
        return view($screenMap[$id]);
    }
    return redirect()->route('home');
});
