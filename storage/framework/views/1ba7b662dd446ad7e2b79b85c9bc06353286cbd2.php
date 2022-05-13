<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/modals/contact-list-modal.blade.php ENDPATH**/ ?>