<!DOCTYPE html>
<html lang="en">

@include('layouts.header', ["title" => $artist[0]->name_artist. " - VocaMusic"])
<body id="page-top">
@include("layouts.top-head")
<div id="wrapper">
    <!-- Sidebar -->
    @include("layouts.sidebar")
    <div class="single-channel-page" id="content-wrapper">
        <div class="single-channel-image">
            <img class="img-fluid" alt="" src="{{$artist[0]->cover_img}}">
            <div class="channel-profile">
                <img class="channel-profile-img" alt="" src="{{$artist[0]->image_artist}}">
                <div class="social hidden-xs">
                    Social &nbsp;
                    <a class="fb" href="#">Facebook</a>
                    <a class="tw" href="#">Twitter</a>
                    <a class="gp" href="#">Google</a>
                </div>
            </div>
        </div>
        <div class="single-channel-nav">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="channel-brand" href="#">{{$artist[0]->name_artist}} <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Videos <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-sm mr-sm-1" type="search" placeholder="Search" aria-label="Search"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp; <button class="btn btn-outline-danger btn-sm" type="button">Subscribe <strong>1.4M</strong></button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="video-block section-padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title">
                            <div class="btn-group float-right right-action">
                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="?sort=related"><i class="fas fa-fw fa-star"></i> &nbsp; Related </a>
                                    <a class="dropdown-item" href="?sort=viewers"><i class="fas fa-fw fa-signal"></i> &nbsp; Top Viewers </a>
                                    <a class="dropdown-item" href="?sort=alphabet"><i class="fas fa-fw fa-times-circle"></i> &nbsp; A-Z </a>
                                </div>
                            </div>
                            <h6>Videos</h6>
                        </div>
                    </div>
                    @foreach($videos as $video)
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="video-card">
                                <div class="video-card-image">
                                    <a class="play-icon" href="{{route("watch", $video->id)}}"><i class="fas fa-play-circle"></i></a>
                                    <a href="#"><img class="img-fluid" src="../img/screens/{{$video->id_format}}/{{$video->id_format}}_screen.jpg" alt=""></a>
                                    <div class="time">{{$video->duration}}</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="video-title">
                                        <a href="{{route("watch", $video->id)}}">{{$video->title}}</a>
                                    </div>
                                    <div class="video-page text-success">
                                        {{$video->name}}  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified">@if ($video->verify_id == 1)
                                                <i class="fas fa-check-circle text-success"></i>
                                            @else
                                            @endif</a></a>
                                    </div>
                                    <div class="video-view">
                                        {{$video->viewers}} views &nbsp;<i class="fas fa-calendar-alt"></i> {{$video->upload_date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{--                {{$videos->lastPage()}}--}}
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center pagination-sm mb-0">

                        @if($page == 1 || !isset($page))
                            @if($videos->lastPage()==1)
                                <li class="page-item disabled">
                                    <a tabindex="-1" href="" class="page-link">Previous</a>
                                </li>



                                <li class="page-item active"><a href="{{$url}}1" class="page-link">1</a></li>

                                <li class="page-item disabled">
                                    <a tabindex="-1" href="#" class="page-link">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a tabindex="-1" href="#" class="page-link">Previous</a>
                                </li>



                                <li class="page-item active"><a href="{{$url}}1" class="page-link">1</a></li>
                                <li class="page-item"><a href="{{$url}}2" class="page-link">2</a></li>
                                <li class="page-item"><a href="{{$url}}3" class="page-link">3</a></li>


                                <li class="page-item">
                                    <a href="{{$url}}2" class="page-link">Next</a>
                                </li>
                            @endif
                        @elseif(($page!=1) && ($page!=$videos->lastPage()))
                            <li class="page-item">
                                <a tabindex="-1" href="{{$url}}{{$page-1}}" class="page-link">Previous</a>
                            </li>


                            <li class="page-item"><a href="{{$url}}{{$page-1}}" class="page-link">{{$page-1}}</a></li>

                            <li class="page-item active"><a href="{{$url}}{{$page}}" class="page-link">{{$page}}</a></li>
                            <li class="page-item"><a href="{{$url}}{{$page+1}}" class="page-link">{{$page+1}}</a></li>


                            <li class="page-item">
                                <a href="{{$url}}{{$page+1}}" class="page-link">Next</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a tabindex="-1" href="{{$url}}{{$page-1}}" class="page-link">Previous</a>
                            </li>
                            <li class="page-item"><a href="{{$url}}{{$page-1}}" class="page-link">{{$page-1}}</a></li>

                            <li class="page-item active"><a href="{{$url}}{{$page}}" class="page-link">{{$page}}</a></li>

                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer ml-0">
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
                            <a href="#"><img alt="" src="{{asset('img/spons/tiktok.png')}}"></a>
                            <a href="#"><img alt="" src="{{asset("img/spons/nico.png")}}"></a>
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
@include("layouts.jsloading")

</body>

</html>
