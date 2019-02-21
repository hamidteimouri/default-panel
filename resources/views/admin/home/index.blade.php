@extends("admin.master")
@section("content")

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info">
                {{$admin->fullName}} عزیز به پنل مدیریت خوش آمدید.
            </div>
        </div>
    </div>
    <div class="row">

        @if(auth()->guard('admin')->user()->can('user index'))
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-flamingo">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{$data['users']}}
                        </div>
                        <div class="desc">
                            تعداد کاربران
                        </div>
                    </div>
                    <a class="more" href="{{route('admin.user.index')}}">
                        مشاهده کاربران <i class="m-icon-swapleft m-icon-white"></i>
                    </a>
                </div>
            </div>
        @endif

    </div>


    <div class="clearfix"></div>
    <hr class="hr">
    <br>
    <div class="tiles">


        @if(auth()->guard('admin')->user()->can('user create'))
            <a href="{{route('admin.user.create')}}">
                <div class="tile double bg-yellow">
                    <div class="tile-body">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name" style="text-align: center">
                            افزودن کاربر
                        </div>

                    </div>
                </div>
            </a>
        @endif

        @if(auth()->guard('admin')->user()->can('profile index'))
            <a href="{{route('admin.profile.index')}}">
                <div class="tile double bg-green-jungle">
                    <div class="tile-body">
                        <i class="fa fa-paw"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name" style="text-align: center">
                            پروفایل
                        </div>

                    </div>
                </div>
            </a>
        @endif

        {{--
        <div class="tile bg-blue">
            <div class="tile-body">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Reports
                </div>
                <div class="number">
                </div>
            </div>
        </div>
        <div class="tile bg-blue">
            <div class="tile-body">
                <i class="fa fa-briefcase"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Documents
                </div>
                <div class="number">
                    124
                </div>
            </div>
        </div>
        <div class="tile bg-blue selected">
            <div class="corner">
            </div>
            <div class="check">
            </div>
            <div class="tile-body">
                <i class="fa fa-cogs"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Settings
                </div>
            </div>
        </div>
        --}}

    </div>

    {{--  <div class="portlet light">
          <div class="portlet-title">


          </div>
          <hr>
          <div class="portlet-body">


          </div>
      </div>--}}




@endsection
@section("admin.home.index",'active open')