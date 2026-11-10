<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['username' => null, 'active' => '']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['username' => null, 'active' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<header class="border-b border-white/15 bg-[#05203c]/95 text-white backdrop-blur-md">
    <div class="mx-auto w-full max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4">
            <a class="inline-flex shrink-0 items-center gap-2.5" href="<?php echo e(route('login')); ?>"
                aria-label="TaniSewa, halaman masuk">
                <span
                    class="grid size-9 place-items-center rounded-full border border-white/40 text-xs font-extrabold text-blue-200">TS</span>
                <span class="text-lg font-extrabold">tani<span class="text-blue-200">sewa</span></span>
            </a>

            <div class="flex items-center gap-3 sm:gap-6">
                <span class="hidden text-xs text-white/75 sm:inline">Partner musim tanam Anda</span>
                <?php if($username): ?>
                    <a class="inline-flex items-center gap-2 text-sm font-semibold"
                        href="<?php echo e(route('profile', ['username' => $username])); ?>">
                        <span
                            class="grid size-8 place-items-center rounded-full bg-blue-200 text-xs font-bold text-[#05203c]"><?php echo e(mb_strtoupper(mb_substr($username, 0, 1))); ?></span>
                        <span class="max-w-28 truncate"><?php echo e($username); ?></span>
                    </a>
                <?php else: ?>
                    <a class="rounded-sm bg-slate-100 px-5 py-2 text-sm font-bold text-[#05203c] transition hover:bg-white"
                        href="<?php echo e(route('login')); ?>">Masuk</a>
                <?php endif; ?>
            </div>
        </div>

        <?php if($username): ?>
            <nav class="mt-4 flex gap-2 overflow-x-auto" aria-label="Navigasi utama">
                <a class="whitespace-nowrap rounded-full border px-4 py-2 text-xs font-semibold transition <?php echo e($active === 'dashboard' ? 'border-blue-600 bg-blue-600 text-white' : 'border-white/75 text-white hover:bg-white/10'); ?>"
                    href="<?php echo e(route('dashboard', ['username' => $username])); ?>">Beranda</a>
                <a class="whitespace-nowrap rounded-full border px-4 py-2 text-xs font-semibold transition <?php echo e($active === 'pengelolaan' ? 'border-blue-600 bg-blue-600 text-white' : 'border-white/75 text-white hover:bg-white/10'); ?>"
                    href="<?php echo e(route('pengelolaan', ['username' => $username])); ?>">Katalog alat</a>
                <a class="whitespace-nowrap rounded-full border px-4 py-2 text-xs font-semibold transition <?php echo e($active === 'profile' ? 'border-blue-600 bg-blue-600 text-white' : 'border-white/75 text-white hover:bg-white/10'); ?>"
                    href="<?php echo e(route('profile', ['username' => $username])); ?>">Profil</a>
            </nav>
        <?php endif; ?>
    </div>
</header>
<?php /**PATH C:\laragon\www\UTS-Praktikum\resources\views\components\navbar.blade.php ENDPATH**/ ?>