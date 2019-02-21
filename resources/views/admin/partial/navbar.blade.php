<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">

    <div class="page-header-inner">

        <div class="page-logo">
            <a target="_blank" href="{{route('front.home.index')}}" title="مشاهده وب سایت در صفحه جدید">
                {{config('app.name_fa')}}
            </a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        <div class="page-actions">
            <div class="btn-group">
                <button type="button" class="btn purple btn-sm dropdown-toggle" data-toggle="dropdown"
                        data-hover="dropdown" data-close-others="true">
                    <span class="hidden-sm hidden-xs">لینک های مفید&nbsp;</span>
                    <i style="vertical-align: -3px" class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a target="_blank" title="مشاهده سایت در صفحه جدید" href="{{route('front.home.index')}}">
                            <i class="icon-eye"></i> مشاهده سایت</a>
                    </li>
                    <li>
                        <a target="_blank" title="مشاهده تلگرام '{{config("app.name_fa")}}' در صفحه جدید"
                           href="{{$data['telegram']}}">
                            <i class="icon-paper-plane"></i> تلگرام </a>
                    </li>
                    <li>
                        <a target="_blank" title="مشاهده توییتر '{{config("app.name_fa")}}' در صفحه جدید"
                           href="{{$data['twitter']}}">
                            <i class="icon-social-twitter"></i> توییتر </a>
                    </li>
                    <li>
                        <a target="_blank" title="مشاهده ایسناگرام '{{config("app.name_fa")}}' در صفحه جدید"
                           href="{{$data['instagram']}}">
                            <i class="icon-camera"></i> اینستاگرام </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="timeWrapper" title="ساعت و تاریخ سرور">
            <span class="today">امروز</span>
            <time class="date">{{$data['date']}}</time>
            <span class="now">ساعت</span>
            <time class="date">{{$data['time']}}</time>
        </div>

        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"></li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{$user->fullName}} </span>
                            <img alt="" class="img-circle" src="{{src($user,'user','40/40','profile')}}">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            @if(auth()->guard('admin')->user()->can('topMusic index'))
                                <li>
                                    <a href="{{route('admin.profile.index')}}">
                                        <i class="icon-user"></i>مشاهده پروفایل</a>
                                </li>
                                <li class="divider"></li>
                            @endif


                            <li>
                                <a target="_blank" title="مشاهده وب سایت در صفحه جدید"
                                   href="{{route('front.home.index')}}">
                                    <i class="icon-eye"></i>مشاهده وب سایت</a>
                            </li>

                            <li title="خروج از حساب کاربری">
                                <a href="{{route('admin.auth.logout')}}">
                                    <i class="icon-logout"></i>خروج</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>