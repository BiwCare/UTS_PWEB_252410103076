<?php if(session('status')): ?>
    <div class="mx-auto mt-4 w-[calc(100%-2rem)] max-w-7xl border-l-4 border-orange-400 bg-white/95 px-4 py-3 text-sm text-slate-900 shadow"
        role="status"><?php echo e(session('status')); ?></div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\UTS-Praktikum\resources\views/components/flash-message.blade.php ENDPATH**/ ?>