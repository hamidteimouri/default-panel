@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="profile-sidebar" style="width:250px;">

                <div class="portlet light profile-sidebar-portlet">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{src($admin,'user','125/125','profile')}}" class="img-responsive"
                             alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$admin->fullName}}
                        </div>
                        <div class="profile-usertitle-job">
                            {{$admin->slug}}
                        </div>
                    </div>

                    {{--
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
                        <button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
                    </div>
                    --}}

                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a class="@yield('profile_information') active" href="{{route('admin.profile.index')}}">
                                    <i class="icon-user"></i>
                                    اطلاعات حساب کاربری </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="portlet light">
                    {{--
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title">
                                37
                            </div>
                            <div class="uppercase profile-stat-text">
                                Projects
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title">
                                51
                            </div>
                            <div class="uppercase profile-stat-text">
                                Tasks
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title">
                                61
                            </div>
                            <div class="uppercase profile-stat-text">
                                Uploads
                            </div>
                        </div>

                    </div>
                    <!-- END STAT -->
                    --}}
                    <div>
                        {{--
                        <h4 class="profile-desc-title">About Marcus Doe</h4>
                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                        --}}
                        @if($admin->website)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-globe"></i>
                                <a target="_blank" href="{{$admin->website}}">سایت</a>
                            </div>
                        @endif
                        @if($admin->telegram)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-paper-plane"></i>
                                <a target="_blank" href="{{$admin->telegram}}">تلگرام</a>
                            </div>
                        @endif

                        @if($admin->twitter)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-twitter"></i>
                                <a target="_blank" href="{{$admin->twitter}}">توییتر</a>
                            </div>
                        @endif

                        @if($admin->instagram)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-instagram"></i>
                                <a target="_blank" href="{{$admin->instagram}}">اینستاگرام</a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>


            @yield('profile_content')

        </div>
    </div>
@endsection
@section('admin.setting','active')
@section('admin.profile.index','active')
@section('profile_css')
    <link href="{{asset("assets/admin/css/profile-rtl.css")}}" rel="stylesheet" type="text/css"/>
@endsection