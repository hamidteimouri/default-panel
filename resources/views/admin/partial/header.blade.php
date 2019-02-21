<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{app()->getLocale()}}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{app()->getLocale()}}" class="ie9 no-js"> <![endif]-->
<html lang="{{app()->getLocale()}}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت {{config('app.name_fa')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="author" content="https://hamidteimouri.com">
    @include('admin.partial.no_index')
    <meta content="" name="description"/>
    <link href="{{asset("assets/global/plugins/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/global/plugins/simple-line-icons/simple-line-icons.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/global/plugins/bootstrap/css/bootstrap-rtl.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/global/css/components-md-rtl.css")}}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/layout4/css/layout-rtl.css")}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{asset("assets/admin/layout4/css/themes/light-rtl.css")}}" rel="stylesheet" type="text/css"/>
    @yield('profile_css')
    {{--Developer Style--}}
    <link href="{{asset("assets/admin/css/mystyle.css?ver=0.3")}}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{asset('assets/admin/favicon.png')}}">
</head>