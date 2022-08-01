<nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <i class="fas fa-bell fa-fw text-warning"></i>
                <!-- Counter - Alerts -->
                <i class="badge badge-danger">2</i>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header bg-dark">
                    Notification
                </h6>
                <div class="text-xs"> <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-gray-800">
                                <i class="fas fa-image text-white"></i>
                        </div>
                    </div>
                        <div>
                            <div class="small text-gray-500"><?php echo e(now()); ?></div>
                            qqqqqqqqqqqqqqqqqqqqqqqq
                        </div>
                    </a>
                    </div>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600 small">
                    <small class="<?php echo e(Auth::user()->role == 'jobseeker' ? 'text-success' : 'text-info'); ?>">
                        <?php echo e(Auth::user()->role == 'jobseeker' ?  'Job Seeker'
                            : (Auth::user()->role == 'employer' ? 'Employer' : 'Guest')); ?>

                    </small>
                        <?php echo e(Auth::user()->name); ?>

                </span>
                <img class="img-profile rounded-circle"
                    src="<?php echo e(Auth::user()->current_avatar
                        ?  asset('/images/'.Auth::user()->current_avatar)
                        : asset('images/default.jpg')); ?>"
                >
            </a>
            <!-- Dropdown - User Information -->
            <?php $isEmpty = App\Models\Profile::where('profile_id',Auth::user()->id)->count(); ?>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo e($isEmpty != 0 ? route('profile.show',Auth::user()->id)
                    : route('profile.add')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                        My Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-success"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-warning"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function(){
    fetchnotification();
    function fetchnotification(){
        $.ajax({
            type: 'GET',
            url: '/fetchnotification',
            dataType: 'json',
            success: function(response) {
                $('.notificationFetch').html('');
                $.each(response.data,function(key, item){
                $('.notificationCount').append('<span class="badge badge-danger badge-counter">'+item.count+'+</span>');
                var date = new Date(item.created_at).toLocaleDateString()
                $('.notificationFetch').append('<div class="text-xs"> <a class="dropdown-item d-flex align-items-center" href="#">\
                        <div class="mr-3">\
                            <div class="icon-circle bg-success">\
                                <i class="fas fa-image text-white"></i>\
                            </div>\
                        </div>\
                        <div>\
                            <div class="small text-gray-500">'+date+'</div>\
                            '+item.notification+'\
                        </div>\
                    </a>\
                    </div>');
                })
            }
        })
    }
})
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\laragon\www\aeycontacts\resources\views/partials/navbar.blade.php ENDPATH**/ ?>