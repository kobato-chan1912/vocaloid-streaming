<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Loading</p>
    </div>
</div>
<nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
    &nbsp;&nbsp;
    <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button> &nbsp;&nbsp;
    <a class="navbar-brand mr-1" href="{{route("home")}}"><img class="img-fluid" alt="" width="100px" src="{{asset("img/vocaloid.png")}}"></a>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <div class="input-group-append">
                <button class="btn btn-light" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
        <li class="nav-item mx-1">
            <a class="nav-link" href="{{route('upload')}}">
                <i class="fas fa-plus-circle fa-fw"></i>
                Upload Video
            </a>
        </li>
        @if (session('LoggedUser'))
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
                <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img alt="Avatar" src="{{asset(session('LoggedUser')->avatar_img)}}">
                    {{session('LoggedUser')->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{route('videos_manager')}}"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
{{--                    <a class="dropdown-item" href="subscriptions.html"><i class="fas fa-fw fa-video"></i> &nbsp; Subscriptions</a>--}}
{{--                    <a class="dropdown-item" href="settings.html"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a>--}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
                </div>
            </li>
        @else
            <li class="nav-item mx-1">
                <a class="nav-link" href="{{route('login')}}">
                    <i class="fas fa-user-circle"></i>
                    Login
                </a>
            </li>
        @endif
    </ul>
</nav>
