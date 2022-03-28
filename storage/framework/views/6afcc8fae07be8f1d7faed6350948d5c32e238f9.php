
<?php echo $__env->make('modals.post-card-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
<style>
  .card-deck{
    margin-top: 10px;
    margin-left: auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    grid-gap: .5rem;
}
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post Feed</h1>
        
        <div class="d-none d-sm-inline-block">
            <button class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#addpostcard"><i
            class="fas fa-plus fa-sm text-white-50"></i>Add Postcard</button>
        </div>
    </div>
    <!-- Content Row -->
   
    <div class="card-deck">
  <!---fetchdata-->
  <div class="spinner-border text-secondary" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>

<!--add postcard--->
<div class="modal fade" id="addpostcard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New PostCard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method ="post" id="postcard_form" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Add title</label>
            <input type="text" class="form-control" id="postcard_title">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Insert Image</label>
            <input id="uploadImage" class="form-control"type="file" accept="image/*" name="image" />
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Add Caption</label>
            <input type="text" class="form-control" id="postcard_caption">
            </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Post to Post Feed</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!---toaster notification--->
<div class="toast bg-success text-white toastdelete" style="position: fixed; bottom: 30px; right: 10px;">

</div>
<div class="toast bg-success text-white toastadded" style="position: fixed; bottom: 30px; right: 10px;">
  
</div>
<div class="toast bg-danger text-white toasterror" style="position: fixed; bottom: 30px; right: 10px;">
  
</div>
<div class="toast bg-success text-white toastupdate" style="position: fixed; bottom: 30px; right: 10px;">
  
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.0\htdocs\aeycontacts\resources\views/cards-feed/post-cards.blade.php ENDPATH**/ ?>