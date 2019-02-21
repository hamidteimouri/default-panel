@extends("admin.master")
@section("content")
    @php
        $object = $data['object'];
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
                          action="{{route("admin.{$data['route']}.update",$object->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field("PATCH")}}
                        <div class="form-body">


                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label ">عنوان:</label>
                                <div class="col-md-9">
                                    <input maxlength="190" id="title" name="title" type="text" class="form-control"
                                           placeholder="عنوان" value="{{$object->title}}">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="description" class="col-md-3 control-label myRequired">توضیحات:</label>
                                <div class="col-md-9">
                                    <input maxlength="190" id="description" name="description" type="text"
                                           class="form-control"
                                           placeholder="توضیحات" value="{{$object->description}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-md-3 control-label ">لینک:</label>
                                <div class="col-md-9">
                                    <input maxlength="1024" id="link" name="link" type="text"
                                           class="form-control myLink"
                                           placeholder="لینک" value="{{$object->link}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="img" class="col-md-3 control-label">عکس اصلی:</label>
                                <div class="col-md-9">
                                    <img src="{{src($object,'main_img')}}" style="max-width: 100%;height: 200px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="myCropper" class="col-md-3 control-label myRequired">عکس:</label>
                                <div class="col-md-9 responsive-1024">
                                    {{--<a onclick="$('.uploadBtn').click()" href="" class="btn green">--}}
                                    {{--Green <i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                    <input data-x="1.07" data-y="1" onclick="preview(this,$('.cropper_holder'))"
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
                            <div class="form-actions">
                                @include('admin.developer.component.btn_update')
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

@section("admin.slider",'active')
@section("admin.slider.index",'active')


@section("cropper")
    @include("admin.developer.cropper.cropper")
@endsection

