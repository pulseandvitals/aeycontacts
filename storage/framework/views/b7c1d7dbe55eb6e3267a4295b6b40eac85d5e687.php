
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Messages</h1>

        <div class="d-none d-sm-inline-block">
            <button class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-angle-left fa-sm text-white-50"></i> back </button>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody class="<?php echo e($message->isSeen ? 'text-gray-500 user-select-none' : 'font-weight-bold text-dark user-select-none'); ?>">
                                <td>
                                    <a href="<?php echo e(route('user.show',$message->sender_id)); ?>" class="text-nowrap text-dark">
                                        <div class="">
                                            <?php echo e($message->user->name); ?>

                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        <?php echo e($message->message_subject ? $message->message_subject : 'No Subject'); ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        <?php echo e($message->message); ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        <?php echo e(date('F j, Y, g:i a', strtotime($message->created_at))); ?>

                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="<?php echo e(route('show.message',$message)); ?>" type="button"
                                        class="btn btn-info btn btn-sm"
                                    >
                                        <i class="fas fa-eye"></i> Read
                                    </a>
                                    <a href="<?php echo e(route('destroy.message',$message->id)); ?>"
                                        class="btn btn-danger btn btn-sm"
                                    >
                                        <i class="fas fa-trash fa-sm"></i> Delete
                                    </a>
                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php if($messages->count() == 0): ?>
                        <div class="text-center">
                            <span class="font-weight-bold"> No Message Found </span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/Message/show.blade.php ENDPATH**/ ?>