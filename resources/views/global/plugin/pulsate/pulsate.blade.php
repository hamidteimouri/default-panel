{{-- Pulsate plugin --}}
<script src="{{asset("assets/global/own/plugins/pulsate/jquery.pulsate.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $(".pulsate").pulsate({
                color: "#e42e7a"
            });

        });
    })($)
</script>