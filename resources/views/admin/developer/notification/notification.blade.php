{{--Notifications--}}
<script src="{{asset("assets/global/plugins/jquery-notific8/jquery.notific8.min.js")}}"></script>
<script type="text/javascript">

    $(document).ready(function () {
        @if (Session::has('msg'))
        $.notific8("{{session('msg')}}", {
            theme: 'lime',
            sticky: false,
            horizontalEdge: "bottom",
            verticalEdge: "left",
            life: 2000
        });
        @endif
        @if (Session::has('info'))
        $.notific8("{{session('info')}}", {
            theme: 'amethyst',
            sticky: true,
            horizontalEdge: "bottom",
            verticalEdge: "left"


        });
        @endif
        @if (Session::has('warning'))
        $.notific8("{{session('warning')}}", {
            theme: 'tangerine',
            sticky: true,
            horizontalEdge: "bottom",
            verticalEdge: "left"

        });
        @endif
        @if (Session::has('err'))
        $.notific8("{{session('err')}}", {
            theme: 'ruby',
            sticky: true,
            horizontalEdge: "bottom",
            verticalEdge: "left"
        });
        @endif

        @if(isset($errors))
        @if (count($errors) > 0)
        // Validation Error in Laravel, Notification
        @foreach ($errors->all() as $error)
        $.notific8("{{$error}}", {
            theme: 'ruby',
            sticky: true,
            horizontalEdge: "bottom",
            verticalEdge: "left"
        });
        @endforeach
        // End Laravel Validation Error
        @endif
        @endif


    });
</script>
<!-- END JAVASCRIPTS -->