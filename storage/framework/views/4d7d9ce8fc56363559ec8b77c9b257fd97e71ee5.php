<?php if(session()->has('message')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\aeycontacts\resources\views/Component/status_success.blade.php ENDPATH**/ ?>