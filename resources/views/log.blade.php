@if (session('LoggedUser'))
    {{session('LoggedUser')->name}}
@else
    Chưa đăng nhập
@endif
