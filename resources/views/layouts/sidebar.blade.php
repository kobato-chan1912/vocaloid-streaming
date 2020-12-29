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
                @if ($cate_data->id == 3)
                    <i class="fas fa-fw fa-list"></i>
                @else
                    <i class="fas fa-fw fa-play"></i>
                @endif
                <span>{{$cate_data->name}}</span>
            </a>
            <div class="dropdown-menu">
                @if ($cate_data->id == 3)
                    <a class="dropdown-item" href="#">Top Songs</a>
                @else
                    <a class="dropdown-item" href="#">All</a>
                @endif

                @foreach($cate_detail as $detail)
                    @if($cate_data->id == $detail->id_categories)
                        @if($cate_data->id==3)
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('playlist', $detail->id)}}">{{$detail->cate_detail_name}}</a>
                        @else
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('categories', $detail->id)}}">{{$detail->cate_detail_name}}</a>

                        @endif
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
