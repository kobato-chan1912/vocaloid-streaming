@foreach($data as $cate_detail)
<option value="{{$cate_detail->id}}">{{$cate_detail->cate_detail_name}}</option>
@endforeach
