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

                        <div class="form-body">


                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label myRequired">نام نقش مدیریتی
                                    (انگلیسی):</label>
                                <div class="col-md-9">
                                    <input maxlength="190" type="text" class="form-control"
                                           placeholder="نام نقش مدیریتی جدید به انگلیسی" name="name" id="name"
                                           value="{{old('name')}}">
                                    <span class="help-block myHelpBlock">لطفا بین کلمات از فاصله استفاده نکنید</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label myRequired">نام نقش مدیریتی
                                    (فارسی):</label>
                                <div class="col-md-9">
                                    <input maxlength="190" type="text" class="form-control myRequired"
                                           placeholder="نام یا توضیحات نقش مدیریتی جدید به فارسی" name="description"
                                           value="{{old('description')}}">
                                    <span class="help-block myHelpBlock">لطفا بین کلمات از فاصله استفاده نکنید</span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label myRequired">
                                    انتخاب سطح دسترسی برای این نقش مدیریت:
                                </label>
                                <div class="col-md-9">
                                    <div class="md-checkbox-list">
                                        <?php $i = 1; $temp = ''; $flag = 0;?>
                                        @foreach($data['permissions'] as $permission)
                                            <?php
                                            $parts = explode(' ', $permission->name);
                                            $first = $parts[0];
                                            if ($first != $temp) {
                                                if ($temp != '')
                                                    echo "<div class='clearfix'></div><hr class='hr'>";
                                                $temp = $first;
                                            }
                                            ?>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox{{$i}}" name="permission[]"
                                                           value="{{$permission->name}}" class="md-check">
                                                    <label for="checkbox{{$i}}">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{$permission->description}}</label>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        @endforeach
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

@section("admin.acl",'active')
@section("admin.role.index",'active')

