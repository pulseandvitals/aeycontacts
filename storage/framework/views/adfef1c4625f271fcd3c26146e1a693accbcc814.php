
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post Feed</h1>

        <div class="d-none d-sm-inline-block">
          <?php if(Auth::user()->role == 'employer'): ?>
            <button class="btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#addpostcard">
              <i class="fas fa-plus fa-sm text-white-50"></i> Add
            </button>
          <?php endif; ?>
        </div>
    </div>
    <!-- Content Row -->

    <div class="card-deck feedFetch"
    style="grid-gap: .5rem;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    display: grid;
    margin-left: auto;
    margin-top: 10px;">

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
<div
    class="toast bg-success text-white toastdelete"
    style="position: fixed; bottom: 30px; right: 10px;">
</div>
<div
    class="toast bg-success text-white toastadded"
    style="position: fixed; bottom: 30px; right: 10px;">

</div>
<div
    class="toast bg-danger text-white toasterror"
    style="position: fixed; bottom: 30px; right: 10px;">
</div>
<div
    class="toast bg-success text-white toastupdate"
    style="position: fixed; bottom: 30px; right: 10px;">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>

$(document).ready(function(){
    fetchpostcard();
    function fetchpostcard(){
        $.ajax({
            type: 'GET',
            url: 'fetch-postcard',
            dataType: 'json',
            success: function(response) {
            console.log(response);
            $('.feedFetch').html('');
            $.each(response.data,function(key, item){
            var date = new Date(item.created_at).toLocaleDateString()
              if(item) {
            $('.feedFetch').append('<div class="card border-dark">\
                <img class="card-img-top" src="images/'+ item.image +'" alt="Card image cap">\
                <div class="card-body">\
                  <h5 class="card-title">'+ item.postcard_title +'</h5>\
                    <p class="card-text text-sm">'+ item.postcard_caption +'</p>\
                    <p class="card-text"><small class="text-muted" style="position:absolute; bottom:10px;left:10px;">'+ date+'</small></p>\
                  <button type="button" class="btn btn-primary btn-sm btn-collab" style="position: absolute; bottom:10px;right:10px;" id="applycollab" value="'+item.id+'"><i class="fa fa-plus tag"> Apply Collaboration</i></button>\
                 </div>\
                </div>');
              }
                else {
                  $('.feedFetch').append('<span class="text-center text-muted"> No post found. </span>')
              }
            })
            }
        })

    }
    $(document).on('click','#applycollab',function (e){
    e.preventDefault();
    var collab_id = $(this).val();
    $('#collab_id').val(collab_id);
    $('#modalcollab').modal('show');
  })

    $(document).on('click','#applycollab', function(e){
        e.preventDefault();
        var collab_id = $(this).val();
        $(this).removeClass('btn btn-primary');
        $('.tag').removeClass('fa fa-plus');
        $(this).addClass('btn btn-outline-success');
        $('.tag').addClass('fa fa-check');

    })


    $('#postcard_form').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('postcard_title',$('#postcard_title').val());
        formData.append('postcard_caption',$('#postcard_caption').val());
        $.ajax({
            type:'POST',
            url:'/add-postcard',
            data: formData,
            cache: false,
            contentType:false,
            processData:false,
            success: function(response){
                if(response.status == 400){
                    console.log(response.error)
                    $('.toasterror').toast({animation:true,delay:2000});
                    $('.toasterror').toast('show');
                    $('.toasterror').html('');
                    $('.toasterror').append('<div class="toast-body">'+response.error+'</div>');
                }
                else{
                    console.log(response.success)
                    $('#addpostcard').modal('hide');
                    $('.toastadded').toast({animation:true,delay:2000});
                    $('.toastadded').toast('show');
                    $('.toastadded').html('');
                    $('.toastadded').append('<div class="toast-body">'+response.success+'</div>');
                    fetchpostcard();
                }

            }
        })
    })
 })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/cards-feed/post-cards.blade.php ENDPATH**/ ?>