
<?php $__env->startSection('content'); ?>
<header>
  <title>Add Job Offer</title>
</header>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Job Offer</h1>
        <div class="d-none d-sm-inline-block">
            <a href=""
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
                        <div class="card-body col-md-12">
                            <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('job.offer.submit.create')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Work Set-up</label>
                                    <select name="work_base" class="form-control">
                                        <option value="home_based">Home Based</option>
                                        <option value="office_based">Office Based</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Work field</label>
                                    <input type="text" class="form-control" name="field_work"
                                        placeholder="Example: web developer"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Job Description</label>
                                    <textarea type="text" class="form-control" name="job_description">
                                    </textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Qualifications</label>
                                    <input type="text" class="form-control" name="qualifications">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Application Limit</label>
                                    <input type="number" class="form-control" name="application_limit">
                                </div>
                                <div class="col-md-12 mt-2 text-right">
                                    <button type="submit" class="btn btn-dark">
                                        <i class="fas fa-plus text-success"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/Job-offers/create.blade.php ENDPATH**/ ?>