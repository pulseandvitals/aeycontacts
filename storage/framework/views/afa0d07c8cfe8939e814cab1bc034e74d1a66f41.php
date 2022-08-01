
<?php $__env->startSection('title','Job Offers'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Job Offers</h1>
        <?php if(Auth::user()->role == 'employer'): ?>
        <div class="d-none d-sm-inline-block">
            <a href="<?php echo e(route('job.offer.create')); ?>"
                class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Create
            </a>
        </div>
        <?php endif; ?>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                <div class="card-body">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('users.active-list')); ?>" method="post">
                    <input type="search" class="form-control" placeholder="Search" name="searchUser">
                </form>
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">Info</th>
                                    <th scope="col">Job description</th>
                                    <th>Applicants</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $job_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <td>
                                    <div>
                                        <div>
                                            <img src="<?php echo e($job_offer->getCompanyUser->current_avatar
                                                ? asset('/images/'.$job_offer->getCompanyUser->current_avatar)
                                                : asset('/images/default.jpg')); ?>"
                                                class="img-thumbnail rounded-0 border border-dark"
                                                alt="<?php echo e($job_offer->getCompanyUser->name); ?>"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                            </div>
                                                <a href="" class="font-weight-bold
                                                    <?php echo e(Auth::user()->id == $job_offer->user_id ? 'text-primary'
                                                    : 'text-gray-800'); ?>">
                                                    <?php echo e(Auth::user()->id == $job_offer->user_id ? 'You'
                                                    : $job_offer->company_name); ?>

                                                </a>
                                        </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        posted by: <?php echo e($job_offer->getCompanyUser->name); ?>

                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        <?php echo e($job_offer->getCompanyUser->profile->profession
                                        ? $job_offer->getCompanyUser->profile->profession
                                        : ''); ?>

                                    </div>
                                </td>
                                <td class="font-weight-bold">
                                    <div class="text-nowrap text-muted">
                                        <?php echo e($job_offer->work_base == 'home_based' ? 'Home Based' : 'Office Based'); ?>

                                    </div>
                                    <div class="text-nowrap text-muted">
                                        <?php echo e($job_offer->field_work); ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        <p>
                                            <?php if(strlen($job_offer->job_description) <= 20): ?>
                                            <?php echo e($job_offer->job_description); ?>

                                            <?php else: ?>
                                            <a href="<?php echo e(route('job.offer.show',$job_offer->id)); ?>" class="text-gray-500">Read More..</a>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        <?php echo e($job_offer->applicants_limit); ?> / <?php echo e($job_offer->applicants_count); ?>

                                    </div>
                                </td>
                                <td class="text-right">
                                    <?php if(Auth::user()->id != $job_offer->user_id): ?>
                                    <a href="<?php echo e(route('job.offer.show',$job_offer->id)); ?>" type="button"
                                        class="btn btn-info btn-sm rounded-0"
                                    >
                                        <i class="fas fa-eye text-gray-300"></i> view
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php if($job_offers->count() == 0): ?>
                            <div class="text-center">
                                <span class="font-weight-bold"> No Job offers Found </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php echo e($job_offers->render("pagination::bootstrap-4")); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/Job-offers/index.blade.php ENDPATH**/ ?>