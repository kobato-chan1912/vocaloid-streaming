<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{route("home")}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="upload-video.html">
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
                @foreach($cate_detail as $detail)
                    @if($cate_data->id == $detail->id_categories)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('categories', $detail->id)}}">{{$detail->cate_detail_name}}</a>

                    @endif
                @endforeach
            </div>
        </li>
    @endforeach

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Login/Register</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('login')}}">Login</a>
            <a class="dropdown-item" href="categories.html">Register</a>
        </div>
    </li>
</ul>
