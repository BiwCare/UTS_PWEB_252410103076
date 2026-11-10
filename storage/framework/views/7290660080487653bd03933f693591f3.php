<?php $__env->startSection('title', 'Profil'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-container py-8 sm:px-6 sm:py-12 lg:px-8">
        <section class="border-b border-white/30 pb-7">
            <span class="section-label">RUANG PELANGGAN <span class="px-1 text-orange-300">/</span> PROFIL</span>
            <h1 class="mt-3 text-4xl font-extrabold leading-tight text-white sm:text-5xl">Kenali ruang<br><span
                    class="text-blue-200">tumbuh Anda.</span></h1>
            <p class="mt-3 text-sm text-white/75">Informasi akun demo TaniSewa.</p>
        </section>

        <section class="grid gap-8 py-8 lg:grid-cols-[.9fr_1.1fr] lg:gap-14">
            <div class="dark-surface flex min-h-72 flex-col justify-between p-6 shadow-xl backdrop-blur-sm sm:p-8">
                <div class="flex items-center justify-between">
                    <span class="section-label">AKUN TANISEWA</span>
                    <span
                        class="grid size-10 place-items-center rounded-full border border-white/40 text-xs font-bold text-blue-200">TS</span>
                </div>
                <div class="flex items-center gap-4">
                    <span
                        class="grid size-16 shrink-0 place-items-center rounded-full bg-blue-200 text-2xl font-extrabold text-[#05203c]"><?php echo e($initial); ?></span>
                    <div class="min-w-0">
                        <span class="text-[10px] font-bold text-white/70"><?php echo e($member['type']); ?></span>
                        <h2 class="mt-1 break-words text-xl font-bold sm:text-2xl"><?php echo e($username); ?></h2>
                    </div>
                </div>
                <div class="flex flex-wrap justify-between gap-3 border-t border-white/25 pt-4 text-[11px] text-white/75">
                    <span>Anggota sejak <?php echo e($member['joined']); ?></span>
                    <span><?php echo e($member['location']); ?></span>
                </div>
            </div>

            <div class="light-surface p-5 shadow-lg sm:p-8">
                <span class="text-[10px] font-bold tracking-widest text-blue-600">RINGKASAN</span>
                <h2 class="mt-2 text-xl font-bold">Aktivitas Anda</h2>
                <div class="mt-5 divide-y divide-slate-200 border-y border-slate-200">
                    <div class="grid min-h-14 grid-cols-[2rem_1fr_auto] items-center gap-3 text-xs">
                        <span class="font-bold text-blue-600">01</span><span class="text-slate-600">Nama
                            pengguna</span><strong class="max-w-40 break-words text-right"><?php echo e($username); ?></strong>
                    </div>
                    <div class="grid min-h-14 grid-cols-[2rem_1fr_auto] items-center gap-3 text-xs">
                        <span class="font-bold text-blue-600">02</span><span class="text-slate-600">Status
                            keanggotaan</span><strong class="text-right"><?php echo e($member['type']); ?></strong>
                    </div>
                    <div class="grid min-h-14 grid-cols-[2rem_1fr_auto] items-center gap-3 text-xs">
                        <span class="font-bold text-blue-600">03</span><span class="text-slate-600">Riwayat
                            sewa</span><strong class="text-right"><?php echo e($member['rentals']); ?> kali</strong>
                    </div>
                </div>
                <a class="mt-6 inline-flex min-h-11 items-center gap-3 border border-[#05203c] px-4 text-xs font-bold text-[#05203c] transition hover:bg-[#05203c] hover:text-white"
                    href="<?php echo e(route('pengelolaan', ['username' => $username])); ?>">
                    Buka katalog alat <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\UTS-Praktikum\resources\views/profile.blade.php ENDPATH**/ ?>