<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>VocaMusic - Vocaloid Video Streaming</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/osahan.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
</head>
<body id="page-top">
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
    <a class="navbar-brand mr-1" href=""><img class="img-fluid" alt="" width="100px" src="img/vocaloid.png"></a>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
        <div class="input-group">
            <input type="text" class="form-control" id = "search" placeholder="Search for...">
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
                <img alt="Avatar" src="{{session('LoggedUser')->avatar_img}}">
                {{session('LoggedUser')->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('videos_manager')}}"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
{{--                <a class="dropdown-item" href="subscriptions.html"><i class="fas fa-fw fa-video"></i> &nbsp; Subscriptions</a>--}}
{{--                <a class="dropdown-item" href="settings.html"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a>--}}
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
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{route('upload')}}">
                <i class="fas fa-fw fa-cloud-upload-alt"></i>
                <span>Upload Video</span>
            </a>
        </li>
        @foreach($categories as $cate_data)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>{{$cate_data->name}}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">All</a>
                @foreach($cate_detail as $detail)
                    @if($cate_data->id == $detail->id_categories)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('categories', $detail->id)}}">{{$detail->cate_detail_name}}</a>

                    @endif
                @endforeach
            </div>
        </li>
        @endforeach

        @if(session("LoggedUser"))
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Login/Register</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('login')}}">Login</a>
                    <a class="dropdown-item" href="{{route('register')}}">Register</a>
                </div>
            </li>
        @endif

    </ul>
    <div id="content-wrapper">
        <div class="container-fluid pb-0">
            <div class="top-mobile-search">
                <div class="row">
                    <div class="col-md-12">
                        <form class="mobile-search">
                            <div class="input-group">
                                <input type="text" placeholder="Search for..." class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="top-category section-padding mb-4">
                @if(session("success"))
                <div class="text-success row text-center justify-content-center align-content-center">{{session("success")}}</div>
                @endif
                <div class="row">


                    <div class="container mw-100">
                        <div class="carousel slide" id="main-carousel" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#main-carousel" data-slide-to="1"></li>
{{--                                <li data-target="#main-carousel" data-slide-to="2"></li>--}}
{{--                                <li data-target="#main-carousel" data-slide-to="3"></li>--}}
                            </ol><!-- /.carousel-indicators -->

                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <a href="{{route('watch', 11)}}">
                                    <img class="d-block img-fluid" src="img/slides/01.png" alt="">
                                    <div class="carousel-caption d-none d-md-block ">
                                        <h2 style="font-family: 'Indie Flower', cursive;">Find a reason to sing</h2>
                                        <p style="font-family: 'Indie Flower', cursive; font-size: 13pt; "> [PV] Connecting / halyosy feat. Vocaloid (Collaboration) </p>

                                    </div>
                                    </a>

                                </div>

                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="img/slides/05.png" alt="" height="1434px">
                                    <div class="carousel-caption d-none d-md-block" style="background: #f8f9fa6b;">
                                        <h2 style="font-family: 'Indie Flower', cursive;">The heartbeat I surely felt at that time</h2>
                                        <p style="font-family: 'Indie Flower', cursive; font-size: 13pt; color: black "> [PV] Connecting / halyosy feat. Vocaloid (Collaboration) </p>

                                    </div>
                                </div>

                            </div><!-- /.carousel-inner -->

                            <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only" aria-hidden="true">Prev</span>
                            </a>
                            <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only" aria-hidden="true">Next</span>
                            </a>
                        </div><!-- /.carousel -->
                    </div><!-- /.container -->
                    <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-category">

                            @foreach($artists as $future_artist)
                                <div class="item">

                                    <div class="category-item">
                                        <a href="{{route('categories', $future_artist->id_detail)}}">
                                            <img class="img-fluid" src="{{$future_artist->image_artist}}" alt="">
                                            <h6>{{$future_artist->name_artist}}</h6>
                                            <p>Play now</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="video-block section-padding" id="videos-loading">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title">
                            <div class="btn-group float-right right-action">
                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right home-videos" style="cursor: pointer">
                                    <div class="dropdown-item home-videos" data-type="video.upload_date" onclick="Loading(this)"><i class="fas fa-fw fa-star"></i> &nbsp; Related  </div>
                                    <div class="dropdown-item home-videos" data-type="video.viewers" onclick="Loading(this)"><i class="fas fa-fw fa-signal"></i> &nbsp; Top Viewers </div>
                                </div>
                            </div>
                            <h6>Featured Videos</h6>
                        </div>
                    </div>

                    @foreach($videos as $video)
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="video-card">
                                <div class="video-card-image">
                                    <a class="play-icon" href="{{route("watch", $video->id)}}"><i class="fas fa-play-circle"></i></a>
                                    <a href="#"><img class="img-fluid" src="img/screens/{{$video->id_format}}/{{$video->id_format}}_screen.jpg" alt=""></a>
                                    <div class="time">{{$video->duration}}</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="video-title">
                                        <a href="{{route("watch", $video->id)}}">{{$video->title}}</a>
                                    </div>
                                    <div class="video-page text-success">
                                        {{$video->name}}  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"> @if ($video->verify_id == 1)
                                                <i class="fas fa-check-circle text-success"></i>
                                            @else
                                            @endif</a>
                                    </div>
                                    <div class="video-view">
                                        {{$video->viewers}} &nbsp;<i class="fas fa-calendar-alt"></i> {{$video->upload_date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <hr class="mt-0">
            <div class="video-block section-padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title">

                            <h6>Popular Uploaders</h6>
                        </div>
                    </div>
                    @foreach($uploaders as $upload)
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                            <div class="channels-card-image">
                                <a href="#"><img class="img-fluid" src="{{asset($upload->avatar_img)}}" alt=""></a>
                                <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Uploaded <strong>{{$upload->count_video}}</strong></button></div>
                            </div>
                            <div class="channels-card-body">
                                <div class="channels-title">
                                    <a href="#">{{$upload->name}}</a>
                                    <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified">@if ($upload->verify_id == 1)
                                            <i class="fas fa-check-circle"></i>
                                        @else
                                        @endif</span>
                                </div>
                                <div class="channels-view">

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-sm-6">
                        <p class="mt-1 mb-0"><strong class="text-dark">Website developed by</strong> |
                            <small class="mt-0 mb-0"><a class="text-primary" target="_blank" href="https://www.facebook.com/Dung.Nagi/">@Mai Viết Dũng</a>
                            </small>
                        </p>
                        <p class="mt-1 mb-0"><strong class="text-dark">This project is completely open-source</strong> |
                            <small class="mt-0 mb-0"><a class="text-primary" target="_blank" href="https://github.com/kobato-chan1912/vocaloid-streaming/">@github</a>
                            </small>
                        </p>

                    </div>

                    <div class="col-lg-6 col-sm-6 text-right">
                        <div class="app">
                            <a href="#"><img alt="" src="img/spons/tiktok.png"></a>
                            <a href="#"><img alt="" src="img/spons/nico.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Owl Carousel -->
<script src="vendor/owl-carousel/owl.carousel.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/custom.js"></script>
<script>

        // function Loading() {
        //     var videos_type = document.getElementsByClassName("dropdown-item home-videos");
        //     for (let i = 0; i < videos_type.length; i++) {
        //         videos_type[i].addEventListener("onclick", function () {
        //             console.log('click r');
        //             $.ajax({
        //                 url: 'videos/home/sort=' + videos_type[i].getAttribute("data-type"),
        //                 type: 'GET',
        //             }).done(function (response) {
        //                 // alertify.success('Đã thêm vào giỏ hàng!');
        //                 $("#videos-loading").empty();
        //                 $("#videos-loading").html(response);
        //
        //             });
        //         })
        //     }
        //
        // }
    function Loading(e) {
        filter = e.getAttribute("data-type");
            // var videos_type = document.getElementsByClassName("dropdown-item home-videos");
            // for (let i = 0; i < videos_type.length; i++) {
            //     videos_type[i].addEventListener("onclick", function () {
            //         console.log('click r');
                    $.ajax({
                        url: 'videos/home/sort=' + filter,
                        type: 'GET',
                    }).done(function (response) {
                        // alertify.success('Đã thêm vào giỏ hàng!');
                        $("#videos-loading").empty();
                        $("#videos-loading").html(response);

                    });
            //     })
            // }
    }




</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script>
    $("#search").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    });


</script>
</body>

</html>
