<!-- Cropper -->
<link href="{{asset('assets/global/own/plugins/cropper/cropper.css')}}" rel="stylesheet"/>
<script type="text/javascript" src="{{asset("assets/global/own/plugins/cropper/cropper.js")}}"></script>
{{--<script type="text/javascript" src="{{asset("assets/admin/plugins/cropper/cropper_config.js")}}"></script>--}}

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-run-cropper]').change(function () {
            var x = $(this).attr('data-x');
            var y = $(this).attr('data-y');
            var element = $(this).attr('data-element');

            $(element).find('.preview-lg').css('background-image', 'none');
            $(element).find('.rmv_file').show();
            $(element).find('.rmv_file').attr('data-filename', '1');

            setTimeout(function () {
                run_cropper(element, x, y);
            }, 500);
        });
    });

    /* RUN CROPPER */
    function run_cropper(element, x, y) {
        var imgElement = $(element + ' .cropper_holder img');

        var cropper = new Cropper(imgElement[0], {
            aspectRatio: x / y,
            autoCropArea: .5,
            dragMode: 'move',
            viewMode: 1,
            movable: false,
            /* preview: $(element + ' .cropper_preview'), */
            toggleDragModeOnDblclick: false,
            crop: function (e) {

                /* Output the result data for cropping image. */
                var x = e.detail.x;
                var y = e.detail.y;
                var w = e.detail.width;
                var h = e.detail.height;

                $("[data-crop-x]").val(x);
                $("[data-crop-y]").val(y);
                $("[data-crop-w]").val(w);
                $("[data-crop-h]").val(h);
            }
        });
    }

    /*Preview Image Function*/
    function preview($file, $target) {
        /*show image before upload */
        $($file).on("change", function () {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; /*no file selected, or no FileReader support*/

            if (/^image/.test(files[0].type)) { /* only image file */
                var reader = new FileReader(); /* instance of the FileReader */
                reader.readAsDataURL(files[0]); /* read the local file */
                reader.onloadend = function () { /* set image data as background of div */
                    $($target).html("<img class=' img-responsive ' src='" + this.result + "'>").show();
                }
            }
        });
    }
</script>