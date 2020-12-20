<div class="video-block section-padding" id="videos-loading">
    <div class="row">
        <div class="col-md-12">
            <div class="main-title">
                <div class="btn-group float-right right-action">
                    <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="cursor: pointer">
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
