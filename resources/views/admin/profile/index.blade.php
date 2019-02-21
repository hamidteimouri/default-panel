@extends('admin.profile.master')
@section('profile_content')
    <div class="profile-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">حساب کاربری</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">اطلاعات شخصی</a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab">تغییر رمز</a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1_1">
                                <form method="post" role="form" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <div class="form-group">
                                        <label for="name" class="control-label myRequired">نام</label>
                                        <input tabindex="1" id="name" maxlength="190" value="{{$admin->name}}"
                                               type="text" placeholder="حمید" name="name"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="family" class="control-label myRequired">نام خانوادگی</label>
                                        <input tabindex="2" id="family" name="family" maxlength="190" value="{{$admin->family}}"
                                               type="text"
                                               placeholder="تیموری"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="control-label ">ایمیل</label>
                                        <input  disabled id="email" name="email" maxlength="11" value="{{$admin->email}}"
                                               type="text"
                                               placeholder="info@google.com"
                                               class="form-control myLink">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="control-label myRequired">تلفن همراه</label>
                                        <input tabindex="3" id="mobile" name="mobile" maxlength="11" value="{{$admin->mobile}}"
                                               type="text"
                                               placeholder="0912xxxxxxx"
                                               class="form-control myLink">
                                    </div>
                                    <div class="form-group">
                                        <label for="national_code" class="control-label myRequired">کد ملی</label>
                                        <input tabindex="4" id="national_code" name="national_code" maxlength="10"
                                               value="{{$admin->national_code}}" type="text"
                                               placeholder="392xxxxxxx"
                                               class="form-control myLink">
                                    </div>

                                    <div class="form-group">
                                        <label for="website" class="control-label ">وب سایت</label>
                                        <input tabindex="5" id="website" name="website" maxlength="256" value="{{$admin->website}}"
                                               type="text"
                                               placeholder="https://google.com"
                                               class="form-control myLink">
                                    </div>

                                    <div class="form-group">
                                        <label for="telegram" class="control-label ">تلگرام</label>
                                        <input tabindex="6" id="telegram" name="telegram" maxlength="256" value="{{$admin->telegram}}"
                                               type="text"
                                               placeholder="https://t.me/username"
                                               class="form-control myLink">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram" class="control-label ">اینستاگرام</label>
                                        <input tabindex="6" id="instagram" name="instagram" maxlength="256" value="{{$admin->instagram}}"
                                               type="text"
                                               placeholder="https://instagram.com/username"
                                               class="form-control myLink">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter" class="control-label ">توییتر</label>
                                        <input tabindex="7" id="twitter" name="twitter" maxlength="256" value="{{$admin->twitter}}"
                                               type="text"
                                               placeholder="https://twitter.com/username"
                                               class="form-control myLink">
                                    </div>

                                    <br><br>
                                    <div class="form-group">
                                        <label for="myCropper" class="col-md-3 control-label">عکس:</label>
                                        <div class="col-md-9 responsive-1024">
                                            {{--<a onclick="$('.uploadBtn').click()" href="" class="btn green">--}}
                                            {{--Green <i class="fa fa-plus"></i>--}}
                                            {{--</a>--}}
                                            <input data-x="1" data-y="1"
                                                   onclick="preview(this,$('.cropper_holder'))"
                                                   name="pic"
                                                   data-run-cropper
                                                   data-element="#myCropper"
                                                   accept='image/jpg,image/jpeg,image/png,image/gif'
                                                   class="uploadBtn"
                                                   type="file">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-lg-offset-3 col-md-9 ">
                                            <div id="myCropper">
                                                <div style="width: 100%;" id="myCropper" class="cropper_holder">

                                                </div>
                                                <input type="hidden" data-crop-x name="cropper[x]">
                                                <input type="hidden" data-crop-y name="cropper[y]">
                                                <input type="hidden" data-crop-w name="cropper[w]">
                                                <input type="hidden" data-crop-h name="cropper[h]">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="clearfix"></div>
                                    <br>

                                    <div class="margiv-top-10">
                                        @include('admin.developer.component.btn_update')
                                        @include('admin.developer.component.btn_home')
                                    </div>
                                    <br>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_1_2">
                                <form method="post" action="{{route('admin.profile.update.password')}}">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <div class="form-group">
                                        <label for="current_password" class="control-label myRequired">رمز عبور
                                            فعلی</label>
                                        <input placeholder="حداقل 6 کاراکتر" name="current_password"
                                               id="current_password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label myRequired">رمز عبور</label>
                                        <input placeholder="حداقل 6 کاراکتر" type="password" name="password"
                                               id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="control-label myRequired">تکرار رمز
                                            عبور</label>
                                        <input placeholder="حداقل 6 کاراکتر" id="password_confirmation"
                                               name="password_confirmation" type="password" class="form-control">
                                    </div>

                                    <div class="margin-top-10">
                                        @include('admin.developer.component.btn_update')
                                        @include('admin.developer.component.btn_home')
                                    </div>
                                </form>
                            </div>
                            <!-- END CHANGE PASSWORD TAB -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('profile_information','active')
@section('cropper')
    @include('admin.developer.cropper.cropper')
@endsection