
<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1 mb-0 text-gray-800">Message User - <?php echo e($receiver->name); ?></div>
        <div class="d-none d-sm-inline-block">
            <a href="<?php echo e(route('profile.view',$receiver->id)); ?>"
                class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-angle-left text-white-50"></i> Back
            </a>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                    <div class="card-body">
                        <?php if(session()->has('message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session()->get('message')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session()->has('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session()->get('error')); ?>

                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?php echo e(route('message.sent.store',$receiver->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6">
                                <label for="receiver" class="form-label">Receiver</label>
                                <input class="form-control font-weight-bold"
                                    type="text"
                                    value="<?php echo e($receiver->name); ?>"
                                    name="receiver"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Ex: Subject">
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control"
                                    rows="4"
                                    name="message"
                                >
                                </textarea>
                            </div>
                            <div class="col-md-12 mt-2 text-right">
                                <button type="submit" class="btn btn-dark">
                                    <i class="far fa-paper-plane"></i> Submit Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/Profile/message.blade.php ENDPATH**/ ?>