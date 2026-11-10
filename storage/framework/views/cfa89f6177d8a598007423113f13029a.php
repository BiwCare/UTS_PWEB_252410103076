<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-container sm:px-6 lg:px-8">
        <section class="flex min-h-[calc(100vh-7rem)] items-center py-10 sm:py-14">
            <div class="w-full">
                <span class="section-label sm:text-xs">
                    SEWA ALAT PERTANIAN <span class="px-1 text-orange-300">/</span>
                    
                </span>
                <h1 class="mt-4 max-w-4xl text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">Musim
                    tanam dimulai<br>dari alat yang tepat.</h1>
                <form class="search-panel mt-8 max-w-5xl p-4 sm:mt-10 sm:p-6" action="<?php echo e(route('pengelolaan')); ?>"
                    method="GET">
                    <input type="hidden" name="username" value="<?php echo e($username); ?>">
                    <label class="mb-3 block text-sm font-bold text-white" for="equipment-search">Temukan kebutuhan lahan,
                        <?php echo e($username); ?></label>
                    <div class="grid items-stretch gap-1 sm:grid-cols-[minmax(0,1.5fr)_minmax(190px,1fr)_auto]">
                        <div
                            class="flex min-h-16 flex-col justify-center gap-1 rounded-sm bg-white px-3 py-2 sm:rounded-r-none">
                            <label class="text-[11px] font-bold text-slate-700" for="equipment-search">Nama alat atau
                                keperluan</label>
                            <input
                                class="w-full border-0 bg-transparent text-sm text-slate-900 outline-none placeholder:text-slate-400"
                                id="equipment-search" name="q" type="search" value="<?php echo e(request('q')); ?>"
                                placeholder="Contoh: traktor, irigasi">
                        </div>
                        <div class="flex min-h-16 flex-col justify-center gap-1 rounded-sm bg-white px-3 py-2">
                            <label class="text-[11px] font-bold text-slate-700" for="equipment-category">Kategori
                                pekerjaan</label>
                            <select class="w-full border-0 bg-transparent text-sm text-slate-900 outline-none"
                                id="equipment-category" name="category">
                                <option value="">Semua kategori</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category); ?>" <?php if(request('category') === $category): echo 'selected'; endif; ?>><?php echo e($category); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button
                            class="inline-flex min-h-14 items-center justify-center gap-3 rounded-sm bg-blue-600 px-6 text-sm font-bold text-white transition hover:bg-blue-700"
                            type="submit">Cari alat <span aria-hidden="true">&rarr;</span></button>
                    </div>
                    <div
                        class="mt-3 flex flex-col justify-between gap-2 text-[11px] text-white sm:flex-row sm:items-center">
                        <label class="inline-flex cursor-pointer items-center gap-2"><input class="size-4 accent-blue-500"
                                type="checkbox" name="available" value="1" <?php if(request()->boolean('available')): echo 'checked'; endif; ?>>
                            Tampilkan alat yang tersedia saja</label>
                        <span class="text-white/75"><?php echo e($availableUnits); ?> unit tersedia saat ini</span>
                    </div>
                </form>
            </div>
        </section>

        <nav class="flex flex-wrap items-center gap-2 py-4 text-xs text-white/90" aria-label="Breadcrumb">
            <a class="underline underline-offset-2" href="<?php echo e(route('dashboard', ['username' => $username])); ?>">Beranda</a>
            <span class="text-orange-300" aria-hidden="true">›</span>
            <a class="underline underline-offset-2" href="<?php echo e(route('pengelolaan', ['username' => $username])); ?>">Sewa
                alat</a>
            <span class="text-orange-300" aria-hidden="true">›</span>
            <span class="text-white/70"><?php echo e($location); ?></span>
        </nav>

        <section class="grid gap-3 pb-10 sm:grid-cols-3 sm:gap-4" aria-label="Keunggulan TaniSewa">
            <article class="light-surface min-h-36 p-5 shadow-sm">
                <span class="mb-3 block text-xs font-extrabold text-blue-600">01</span>
                <h2 class="text-base font-bold">Pilihan alat lengkap</h2>
                <p class="mt-2 text-xs leading-relaxed text-slate-600"><?php echo e($equipmentTypes); ?> jenis peralatan untuk olah
                    lahan, tanam, irigasi, hingga panen.</p>
            </article>
            <article class="light-surface min-h-36 p-5 shadow-sm">
                <span class="mb-3 block text-xs font-extrabold text-blue-600">02</span>
                <h2 class="text-base font-bold">Atur jadwal dengan mudah</h2>
                <p class="mt-2 text-xs leading-relaxed text-slate-600">Pilih alat sesuai kebutuhan dan rencanakan waktu sewa
                    sebelum musim dimulai.</p>
            </article>
            <article class="light-surface min-h-36 p-5 shadow-sm">
                <span class="mb-3 block text-xs font-extrabold text-blue-600">03</span>
                <h2 class="text-base font-bold">Harga jelas di awal</h2>
                <p class="mt-2 text-xs leading-relaxed text-slate-600">Bandingkan tarif harian setiap alat sebelum
                    menentukan pilihan.</p>
            </article>
        </section>

        <section class="pb-14">
            <div class="mb-5 flex items-end justify-between gap-4">
                <div>
                    <span class="section-label">PILIHAN MUSIM INI</span>
                    <h2 class="mt-2 text-xl font-bold text-white">Alat yang banyak dicari</h2>
                </div>
                <a class="inline-flex shrink-0 items-center gap-2 text-xs font-bold text-white underline underline-offset-4"
                    href="<?php echo e(route('pengelolaan', ['username' => $username])); ?>">Lihat semua <span
                        aria-hidden="true">&rarr;</span></a>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="overflow-hidden border border-white/20 bg-white/95 text-slate-900 shadow-lg">
                        <div class="relative h-44 bg-slate-200">
                            <img class="h-full w-full object-cover" src="<?php echo e($item['image']); ?>"
                                alt="<?php echo e($item['name']); ?> di area pertanian" loading="lazy">
                            <span
                                class="absolute bottom-3 left-3 bg-blue-600 px-2.5 py-1 text-[10px] font-bold text-white"><?php echo e($item['category']); ?></span>
                        </div>
                        <div class="p-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="text-sm font-bold"><?php echo e($item['name']); ?></h3>
                                <span
                                    class="mt-1 size-2 shrink-0 rounded-full <?php echo e($item['status'] === 'Tersedia' ? 'bg-emerald-500' : 'bg-orange-500'); ?>"
                                    aria-label="<?php echo e($item['status']); ?>"></span>
                            </div>
                            <p class="mt-2 min-h-8 text-[11px] leading-relaxed text-slate-600"><?php echo e($item['detail']); ?></p>
                            <div class="mt-3 flex items-center justify-between border-t border-slate-200 pt-3">
                                <strong class="text-sm text-[#05203c]">Rp<?php echo e(number_format($item['rate'], 0, ',', '.')); ?>

                                    <span class="text-[10px] font-normal text-slate-500">/ hari</span></strong>
                                <span class="text-[10px] text-slate-500"><?php echo e($item['status']); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\UTS-Praktikum\resources\views\dashboard.blade.php ENDPATH**/ ?>