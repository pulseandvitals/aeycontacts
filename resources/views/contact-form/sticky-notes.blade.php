@extends('layouts.admin')
@section('title','Notes')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sticky Notes</h1>

        <div class="d-none d-sm-inline-block">
            <button class="btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#addnote"><i
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
                <div class="card-columns emptyList">

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
@endsection

@section('scripts')
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
@endsection
