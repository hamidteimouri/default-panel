<a @if($route) href="{{route("admin.{$route}.create")}}" @endif class="btn  btn-success">
    <i class="fa fa-plus"></i>
    افزودن @if($title) {{$title}} @endif
</a>