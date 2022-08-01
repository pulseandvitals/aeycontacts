<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function(){
fetchnote();
function fetchnote(){
    $.ajax({
        type: 'GET',
        url: '/fetchnote',
        dataType: 'json',
        success: function(response){
            // console.log(response.data)
            $('.card-columns').html('');
            $.each(response.data,function(key, item){
              $('.card-columns').append('\
                        <div class="card-body">\
                            <div class="table-responsive">\
                                <div class="card shadow mb-4 bg-dark text-white">\
                                    <div class="card-body">\
                                        <h5 class="card-title text-success">'+item.card_title+'</h5>\
                                        <h6 class="card-subtitle mb-2 text-muted">'+item.card_subtitle+'</h6>\
                                        <p class="card-text">'+item.card_body+'</p>\
                                            <a href="'+item.card_link+'" class="card-link">Card link</a>\
                                        <a href="'+item.card_another_link+'" class="card-link">Link 2</a>\
                                        <button type="button" class="btn btn-danger btn-sm btn-delete" style="position: absolute; bottom:10px;right:10px;" id="delete" value="'+item.id+'"><i class="fa fa-trash"></i></button>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>');
                    })
                }
            })
        }
$(document).on('click','#delete',function(e){
e.preventDefault();
var del_id = $(this).val();
$('#del_id').val(del_id);
$('#del_modal').modal('show');
})

$(document).on('click','#submit_delete', function(e){
e.preventDefault();
var del_id = $('#del_id').val();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        type: 'DELETE',
        url: '/delete-note/'+del_id,
        success: function(response){
            console.log(response);
            fetchnote();
            $('#del_modal').modal('hide');
            $('.toastdelete').toast({animation: true,delay: 2000});
            $('.toastdelete').toast('show');
            $('.toastdelete').html('');
            $('.toastdelete').append('<div class="toast-body">'+response.success+'</div>');
        }
    })

})

$(document).on('click','#add_note', function(e){
    e.preventDefault();
    var data = {
        'card_title' : $('#card_title').val(),
        'card_subtitle' : $('#card_subtitle').val(),
        'card_body' : $('#card_body').val(),
        'card_link' : $('#card_link').val(),
        'card_another_link' : $('#card_another_link').val(),
    }
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({

        type: 'POST',
        url: '/insert-note',
        data: data,
        dataType: 'json',
        success: function(response){
            if(response.status == 400){
                console.log(response.error);
                $('.toasterror').toast({animation:true,delay:2000});
                $('.toasterror').toast('show');
                $('.toasterror').html('');
                $('.toasterror').append(' <div class="toast-body">'+response.error+'</div>');

            }
            else {
                console.log(response.success);
                fetchnote();
                $('#addnote').modal('hide');
                $('.toastadded').toast({animation:true,delay:2000});
                $('.toastadded').toast('show');
                $('.toastadded').html('');
                $('.toastadded').append(' <div class="toast-body">'+response.success+'</div>');
            }
        }
    })
})
})
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\laragon\www\aeycontacts\resources\views/modals/sticky-note-js.blade.php ENDPATH**/ ?>