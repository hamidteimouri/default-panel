<a @if($route) href="{{route("admin.{$route}.index")}}" @endif class="btn btn-primary">
    <i class="fa fa-bars"></i>
    لیست @if($titles) {{$titles}} @endif
</a>