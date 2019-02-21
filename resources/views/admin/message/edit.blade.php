@extends("admin.master")
@section("content")

    @php
        $object = $data['object'];
        $route = $data['route'];
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-pencil"></i> <span>مشاهده و پاسخ {{$data['title_fa']}}</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title="">
                        </a>
                        <a href="" class="remove" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" class="form-horizontal form-label-stripped"
                          action="{{route("admin.{$route}.update",$object->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <br>
                        <div class="form-body">

                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label ">نام و نام خانوادگی:</label>
                                <div class="col-md-9">
                                    <input disabled="disabled" value="{{$object->name}}" id="name" maxlength="190"
                                           name="name"
                                           type="text" class="form-control"
                                           placeholder="نام و نام خانوادگی">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label ">ایمیل:</label>
                                <div class="col-md-9">
                                    <input disabled="disabled" value="{{$object->email}}" maxlength="190" id="email"
                                           name="email"
                                           type="text" class="form-control"
                                           placeholder="ایمیل">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="col-md-3 control-label ">موبایل:</label>
                                <div class="col-md-9">
                                    <input disabled="disabled" value="{{$object->mobile}}" maxlength="190" id="mobile"
                                           name="mobile" type="text" class="form-control"
                                           placeholder="mobile">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="answer" class="col-md-3 control-label ">
                                    متن پیام
                                </label>
                                <div class="col-md-9">
                                    <textarea rows="10" id="message" maxlength="512" name="message" disabled
                                              type="text" class="form-control"
                                              placeholder="">{{$object->message}}</textarea>
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer" class="col-md-3 control-label ">
                                    وضعیت پیام
                                </label>
                                <div class="col-md-9">
                                    {!! seenStatus($object->status) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer" class="col-md-3 control-label ">
                                    وضعیت پاسخ
                                </label>
                                <div class="col-md-9">
                                    {!! replyStatus($object->reply_by) !!}
                                </div>
                            </div>


                            <div class="form-actions">
                                @include('admin.developer.component.back_to_list',['model' => 'message'])
                                @include('admin.developer.component.btn_home')

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box purple ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-pencil"></i> <span>پاسخ از طریق ایمیل</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title="">
                        </a>
                        <a href="" class="remove" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" class="form-horizontal form-label-stripped"
                          action="{{route("admin.{$route}.reply",$object->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <br>
                        <div class="form-body">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label ">نام و نام خانوادگی:</label>
                                <div class="col-md-9">
                                    <input disabled="disabled" value="{{$object->name}}" id="name" maxlength="190"
                                           name="name"
                                           type="text" class="form-control"
                                           placeholder="نام و نام خانوادگی">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label ">ایمیل:</label>
                                <div class="col-md-9">
                                    <input disabled="disabled" value="{{$object->email}}" maxlength="190" id="email"
                                           name="email"
                                           type="text" class="form-control"
                                           placeholder="ایمیل">
                                    {{--<span class="help-block">این فیلد قبل ویرایش نیست.</span>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reply" class="col-md-3 control-label ">متن پاسخ:</label>
                                <div class="col-md-9">

                                        <textarea maxlength="1024" required rows="5" id="reply" name="reply" class="form-control"
                                                  placeholder="پاسخ اختیاری است. حداکثر 1024 کاراکتر">{{old('reply')}}</textarea>

                                    <span class="help-block myHelpBlock">این پاسخ از طریق ایمیل برای کاربر ارسال میشود</span>

                                </div>
                            </div>
                            <input type="hidden" name="reply_type" value="email">

                            <div class="form-actions">
                                <button title="پاسخ از طریق ایمیل" type="submit" class="btn purple-medium">ارسال پاسخ
                                </button>
                                @include('admin.developer.component.btn_home')
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @if(!$replies->isEmpty())
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bars"></i>لیست پاسخ ها
                </div>
                <div class="actions">

                </div>
            </div>
            <div class="portlet-body">
                <table data-datatable class="table table-striped table-bordered table-hover myDataTable" id="">
                    <thead>
                    <tr>
                        <th>
                            پاسخ دهنده
                        </th>

                        <th class="hidden-xs">
                            متن پاسخ
                        </th>
                        <th class="hidden-xs">
                            چگونگی پاسخ
                        </th>
                        <th class="hidden-xs">
تاریخ
                        </th>
                        <th class="hidden-xs">
                            اقدامات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($replies as $object)
                        <tr>
                            <td>
                                {{$object->admin->fullName}}
                            </td>
                            <td style="max-width: 500px;">
                                {{$object->message}}
                            </td>
                            <td class="text-center">
                                                            {!! replyStatus($object->reply_by)!!}
                                                        </td>
                            <td class="text-center">
                                {{$object->createdAtInPersian}}
                            </td>
                            <td class="text-center">

                                <a title="حذف" href="{{route('admin.'.$data['route'].'.destroy',$object->id)}}"
                                   class="btn btn-icon-only red">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

@section("admin.setting",'active')
@section("admin.message.index",'active')

