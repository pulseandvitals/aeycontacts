<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function(){
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/users",
        dataType: 'json',
        success: function(response){
            $.each(response, function(i,users){
                    console.log(response)
                    $('tbody').append('<tr>\
                    <th scope="row">'+users.name+'</th>\
                    <td>'+users.username+'</td>\
                    <td> <label class="badge badge-primary">'+users.email+'</label></td>\
                    <td><a href="'+users.website+'">'+users.website+'</a></td>\
                    <td>\
                    <button type="button" class="btn btn-success btn-sm btn-update" id="edit" value="'+users.id+'"><i class="fa fa-edit"></i></button>\
                    <button type="button" class="btn btn-danger btn-sm btn-delete" id="delete" value="'+users.id+'"><i class="fa fa-trash"></i></button>\
                    </td>\
                    </tr>');
                });
        }
    })
})



</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\laragon\www\aeycontacts\resources\views/modals/api.blade.php ENDPATH**/ ?>