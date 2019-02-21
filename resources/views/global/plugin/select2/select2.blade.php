<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/own/plugins/select2/select2me.css')}}"/>
<script type="text/javascript" src="{{asset('assets/global/own/plugins/select2/select2.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('assets/global/own/plugins/select2/select2_locale_fa.js')}}"></script>--}}


<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            var  select2 = $(".js_select2");

            select2.select2({
                placeholder: "انتخاب کنید ...",
                allowClear: true
            });
        });
    }(jQuery));
</script>