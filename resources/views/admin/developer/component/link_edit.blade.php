<a @if(isset($title)) title="{{$title}}" @else title="ویرایش"
   @endif
   @if(isset($route) and isset($id)) href="{{route("admin.$route.edit",$object->id)}}" @endif
   class="btn btn-icon-only blue">
    <i class="fa fa-edit"></i>
</a>