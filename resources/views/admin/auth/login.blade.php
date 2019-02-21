<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <title>ورود به پنل مدیریت {{config('app.name_fa')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="author" content="https://hamidteimouri.com">
    @include('admin.partial.no_index')
    <meta content="" name="description">
    <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset("assets/global/plugins/uniform/css/uniform.default.css")}}" rel="stylesheet" type="text/css"/>--}}
    {{--<link href="{{asset("assets/global/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css"/>--}}
    <link href="{{asset("assets/admin/css/login-soft-rtl.css")}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset("assets/global/css/components-md-rtl.css")}}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/global/css/plugins-md-rtl.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/layout/css/layout-rtl.css")}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{asset("assets/admin/layout/css/themes/default-rtl.css")}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset("assets/admin/layout/css/custom-rtl.css")}}" rel="stylesheet" type="text/css"/>


    {{--Developer Style--}}
    <link href="{{asset("assets/admin/css/mystyle.css")}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="{{asset('assets/admin/favicon.png')}}">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">


<!-- BEGIN LOGO -->
<div class="logo">
    {{--<a target="_blank" href="{{route("admin.home.index")}}">--}}
    {{--<img src="{{asset('assets/admin/layout4/img/logo-big.png')}}" alt="Logo">--}}
    {{--</a>--}}
</div>
<!-- END LOGO -->

<div class="menu-toggler sidebar-toggler"></div>

<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{route("admin.auth.login")}}" method="post">
        {{csrf_field()}}
        {{--<h3 class="form-title" style="color: #000;text-align: center">ورود به پنل مدیریت</h3>--}}
        <h3 class="form-title" style="color: #fff;text-align: center">ورود به پنل مدیریت</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>نام کاربری و رمز عبور را وارد کنید.</span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">نام کاربری:</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off"
                       placeholder="نام کاربری..."
                       name="email"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">رمز عبور:</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="رمز عبور..."
                       name="password"/>
            </div>
        </div>
        <div class="form-actions">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1"/> مرا به خاطر بسپار </label>
            <button type="submit" class="btn blue pull-right">
                ورود <i class="m-icon-swapleft m-icon-white"></i>
            </button>
        </div>
        {{--
		<div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="facebook" data-original-title="facebook" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="twitter" data-original-title="Twitter" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="googleplus" data-original-title="Goole Plus" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="linkedin" data-original-title="Linkedin" href="javascript:;">
					</a>
				</li>
			</ul>
		</div>
        --}}
        {{--
        <div class="forget-password">
            <h4>فراموشی رمز عبور؟</h4>
            <p>نگران نباشید، برای بازیابی رمز <a href="javascript:;" id="forget-password">اینجا</a>
                کلیک کنید.
            </p>
        </div>
        --}}
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.html" method="post">
        <h3>رمز عبور را فراموش کرده اید ؟</h3>
        <p>
            ایمیل خود را وارد کنید.
        </p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="ایمیل"
                       name="email">
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn">
                <i class="m-icon-swapright"></i> بازگشت
            </button>
            <button type="submit" class="btn blue pull-right">
                ارسال <i class="m-icon-swapleft m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->

</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->

<div class="copyright">
    تمامی حقوق محفوظ است.
</div>

{{--<div class="loginFormBackground">--}}
    {{--<img src="{{asset("assets/admin/pages/media/bg/1.jpg")}}" alt="bg">--}}
{{--</div>--}}





<!--[if lt IE 9]>
<script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset("assets/global/plugins/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/jquery-migrate.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/bootstrap/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/jquery.blockui.min.js")}}" type="text/javascript"></script>
{{--<script src="{{asset("assets/global/plugins/uniform/jquery.uniform.min.js")}}" type="text/javascript"></script>--}}
<script src="{{asset("assets/global/plugins/jquery.cokie.min.js")}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset("assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}}"
        type="text/javascript"></script>

<script type="text/javascript" src="{{asset("assets/global/plugins/select2/select2.min.js")}}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset("assets/global/scripts/metronic.js")}}" type="text/javascript"></script>
{{--<script src="{{asset("assets/admin/layout/scripts/layout.js")}}" type="text/javascript"></script>--}}
{{--<script src="{{asset("assets/admin/layout/scripts/demo.js")}}" type="text/javascript"></script>--}}
<script src="{{asset("assets/admin/pages/scripts/login-soft.js")}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
//        Layout.init(); // init current layout
        Login.init();
//        Demo.init();
    });
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>