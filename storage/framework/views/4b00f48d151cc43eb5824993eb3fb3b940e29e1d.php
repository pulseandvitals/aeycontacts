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
            $('.card-deck').html('');
            $.each(response.data,function(key, item){
            var date = new Date(item.created_at).toLocaleDateString()
            $('.card-deck').append('<div class="card border-dark">\
                <img class="card-img-top" src="images/'+item.image+'" alt="Card image cap">\
                <div class="card-body">\
                <h5 class="card-title">'+ item.postcard_title  +'<span class="badge badge-secondary">WFH</span></h5>\
                <p class="card-text">'+item.postcard_caption+'</p>\
                <p class="card-text"><small class="text-muted" style="position:absolute; bottom:10px;left:10px;">'+date+'</small></p>\
                <button type="button" class="btn btn-primary btn-sm btn-collab" style="position: absolute; bottom:10px;right:10px;" id="applycollab" value="'+item.id+'"><i class="fa fa-plus"> Apply Collaboration</i></button>\
                </div> </div>');

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
        $('i').removeClass('fa fa-plus');
        $(this).addClass('btn btn-outline-success');
        $('i').addClass('fa fa-check');
        
    })
   

    $('#postcard_form').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('postcard_title',$('#postcard_title').val());
        formData.append('postcard_caption',$('#postcard_caption').val());
        console.log(formData);
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

<?php $__env->stopSection(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/modals/post-card-js.blade.php ENDPATH**/ ?>