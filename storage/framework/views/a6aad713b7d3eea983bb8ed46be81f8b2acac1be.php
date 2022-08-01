
<?php $__env->startSection('title','Company Details'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1 mb-0 text-gray-800">Company Details - <?php echo e($company_profile->company_name); ?></div>
        <div class="d-none d-sm-inline-block">
            <a href="<?php echo e(route('job.offers.list')); ?>"
                class="btn btn-sm btn-dark shadow-sm rounded-0">
                <i class="fas fa-angle-left text-white-50"></i> Back
            </a>
            <a href="<?php echo e(route('profile.message.view',$company_profile->getCompanyUser->id)); ?>"
                class="btn btn-sm btn-dark shadow-sm rounded-0">
                <i class="fas fa-envelope text-white-50"></i> Message
            </a>
            <button class="btn btn-sm shadow-sm btn btn-success rounded-0"
            >
                <i class="far fa-paper-plane text-white-50"></i> Send my Profile
            </button>
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
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <img src="<?php echo e($company_profile->getCompanyUser->current_avatar
                                                ? asset('/images/'.$company_profile->getCompanyUser->current_avatar)
                                                : asset('/images/default.jpg')); ?>"
                                                class="img-thumbnail rounded-0 border border-dark"
                                                alt="<?php echo e($company_profile->getCompanyUser->name); ?>"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Company Name
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            <?php echo e($company_profile->company_name); ?>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Posted by
                                        </div>
                                        <div>
                                            <div class="font-weight-bold text-muted">
                                                <?php echo e($company_profile->getCompanyUser->name); ?>

                                            </div>
                                            <div class="text-nowrap text-muted text-xs">
                                                <?php echo e($company_profile->getCompanyUser->email); ?>

                                            </div>
                                            <div class="text-xs font-weight-bold rounded-0
                                                <?php echo e($company_profile->getCompanyUser->role == 'jobseeker' ? 'badge badge-success' :
                                                ( $company_profile->getCompanyUser->role == 'employer' ? 'badge badge-primary'  :  'text-secondary' )); ?>">

                                                <?php echo e($company_profile->getCompanyUser->role == 'jobseeker' ? 'Job Seeker' :
                                                ( $company_profile->getCompanyUser->role == 'employer' ? 'Employer'  :  'Guest' )); ?>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold border-0">
                                            Status
                                        </div>
                                        <div class="font-weight-bold text-white rounded-0
                                            <?php echo e($company_profile->isOpen ? 'badge badge-success' : 'badge badge-secondary'); ?>">
                                            <?php echo e($company_profile->isOpen ? 'Open for Application' : 'Closed'); ?>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Work Field / Work Based
                                        </div>
                                        <div class="font-weight-bold">
                                            <?php echo e($company_profile->field_work); ?>

                                        </div>
                                        <div class="font-weight-bold">
                                            <?php echo e($company_profile->work_base == 'home_based' ? 'Home Based'
                                                : 'Office Based'); ?>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Job Description
                                        </div>
                                        <div class="font-weight-bold">
                                            <p> <?php echo e($company_profile->job_description); ?> </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Qualifications
                                        </div>
                                        <div class="font-weight-bold">
                                            <p> <?php echo e($company_profile->qualification); ?> </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Applicants
                                        </div>
                                        <div class="font-weight-bold
                                            <?php echo e(strlen($company_profile->applicants_count) <=
                                            strlen($company_profile->applicants_limit)
                                            ? 'text text-success' : 'text text-danger'); ?>">
                                            <?php echo e($company_profile->applicants_limit); ?>

                                            /
                                            <?php echo e($company_profile->applicants_count); ?>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/Job-offers/show.blade.php ENDPATH**/ ?>