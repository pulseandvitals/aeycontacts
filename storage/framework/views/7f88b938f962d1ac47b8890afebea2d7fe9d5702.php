<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function(){
    console.log('aw')
    fetchnotification();
   function fetchnotification(){
    $.ajax({
        type: 'GET',
        url: '/fetchnotification',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            $('.dropdown-item').html('');
            $.each(response.data,function(key, item){
            console.log('awe')
            var date = new Date(item.created_at).toLocaleDateString()
            $('.dropdown-item').append('<div class="mr-3">\
                        <div class="icon-circle bg-primary">\
                            <i class="fas fa-file-alt text-white"></i>\
                        </div>\
                    </div>\
                    <div>\
                        <div class="small text-gray-500">'+date+'</div>\
                        <span class="font-weight-bold">'+item.notification+'</span>\
                    </div>');

            })
         }
    })

    }
})

</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp7.0\htdocs\aeycontacts\resources\views/modals/notification-js.blade.php ENDPATH**/ ?>