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
                          action="{{route("admin.{$route}.update",$object->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <br>
                        {{--
                         <div class="form-group">
                             <label for="category" class="col-md-3 control-label myRequired">دسته بندی:</label>
                             <div class="col-md-9">
                                 <select data-select2 class="form-control" name="category" id="category">
                                     @foreach($data['categories'] as $category)
                                         <option @if($object->category_id == $category->id) selected
                                                 @endif value="{{$category->id}}">{{$category->title}}</option>
                                     @endforeach
                                 </select>
                                 --}}{{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}{{--
                             </div>
                         </div>
                         --}}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label myRequired">عنوان:</label>
                                <div class="col-md-9">
                                    <input value="{{$object->title}}" maxlength="190" id="title" name="title"
                                           type="text" class="form-control"
                                           placeholder="عنوان">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>


                            <br>

                            <div class="form-actions">
                                @include('admin.developer.component.btn_create')
                                @include('admin.developer.component.btn_home')
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("admin.article",'active')
@section("admin.articleCategory.index",'active')

