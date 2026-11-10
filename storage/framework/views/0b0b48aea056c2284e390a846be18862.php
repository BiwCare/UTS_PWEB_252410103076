<?php $__env->startSection('title', 'Masuk'); ?>

<?php $__env->startSection('content'); ?>
    <section
        class="mx-auto grid min-h-[calc(100vh-6rem)] w-full max-w-7xl items-center gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.15fr_.85fr] lg:px-8">
        <div class="max-w-2xl">
            <span class="text-xs font-bold tracking-wide text-blue-100">TANI SEWA SEWA TANI</span>
            <h1 class="mt-5 text-5xl font-extrabold leading-tight text-white sm:text-6xl">Petani Jember<br>jadi maju.</h1>
            <p class="mt-5 max-w-lg text-base leading-relaxed text-white/85 sm:text-lg">Temukan alat yang dibutuhkan, tepat
                saat lahan memanggil.</p>
            <div class="mt-8 flex items-center gap-3 text-sm text-white/80">
                <span class="h-px w-9 bg-blue-200"></span>
            </div>
        </div>

        <div class="dark-surface w-full max-w-md justify-self-end p-6 shadow-2xl backdrop-blur-sm sm:p-9">
            <span class="text-[10px] font-bold tracking-wide text-blue-200">SELAMAT DATANG DI TANISEWA</span>
            <h2 class="mt-3 text-2xl font-bold text-white sm:text-3xl">Mulai dari nama Anda.</h2>
            <p class="mt-2 text-sm text-white/70">Masuk ke ruang sewa alat pertanian.</p>

            <form class="mt-8 grid gap-3" action="<?php echo e(route('dashboard')); ?>" method="GET">
                <label class="text-xs font-bold text-white" for="username">Nama pengguna</label>
                <input
                    class="min-h-12 w-full border border-white/30 bg-white px-4 text-sm text-slate-900 outline-none placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30"
                    id="username" name="username" type="text" value="<?php echo e(old('username')); ?>"
                    placeholder="Masukkan nama anda" autocomplete="name" maxlength="40" required autofocus>
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-xs text-rose-300"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <button
                    class="mt-2 inline-flex min-h-12 items-center justify-center gap-3 bg-blue-600 px-5 text-sm font-bold text-white transition hover:bg-blue-700"
                    type="submit">
                    Masuk ke dashboard <span aria-hidden="true">&rarr;</span>
                </button>
            </form>

            <div class="mt-7 flex items-center gap-2 text-[11px] text-white/65">
                <span class="size-2 rounded-full bg-orange-300"></span>
                <span>Simulasi login untuk demo penyewaan alat.</span>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\UTS-Praktikum\resources\views/login.blade.php ENDPATH**/ ?>