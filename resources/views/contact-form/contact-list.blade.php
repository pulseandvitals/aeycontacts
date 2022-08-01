@extends('layouts.admin')
@section('title','Contacts')
@section('content')
<header>
  <title>Contacts</title>
</header>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contacts</h1>

        <div class="d-none d-sm-inline-block">
            <button class="btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#addcontact"><i
            class="fas fa-plus fa-sm text-white-50"></i>Add</button>
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
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">City Address</th>
                                    <th scope="col">Dial Number</th>
                                    <th scope="col">Websites</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                              <tbody>

                            </tbody>
                            <div class="columns noData">

                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--delete modal-->
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
        <p>Are you sure you want to delete this contact?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit_delete" class="btn btn-danger">Yes, Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Add Modal -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="name">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">City Address</label>
            <input type="text" class="form-control" id="cityaddress">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Dial Number</label>
            <input type="number" class="form-control" id="dialnumber">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Websites</label>
            <input type="text" class="form-control" id="website">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="add_contact"class="btn btn-primary">Save Contact</button>
      </div>
    </div>
  </div>
</div>
<!-- edit modal --->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" id="edit_id">
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit_name">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">City Address</label>
            <input type="text" class="form-control" id="city_address">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Dial Number</label>
            <input type="number" class="form-control" id="dial_number">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Websites</label>
            <input type="text" class="form-control" id="edit_websites">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submit_edit" class="btn btn-success">Update Changes</button>
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
 //FETCH/SHOW
  $(document).ready(function() {
   fetchcontacts();
    function fetchcontacts(){
        $.ajax({
            type: 'GET',
            url: '/fetchcontacts',
            dataType: 'json',
            success: function(response){
                // console.log(response.contacts);
                $('tbody').html("");
                $.each(response.contacts, function(key, item){
                if(item != null) {
                    $('tbody').append('<tr>\
                    <th scope="row">'+item.name+'</th>\
                    <td>'+item.city_address+'</td>\
                    <td> <label class="badge badge-primary">'+item.dial_address+'</label></td>\
                    <td><a href="'+item.website+'">'+item.website+'</a></td>\
                    <td>\
                    <button type="button" class="btn btn-success btn-sm btn-update" id="edit" value="'+item.id+'"><i class="fa fa-edit"></i></button>\
                    <button type="button" class="btn btn-danger btn-sm btn-delete" id="delete" value="'+item.id+'"><i class="fa fa-trash"></i></button>\
                    </td>\
                    </tr>');
                }
                else {
                    $('.noData').append('<div class="text-center">\
                    <span class="text-muted"> Nothing Found. </span>\
                    </div>');
                    }
                });
            }
        });
    }




//UPDATE
  $(document).on('click','#edit', function(e){
    e.preventDefault();
    var edit_id = $(this).val();
    // alert(edit_id);
    $('#editmodal').modal('show');
    $.ajax({
       type: 'GET',
       url: '/edit_contact/'+edit_id,
       success: function(response){
        if(response.status == 400){
            console.log(response.error);
        }
        else {
            $('#edit_name').val(response.contact.name);
            $('#city_address').val(response.contact.city_address);
            $('#dial_number').val(response.contact.dial_address);
            $('#edit_websites').val(response.contact.website);
            $('#edit_id').val(edit_id);
        }
       }
    })
  })
  $(document).on('click','#submit_edit', function(e){
      e.preventDefault();
      var edit_id = $('#edit_id').val();
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
      var data = {
          'name' : $('#edit_name').val(),
          'city_address' : $('#city_address').val(),
          'dial_address' : $('#dial_number').val(),
          'websites' : $('#edit_websites').val()
      }
      $.ajax({
        type: 'PUT',
        url: '/update_contact/'+edit_id,
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
            else{
                $('#editmodal').modal('hide');
                fetchcontacts();
                $('.toastupdate').toast({animation:true,delay:2000});
                $('.toastupdate').toast('show');
                $('.toastupdate').html('');
                $('.toastupdate').append('<div class="toast-body">'+response.success+'</div>');
            }
        }
      })
  })


  //DELETE
  $(document).on('click','#delete',function (e){
    e.preventDefault();
    var del_id = $(this).val();
    $('#del_id').val(del_id);
    $('#del_modal').modal('show');
  })
  $(document).on('click','#submit_delete', function (e) {
   e.preventDefault();
    var del_id = $('#del_id').val();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        type: 'DELETE',
        url: '/delete_contact/'+del_id,
        success: function(response){
           console.log(response.success);
           fetchcontacts();
           $('#del_modal').modal('hide');
           $('.toastdelete').toast({animation:true,delay:2000});
           $('.toastdelete').toast('show');
           $('.toastdelete').html('');
           $('.toastdelete').append('<div class="toast-body">'+response.success+'</div>');
        }
    })
  })

//ADD
  $(document).on('click','#add_contact', function(e){
  e.preventDefault();
  var data = {
      'name': $('#name').val(),
      'cityaddress': $('#cityaddress').val(),
      'dialnumber': $('#dialnumber').val(),
      'website': $('#website').val()
  }
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        type: 'POST',
        url: '/addcontact',
        data: data,
        dataType:'json',
        success: function(response){
            if(response.error == 400){
                console.log(response.error);
                $('.toasterror').toast({animation:true,delay:2000});
                $('.toasterror').toast('show');
                $('.toasterror').html('');
                $('.toasterror').append(' <div class="toast-body">'+response.error+'</div>');

            }
            else {
                console.log(response.success);
                $('#addcontact').modal('hide');
                fetchcontacts();
                $('.toastadded').toast({animation:true,delay:2000});
                $('.toastadded').toast('show');
                $('.toastadded').html('');
                $('.toastadded').append('<div class="toast-body">'+response.success+'</div>');

            }
        }
    })
});
});
</script>
@endsection
