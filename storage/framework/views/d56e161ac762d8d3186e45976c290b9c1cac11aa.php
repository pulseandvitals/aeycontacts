
<?php echo $__env->make('modals.sticky-note-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sticky Notes</h1>
        
        <div class="d-none d-sm-inline-block">
            <button class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#addnote"><i
            class="fas fa-plus fa-sm text-white-50"></i>Add Sticky Notes</button>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                    <h4></h4>
                </div>
                <div class="card-columns">
                    
                </div>
            </div>   
        </div>
    </div>
</div>
<!--Add Modal -->
<div class="modal fade" id="addnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Note Title</label>
            <input type="text" class="form-control" id="card_title">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Note Subtitle</label>
            <input type="text" class="form-control" id="card_subtitle">
            </div>
            <div class="form-group green-border-focus col-md-12">
            <label for="exampleFormControlTextarea5">Card Content</label>
            <textarea class="form-control" id="card_body" rows="3" placeholder="Input contents"></textarea>
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Link 1</label>
            <input type="text" class="form-control" id="card_link">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Link 2</label>
            <input type="text" class="form-control" id="card_another_link">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="add_note"class="btn btn-primary">Post Note</button>
      </div>
    </div>
  </div>
</div>
<!--delete note -->
<div class="modal" id="del_modal"tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Danger</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="del_id"> 
        <p>Are you sure you want to scratch this note?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit_delete" class="btn btn-danger">Yes, Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.0\htdocs\aeycontacts\resources\views/contact-form/sticky-notes.blade.php ENDPATH**/ ?>