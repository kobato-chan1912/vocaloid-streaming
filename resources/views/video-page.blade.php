<!DOCTYPE html>
<html lang="en">
@include("layouts.header", ["title" => $data[0]->title." - VocaMusic"])
<body id="page-top">
@include("layouts.top-head")
<div id="wrapper">
    @include("layouts.sidebar")
    <!-- Sidebar -->
    <div id="content-wrapper">
        <div class="container-fluid pb-0">
            <div class="video-block section-padding">
                <div class="row">
                    <div class="col-md-8">
                        <div class="single-video-left">
                            <div class="single-video">

                                <video id="example-player" controls style="width: 100%; height: 400px;">        >
                                    <source src="{{$data[0]->cdn_url}}#t=0.1"
                                            title="1080p" type="video/mp4"/>

                                </video>

                            </div>
                            <div class="single-video-title box mb-3">
                                <h2><a href="#">{{$data[0]->title}}</a></h2>
                                <p class="mb-0"><i class="fas fa-eye"></i> {{$data[0]->viewers}} views</p>
                            </div>
                            <div class="single-video-author box mb-3">
{{--                                <div class="float-right"><button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong></button> <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button></div>--}}
                                <img class="img-fluid" src="{{asset($data[0]->avatar_img)}}" alt="">
                                <p><a href="#"><strong>{{$data[0]->name}}</strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified">

                                        @if ($data[0]->verify_id == 1)
                                        <i class="fas fa-check-circle text-success"></i>
                                        @else
                                        @endif
                                    </span></p>
                                <small>Published on {{$data[0]->upload_date}}</small>
                            </div>
                            <div class="single-video-info-content box mb-3">
                                <h6>Song Name:</h6>
                                <p>{{$data[0]->title}}</p>
                                <h6>Artist :</h6>
                                <p>{{$data[0]->cate_detail_name}}</p>
                                <h6>Description :</h6>
                                <p> {!! nl2br(e(@$data['0']->description)) !!}
                                </p>
                                <h6>Tags :</h6>
                                <p class="tags mb-0">
                                    <span><a href="#">{{$data[0]->cate_detail_name}}</a></span>
                                </p>
                            </div>
                            @if(session("LoggedUser"))
                            <div class="single-video-author box mb-3">
                                {{--                                <div class="float-right"><button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong></button> <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button></div>--}}
                                <img class="img-fluid" src="{{asset(session("LoggedUser")->avatar_img)}}" alt="">
                                <p><a href="#"><strong>{{session("LoggedUser")->name}}</strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified">

                                        @if (session("LoggedUser")->verify_id == 1)
                                            <i class="fas fa-check-circle text-success"></i>
                                        @else
                                        @endif
                                    </span><small></small></p>
                                <div class="text_comment">

                                    <form id="comment_form">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Enter your comment here: </label>
                                        <textarea class="form-control" rows="3" id="comment_text"></textarea>


                                    </div>
                                    <button type="button" class="btn btn-primary" id="comment_submit">Submit</button>
                                    </form>

                                </div>

                            </div>
                            @else
                                <div class="single-video-author mb-3">
                                    <a href="{{route('login')}}"><span><button type="button" class="btn btn-primary">Please Login To Comment</button></span></a>
                                </div>
                            @endif
                            <div class="single-video-author box mb-3" id="comment_data">
                                @if(count($comments) == 0)
                                    <div class="comment-box" style="padding-top: 3px;">
                                        No comment yet!
                                    </div>
                                    @else
                                @foreach($comments as $data)
                                <div class="comment-box">
                                {{--                                <div class="float-right"><button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong></button> <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button></div>--}}
                                <img class="img-fluid" src="{{asset($data->avatar_img)}}" alt="">
                                <p><a href="#"><strong>{{$data->name}}</strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified">

                                        @if ($data->verify_id == 1)
                                            <i class="fas fa-check-circle text-success"></i>
                                        @else
                                        @endif

                                    </span></p>
                                <small>Commented on {{$data->time_created}}
                                    @if(session("LoggedUser"))
                                @if($data->id_created == session("LoggedUser")->id)
                                    | <a href="javascript::" onclick="Delete({{$data->id}}, {{$data->id_video}})">Delete</a>
                                    @else
                                    @endif
                                        @else
                                        @endif


                                </small>
                                <div class="comment" style="padding-top: 10px">

                                    {{$data->comments}}

                                </div>

                            </div>
                                @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-video-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="adblock">
                                        <div class="img">
                                            Google AdSense<br>
                                            336 x 280
                                        </div>
                                    </div>
                                    <div class="main-title">
                                        <h6>Up Next</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @foreach($up_next as $video)
                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="{{route("watch", $video->id)}}"><i class="fas fa-play-circle"></i></a>
                                            <a href="{{route("watch", $video->id)}}"><img class="img-fluid" src="../img/screens/{{$video->id_format}}/{{$video->id_format}}_screen.jpg" alt=""></a>
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
                                    @endforeach
                                    <div class="adblock mt-0">
                                        <div class="img">
                                            Google AdSense<br>
                                            336 x 280
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        @include("layouts.footer")
        <!-- Sticky Footer -->

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
<script src="https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    function Delete (a,b){
        Swal.fire({
            title: 'Are you sure to delete this comment?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../comment/delete/id=" + a +"/video=" + b,
                    type:"GET",
                    success:function(response){
                        console.log(response);
                        if(response) {
                            $("#comment_form")[0].reset();
                            $("#comment_data").empty();
                            $("#comment_data").html(response);
                        }
                    },
                });
            }
        })





    }
    // var player = fluidPlayer('example-player');
    fluidPlayer(
        'example-player',
        {
            layoutControls: {
                primaryColor: "#28B8ED",

            }
        }
    );
// ajax request
    $("#comment_submit").click(function(event){
        event.preventDefault();

        let comment = $("#comment_text").val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let video_id = '{{$video_id}}';


        $.ajax({
            url: "../comment/add",
            type:"POST",
            data:{
                comment:comment,
                id_video: video_id,
                _token: _token
            },
            success:function(response){
                console.log(response);
                if(response) {
                    $("#comment_form")[0].reset();
                    $("#comment_data").empty();
                    $("#comment_data").html(response);
                }
            },
        });
    });

</script>
</body>

</html>
