@extends("admin.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> <span>افزودن {{$data['title_fa']}}</span>
                    </div>
                    <div class="actions">
                        @include("admin.developer.component.link_list",['route'=>$data['route'],'titles'=>$data['titles_fa']])
                        @include("admin.developer.component.link_dashboard")
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" class="form-horizontal form-label-stripped"
                          action="{{route("admin.{$data['route']}.store")}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}

                        <br>
                        <div class="form-body">


                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label myRequired">عنوان:</label>
                                <div class="col-md-9">
                                    <input maxlength="190" id="title" name="title" type="text" class="form-control"
                                           placeholder="عنوان" value="{{old('title')}}">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>


                            <br>

                            <div class="form-actions">
                                @include('admin.developer.component.btn_create')
                                @include('admin.developer.component.back_to_list',['model'=>$data['route'],'method'=>'index'])
                                @include('admin.developer.component.btn_home')
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("admin.article",'active')
@section("admin.articleCategory.index",'active')
