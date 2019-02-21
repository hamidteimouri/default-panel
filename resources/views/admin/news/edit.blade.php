@extends("admin.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light ">
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
                          action="{{route("admin.news.update",$data['object']->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="form-body">
                            <div class="form-group">
                                <label for="category" class="col-md-3 control-label myRequired">دسته بندی:</label>
                                <div class="col-md-9">
                                    <select data-select2 class="form-control" name="category" id="category">
                                        @foreach($data['categories'] as $category)
                                            <option @if($data['object']->category_id == $category->id) selected
                                                    @endif value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label myRequired">عنوان:</label>
                                <div class="col-md-9">
                                    <input value="{{$data['object']->title}}" maxlength="190" id="title" name="title"
                                           type="text" class="form-control"
                                           placeholder="عنوان">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="summary" class="col-md-3 control-label myRequired">خلاصه:</label>
                                <div class="col-md-9">
                                    <input value="{{$data['object']->summary}}" id="summary" maxlength="190" name="summary"
                                           type="text" class="form-control"
                                           placeholder="خلاصه">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="source" class="col-md-3 control-label myRequired">منبع:</label>
                                <div class="col-md-9">
                                    <input value="{{$data['object']->source}}" id="source" maxlength="190" name="source"
                                           type="text" class="form-control"
                                           placeholder="مثال : گوگل">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link" class="col-md-3 control-label myRequired">لینک منبع:</label>
                                <div class="col-md-9">
                                    <input value="{{$data['object']->link}}" id="link" maxlength="190" name="link" type="text"
                                           class="form-control"
                                           placeholder="مثال http://google.com">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="description" class="col-md-3 control-label myRequired">توضیحات:</label>
                                <div class="col-md-9">
                                    <textarea cols="" rows="" data-tinymce id="description"
                                              name="description">{{$data['object']->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="img" class="col-md-3 control-label">عکس :</label>
                                <div class="col-md-9">
                                    <img src="{{src($data['object'],'main_img')}}" style="max-width: 100%;height: 200px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="myCropper" class="col-md-3 control-label myRequired">عکس:</label>
                                <div class="col-md-9 responsive-1024">
                                    {{--<a onclick="$('.uploadBtn').click()" href="" class="btn green">--}}
                                    {{--Green <i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                    <input data-x="1.925" data-y="1" onclick="preview(this,$('.cropper_holder'))"
                                           data-run-cropper
                                           data-element="#myCropper"
                                           accept='image/jpg,image/jpeg,image/png,image/gif'
                                           class="uploadBtn"
                                           type="file" name="pic">
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
                                @include('admin.developer.component.back_to_list',['model' => $data['route']])
                                @include('admin.developer.component.btn_home')
                                @include('admin.developer.component.btn_show_in_website',['route'=>$data['route'],'id' => $data['object']->id])
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("admin.news",'active')
@section("admin.news.create",'active')

@section("editor")
    @include("admin.developer.editor.tinymce")
@endsection

@section("cropper")
    @include("admin.developer.cropper.cropper")
@endsection
