@include("admin.partial.header")

<body class="page-md page-header-fixed page-sidebar-closed-hide-logo  page-footer-fixed @yield('admin.profile.master')">
@include('global.component.loading.loading')
@include("admin.partial.navbar")

<div class="clearfix"></div>

<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        @include("admin.partial.sidebar")
    </div>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">


        @include('admin.partial.breadcrumb')
            @yield("content")
        </div>
    </div>
</div>
@include('admin.partial.footer')


<!--[if lt IE 9]>
<script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}/"
        type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}/"
        type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>

@include('global.plugin.bootstrap_toggle.bootstrap_toggle')
<script src="{{asset('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/layout4/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/own/master.js')}}" type="text/javascript"></script>
{{--<script src="{{asset('assets/admin/pages/scripts/inbox.js')}}" type="text/javascript"></script>--}}
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            Metronic.init();
            Layout.init();
        });
    })(jQuery)
</script>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            var loadingElm = $("div.loading");
            loadingElm.fadeOut();
        })
    })(jQuery)
</script>
@include("admin.developer.global_js")
@yield('editor')
@yield('map')
@yield('cropper')
@yield('datatable')
@yield('select2')
@yield('multiselect')
@yield('sortable')
@yield('js')


<!--Notification-->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/iziToast/iziToast.min.css')}}">
<script type="text/javascript" src="{{asset('assets/admin/plugins/iziToast/iziToast.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        @if (Session::has('msg'))
        showNotification_iziToast('success', "{{session('msg')}}", false, 2000);

        @endif
        @if (Session::has('info'))
        showNotification_iziToast('info', "{{session('info')}}", true, 3000);
        @endif
        @if (Session::has('warning'))
        showNotification_iziToast('warning', "{{session('warning')}}", true, 3000);
        @endif
        @if (Session::has('err'))
        showNotification_iziToast('error', "{{session('err')}}", false, 3000);
        @endif

        @if(isset($errors))
        @if (count($errors) > 0)
        /*Validation Error in Laravel, Notification*/
        @foreach ($errors->all() as $error)
        showNotification_iziToast('error', "{{$error}}", false, 3000);
        @endforeach
        /*End Laravel Validation Error*/
        @endif
        @endif
    });
</script>
<!-- end javascript -->
</body>
</html>
