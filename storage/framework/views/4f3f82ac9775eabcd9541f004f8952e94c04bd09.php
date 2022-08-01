<?php if(session()->has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(session()->get('error')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\aeycontacts\resources\views/Component/status_error.blade.php ENDPATH**/ ?>