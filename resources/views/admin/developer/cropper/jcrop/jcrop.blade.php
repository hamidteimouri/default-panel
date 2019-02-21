
<!-- Cropper -->
<script src="{{asset("assets/global/plugins/jcrop/js/jquery.color.js")}}"></script>
<script src="{{asset('assets/global/plugins/jcrop/js/jquery.Jcrop.min.js')}}"></script>
<link href="{{asset('assets/global/plugins/jcrop/css/jquery.Jcrop.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/admin/pages/css/image-crop-rtl.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/admin/pages/scripts/form-image-crop.js')}}"></script>

<script type="text/javascript">
    $("document").ready(function () {
        FormImageCrop.init();
    });
</script>
