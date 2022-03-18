<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class ="rounded-circle" src="{{ asset('images/aey-logo5.png') }}" width="50"></img>
        </div>
        <div class="sidebar-brand-text mx-3">Aey BOOK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Feature
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReceipt"
            aria-expanded="true" aria-controls="collapseReceipt">
            <i class="far fa-bookmark"></i>
            <span>Find Collab</span>
        </a>
        <div id="collapseReceipt" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/post-cards')}}">Post Cards</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSoa"
            aria-expanded="true" aria-controls="collapseSoa">
            <i class="far fa-address-card"></i>
            <span>Information</span>
        </a>
        <div id="collapseSoa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/contacts') }}">Contact Details</a>
                <a class="collapse-item" href="{{ url('/sticky-notes')}}">Sticky Notes</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#aw"
            aria-expanded="true" aria-controls="aw">
            <i class="far fa-address-card"></i>
            <span>API</span>
        </a>
        <div id="aw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/api')}}">User API</a>
                <a class="collapse-item" href="">API 2</a>
            </div>
        </div>
    </li>
    
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>