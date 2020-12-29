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
                @if($data->id_created == session("LoggedUser")->id)
                    | <a href="javascript::" onclick="Delete({{$data->id}}, {{$data->id_video}})">Delete</a>
                @endif

            </small>
            <div class="comment" style="padding-top: 10px">

                {{$data->comments}}

            </div>

        </div>
    @endforeach
@endif
