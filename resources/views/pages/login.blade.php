@extends('layouts.app', ['title' => 'Login Kasir - Warung Jamsek'])

@section('content')
<main class="min-h-screen bg-surface flex items-center justify-center p-4 sm:p-6">
    <section class="w-full max-w-md overflow-hidden rounded-3xl bg-surface-container-lowest shadow-xl shadow-primary/10 border border-surface-container-high">
        <div class="bg-primary px-6 py-8 text-center text-on-primary sm:px-8">
            <a href="{{ url('/') }}" class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15 text-lg font-bold transition-transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white">
                WJ
            </a>
            <h1 class="text-2xl font-bold">Masuk sebagai Kasir</h1>
            <p class="mt-2 text-sm text-white/80">Akses POS Warung Jamsek untuk memproses pesanan.</p>
        </div>

        <form class="space-y-5 p-6 sm:p-8" method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-semibold text-on-surface" for="name">Nama kasir</label>
                <div class="relative">
                    <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-outline">person</span>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="username" required autofocus class="w-full rounded-xl border border-outline-variant bg-surface px-11 py-3 text-sm text-on-surface outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20" placeholder="Contoh: Rani">
                </div>
                @error('name')
                    <p class="mt-1.5 text-xs font-medium text-error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-on-surface" for="pin">PIN kasir</label>
                <div class="relative">
                    <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-outline">pin</span>
                    <input id="pin" name="pin" type="password" inputmode="numeric" pattern="[0-9]{4}" maxlength="4" autocomplete="current-password" required class="w-full rounded-xl border border-outline-variant bg-surface px-11 py-3 text-sm text-on-surface outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20" placeholder="4 digit PIN">
                </div>
                @error('pin')
                    <p class="mt-1.5 text-xs font-medium text-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-primary px-4 py-3 text-sm font-bold text-on-primary shadow-md transition hover:bg-primary-container focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 active:scale-[0.99]">
                <span>Masuk ke POS</span>
                <span class="material-symbols-outlined text-base">arrow_forward</span>
            </button>

            <p class="text-center text-xs text-on-surface-variant">Mode demo: gunakan nama apa pun dan PIN 4 digit.</p>
        </form>
    </section>
</main>
@endsection
