@extends("admin.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-pencil"></i>ویرایش {{$data['title_fa']}}
                    </div>
                    <div class="actions">
                        @include("admin.developer.component.link_dashboard")
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" class="form-horizontal form-label-stripped"
                          action="{{route("admin.{$data['route']}.update")}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <br>
                        <div class="form-body">

                            {{--
                            <div class="form-group">
                                <label class="col-md-3 control-label myRequired">عنوان:</label>
                                <div class="col-md-9">
                                    <input value="{{$object->title}}" maxlength="190" type="text" class="form-control" placeholder="عنوان">
                                    --}}{{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}{{--
                                </div>
                            </div>
                            --}}
                            <div class="form-group">
                                <label for="description" class="col-md-3 control-label myRequired">توضیحات:</label>
                                <div class="col-md-9">
                                    <textarea data-tinymce id="description"
                                              name="description">{{$data['object']->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            @include('admin.developer.component.btn_update')
                            @include('admin.developer.component.btn_home')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("admin.setting",'active')
@section("admin.about.edit",'active')

@section("editor")
    @include("global.plugin.editor.tinymce")
@endsection
