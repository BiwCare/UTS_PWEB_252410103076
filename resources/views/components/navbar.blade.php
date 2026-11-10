@props(['username' => null, 'active' => ''])

<header class="border-b border-white/15 bg-[#05203c]/95 text-white backdrop-blur-md">
    <div class="mx-auto w-full max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4">
            <a class="inline-flex shrink-0 items-center gap-2.5" href="{{ route('login') }}"
                aria-label="TaniSewa, halaman masuk">
                <span
                    class="grid size-9 place-items-center rounded-full border border-white/40 text-xs font-extrabold text-blue-200">TS</span>
                <span class="text-lg font-extrabold">tani<span class="text-blue-200">sewa</span></span>
            </a>

            <div class="flex items-center gap-3 sm:gap-6">
                <span class="hidden text-xs text-white/75 sm:inline">Partner musim tanam Anda</span>
                @if ($username)
                    <a class="inline-flex items-center gap-2 text-sm font-semibold"
                        href="{{ route('profile', ['username' => $username]) }}">
                        <span
                            class="grid size-8 place-items-center rounded-full bg-blue-200 text-xs font-bold text-[#05203c]">{{ mb_strtoupper(mb_substr($username, 0, 1)) }}</span>
                        <span class="max-w-28 truncate">{{ $username }}</span>
                    </a>
                @else
                    <a class="rounded-sm bg-slate-100 px-5 py-2 text-sm font-bold text-[#05203c] transition hover:bg-white"
                        href="{{ route('login') }}">Masuk</a>
                @endif
            </div>
        </div>

        @if ($username)
            <nav class="mt-4 flex gap-2 overflow-x-auto" aria-label="Navigasi utama">
                <a class="whitespace-nowrap rounded-full border px-4 py-2 text-xs font-semibold transition {{ $active === 'dashboard' ? 'border-blue-600 bg-blue-600 text-white' : 'border-white/75 text-white hover:bg-white/10' }}"
                    href="{{ route('dashboard', ['username' => $username]) }}">Beranda</a>
                <a class="whitespace-nowrap rounded-full border px-4 py-2 text-xs font-semibold transition {{ $active === 'pengelolaan' ? 'border-blue-600 bg-blue-600 text-white' : 'border-white/75 text-white hover:bg-white/10' }}"
                    href="{{ route('pengelolaan', ['username' => $username]) }}">Katalog alat</a>
                <a class="whitespace-nowrap rounded-full border px-4 py-2 text-xs font-semibold transition {{ $active === 'profile' ? 'border-blue-600 bg-blue-600 text-white' : 'border-white/75 text-white hover:bg-white/10' }}"
                    href="{{ route('profile', ['username' => $username]) }}">Profil</a>
            </nav>
        @endif
    </div>
</header>
