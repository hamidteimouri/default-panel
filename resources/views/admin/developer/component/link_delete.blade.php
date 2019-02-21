<a title="حذف" @if($route and $id) href="{{route("admin.$route.destroy",$id)}}" @endif
   class="btn btn-icon-only red">
    <i class="fa fa-trash"></i>
</a>