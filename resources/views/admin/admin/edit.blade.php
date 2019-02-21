@extends("admin.master")
@section("content")

    @php
        $object = $data['object'];
        $route = $data['route'];
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-pencil"></i> <span>ویرایش {{$data['title_fa']}}</span>
                    </div>
                    <div class="actions">
                        @include("admin.developer.component.link_create",['route'=>$data['route'],'title'=>$data['title_fa']])
                        @include("admin.developer.component.link_list",['route'=>$data['route'],'titles'=>$data['titles_fa']])
                        @include("admin.developer.component.link_dashboard")
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" class="form-horizontal form-label-stripped"
                          action="{{route("admin.". $route .".update",$object->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}


                        <div class="form-body">


                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label myRequired">نام:</label>
                                <div class="col-md-9">
                                    <input maxlength="190" id="title" name="name" type="text" class="form-control"
                                           placeholder="نام" value="{{$object->name}}">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="family" class="col-md-3 control-label myRequired">نام خانوادگی:</label>
                                <div class="col-md-9">
                                    <input id="family" maxlength="190" name="family" type="text"
                                           class="form-control"
                                           placeholder="نام خانوادگی" value="{{$object->family}}">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label myRequired">ایمیل:</label>
                                <div class="col-md-9">
                                    <input id="email" maxlength="190" name="email" type="text"
                                           class="form-control"
                                           placeholder="ایمیل" value="{{$object->email}}">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>
                            {{--
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label myRequired">رمز عبور:</label>
                                <div class="col-md-9">
                                    <input id="password" maxlength="190" name="password" type="password"
                                           class="form-control"
                                           placeholder="رمز عبور" value="">
                                    <span class="help-block">حداقل 6 کاراکتر</span>
                                </div>
                            </div>
                            --}}

                            <hr class="hr">
                            <div class="form-group ">
                                <label class="col-md-3 control-label myRequired">
                                    انتخاب سطح دسترسی برای این نقش مدیریت:
                                </label>
                                <div class="col-md-9" style="padding-top: 10px">
                                    <div class="md-checkbox-list">
                                        <?php $i = 1; $temp = ''; $flag = 0;?>
                                        @foreach($data['roles'] as $role)

                                            <div class="col-md-4 col-sm-6">
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox{{$i}}" name="role[]"
                                                           value="{{$role->name}}" @if(in_array($role->name,$user_roles)) checked @endif class="md-check">
                                                    <label for="checkbox{{$i}}">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{$role->description}}</label>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr class="hr">

                            <div class="form-group">
                                <label for="img" class="col-md-3 control-label">عکس :</label>
                                <div class="col-md-9">
                                    <img src="{{src($object,'user')}}" style="max-width: 100%;height: 200px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="myCropper" class="col-md-3 control-label myRequired">عکس:</label>
                                <div class="col-md-9 responsive-1024">
                                    {{--<a onclick="$('.uploadBtn').click()" href="" class="btn green">--}}
                                    {{--Green <i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                    <input name="pic" data-x="1.925" data-y="1"
                                           onclick="preview(this,$('.cropper_holder'))"
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
                            <br>

                            <div class="form-actions">
                                @include('admin.developer.component.btn_create')
                                @include('admin.developer.component.back_to_list',['model'=>$data['route'],'method'=>'index'])
                                @include('admin.developer.component.btn_home')
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("admin.admin",'active')
@section("admin.admin.index",'active')


@section("cropper")
    @include("admin.developer.cropper.cropper")
@endsection
