@extends('layouts.app')

@section('title', 'Katalog Alat')

@section('content')
    <div class="page-container py-8 sm:px-6 sm:py-12 lg:px-8">
        <section class="flex items-end justify-between gap-5 border-b border-white/30 pb-7">
            <div>
                <span class="section-label">PENGELOLAAN SEWA <span class="px-1 text-orange-300">/</span>
                    {{ $username }}</span>
                <h1 class="mt-3 text-4xl font-extrabold leading-tight text-white sm:text-5xl">Peralatan untuk<br><span
                        class="text-blue-200">setiap tahap tanam.</span></h1>
                <p class="mt-3 text-sm text-white/75">Periksa pilihan alat dan ketersediaan sebelum menentukan jadwal.</p>
            </div>
            <span class="hidden shrink-0 text-xs font-bold text-white/80 sm:block">{{ count($equipment) }} alat</span>
        </section>

        <section class="my-6 grid grid-cols-3 bg-[#05203c]/95 text-white" aria-label="Ringkasan katalog">
            <div
                class="flex flex-col gap-1 border-r border-white/20 px-3 py-4 sm:flex-row sm:items-baseline sm:gap-3 sm:px-6">
                <strong class="text-2xl font-extrabold text-blue-200">{{ $equipmentTypes }}</strong><span
                    class="text-[10px] text-white/75 sm:text-xs">jenis peralatan</span>
            </div>
            <div
                class="flex flex-col gap-1 border-r border-white/20 px-3 py-4 sm:flex-row sm:items-baseline sm:gap-3 sm:px-6">
                <strong class="text-2xl font-extrabold text-blue-200">{{ $availableUnits }}</strong><span
                    class="text-[10px] text-white/75 sm:text-xs">unit tersedia</span>
            </div>
            <div class="flex flex-col gap-1 px-3 py-4 sm:flex-row sm:items-baseline sm:gap-3 sm:px-6">
                <strong class="text-2xl font-extrabold text-blue-200">{{ $categories }}</strong><span
                    class="text-[10px] text-white/75 sm:text-xs">kategori kerja</span>
            </div>
        </section>

        <section class="pb-14">
            <div class="mb-4 flex items-end justify-between gap-4 text-white">
                <div>
                    <span class="text-[10px] font-bold tracking-widest text-blue-100">DAFTAR PERALATAN</span>
                    <h2 class="mt-2 text-xl font-bold">Semua alat</h2>
                </div>
                <span class="text-xs text-white/75">{{ count($equipment) }} alat terdaftar</span>
            </div>

            <div class="light-surface overflow-hidden shadow-lg">
                @forelse ($equipment as $item)
                    <article
                        class="grid items-center gap-3 border-b border-slate-200 p-3 last:border-b-0 sm:grid-cols-[5.5rem_minmax(0,1fr)_4.5rem_9rem_8rem] sm:gap-5 sm:p-4">
                        <img class="h-20 w-full object-cover sm:w-[5.5rem]" src="{{ $item['image'] }}"
                            alt="{{ $item['name'] }}" loading="lazy">
                        <div class="min-w-0">
                            <span class="text-[10px] font-bold text-blue-600">{{ $item['category'] }}</span>
                            <h3 class="mt-1 text-sm font-bold">{{ $item['name'] }}</h3>
                            <p class="mt-1 text-[11px] text-slate-600">{{ $item['detail'] }}</p>
                        </div>
                        <div class="hidden sm:block">
                            <span class="block text-[9px] font-bold text-slate-500">UNIT</span>
                            <strong class="mt-1 block text-lg">{{ $item['units'] }}</strong>
                        </div>
                        <div class="hidden sm:block">
                            <span class="block text-[9px] font-bold text-slate-500">TARIF / HARI</span>
                            <strong class="mt-1 block text-xs">Rp{{ number_format($item['rate'], 0, ',', '.') }}</strong>
                        </div>
                        <div
                            class="col-start-2 row-start-2 flex items-center gap-2 text-[10px] font-semibold sm:col-auto sm:row-auto">
                            <span
                                class="size-2 rounded-full {{ $item['status'] === 'Tersedia' ? 'bg-emerald-500' : 'bg-orange-500' }}"></span>
                            {{ $item['status'] }} <span class="text-slate-500 sm:hidden">· {{ $item['units'] }} unit ·
                                Rp{{ number_format($item['rate'], 0, ',', '.') }}</span>
                        </div>
                    </article>
                @empty
                    <div class="px-5 py-12 text-center">
                        <h3 class="text-base font-bold">Alat tidak ditemukan</h3>
                        <p class="mt-2 text-sm text-slate-600">Coba kata kunci atau kategori lain.</p>
                    </div>
                @endforelse
            </div>
            <p class="mt-4 text-[11px] text-white/75">Tarif ditampilkan per unit per hari. Ketersediaan dapat berubah
                mengikuti jadwal musim.</p>
        </section>
        <a class="inline-flex items-center gap-2 text-xs font-bold text-white underline underline-offset-4"
            href="{{ route('dashboard', ['username' => $username]) }}">&larr; Kembali ke beranda</a>
    </div>
@endsection
