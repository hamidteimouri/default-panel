@extends('admin.master')
@section('content')
    @if(!$data['objects']->isEmpty())
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bars"></i>لیست {{$data['titles_fa']}}
                </div>
                <div class="actions">
                    {{--@include("admin.developer.component.link_create",['route'=>$data['route'],'title'=>$data['title_fa']])--}}
                    @include("admin.developer.component.link_dashboard")
                </div>
            </div>
            <div class="portlet-body">
                <table data-datatable class="table table-striped table-bordered table-hover myDataTable" id="">
                    <thead>
                    <tr>
                        <th class="text-center">
                            ایمیل
                        </th>
                        <th class="text-center">
                            وضیعت
                        </th>
                        <th class="text-center">
                            وضعیت پاسخ
                        </th>
                        <th class="text-center">
                            تاریخ ایجاد
                        </th>
                        <th class="text-center">
                            اقدامات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['objects'] as $object)
                        <tr>
                            <td class="text-center">
                                {{$object->email}}
                            </td>

                            <td class="text-center">
                                {!! seenStatus($object->status) !!}

                            </td>
                            <td class="text-center">
                                {!! replyStatus($object->reply_by)!!}

                            </td>
                            <td class="text-center">
                                {{$object->createdAtInPersianNumber}}
                            </td>
                            <td class="text-center">
                                @include("admin.developer.component.link_edit",['route'=>$data['route'],'id'=>$object->id,'title'=>'مشاهده و پاسخ'])
                                @include("admin.developer.component.link_delete",['route'=>$data['route'],'id'=>$object->id])
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @else
        @include("admin.partial.no_item")
    @endif
@endsection

@section('datatable')
    @include('admin.developer.datatable.datatable')
@endsection

@section('select2')
    @include('admin.developer.select2.select2')
@endsection

@section('admin.setting','active')
@section('admin.message.index','active')