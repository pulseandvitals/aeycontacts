
<?php $__env->startSection('title','Job Seekers'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Job Seekers</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                <div class="card-body">
                <form action="<?php echo e(route('users.active-list')); ?>" method="post">
                    <input type="search" class="form-control" placeholder="Search" name="searchUser">
                </form>
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact/Email</th>
                                    <th scope="col">City/Country</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <td>
                                    <div>
                                        <div>
                                            <img src="<?php echo e($user->current_avatar
                                                ? asset('/images/'.$user->current_avatar)
                                                : asset('/images/default.jpg')); ?>"
                                                class="img-thumbnail rounded-0 border border-dark"
                                                alt="<?php echo e($user->name); ?>"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                        </div>
                                        <a href="<?php echo e(route('user.show',$user->id )); ?>" class="font-weight-bold
                                            <?php echo e(Auth::user()->id == $user->id ? 'text-primary' : 'text-gray-800'); ?>">
                                            <?php echo e(Auth::user()->id == $user->id ? 'You' : $user->name); ?>

                                        </a>
                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        <?php echo e($user->profile->profession); ?> -
                                    <?php if($user->profile->years_of_exp): ?>
                                        <?php echo e($user->profile->years_of_exp); ?>

                                    <?php endif; ?>
                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        Active since:
                                        <?php echo e(date('F j, Y, g:i a', strtotime($user->last_login))); ?>

                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="text-secondary">
                                        <?php echo e($user->email); ?>

                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        <?php echo e($user->profile->contact_no); ?>

                                    </div>
                                </td>
                                <td class="font-weight-bold text-gray-800">
                                    <?php echo e($user->profile->city_address
                                    ? $user->profile->city_address
                                    : 'No info.'); ?>

                                </td>
                                <td class="fw-bold text-left">
                                    <label class="rounded-0 <?php echo e($user->status ? 'badge badge-success' : 'badge badge-danger'); ?>"
                                    >
                                    <?php echo e($user->status ? 'Active' : 'Inactive'); ?>

                                </td>
                                <td class="text-right">
                                    <?php if(Auth::user()->id != $user->id): ?>
                                    <a href="<?php echo e(route('user.show',$user->id)); ?>" type="button"
                                        class="btn btn-info btn-sm rounded-0"
                                    >
                                        <i class="fas fa-eye text-gray-300"></i> view
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php if($users->count() == 0): ?>
                            <div class="text-center">
                                <span class="font-weight-bold"> No Job seekers Found </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php echo e($users->render("pagination::bootstrap-4")); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/Users/index.blade.php ENDPATH**/ ?>