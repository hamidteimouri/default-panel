@extends('admin.master')
@section('content')

    @if(!$data['objects']->isEmpty())
        <div class="portlet light">

            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bars"></i>لیست {{$data['titles_fa']}}
                </div>
                <div class="actions">
                    @include("admin.developer.component.link_create",['route'=>$data['route'],'title'=>$data['title_fa']])
                    @include("admin.developer.component.link_dashboard")
                </div>
            </div>
            <div class="portlet-body">
                <table data-datatable class="table table-striped table-bordered table-hover myDataTable" id="">
                    <thead>
                    <tr>
                        <th class="text-center">
                            سوال
                        </th>

                        <th class="hidden-xs">
                            نمایش
                        </th>
                        <th class="hidden-xs">
                            تاریخ ایجاد
                        </th>
                        <th class="hidden-xs">
                            اقدامات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['objects'] as $object)
                        <tr>
                            <td class="text-center">
                                {{$object->question}}
                            </td>
                            <td class="text-center">
                                {{displayStatus($object->display)}}
                            </td>
                            <td class="text-center">
                                {{$object->createdAtInPersianNumber}}
                            </td>
                            <td class="text-center">
                                @include("admin.developer.component.link_edit",['route'=>$data['route'],'id'=>$object->id])
                                @include("admin.developer.component.link_delete",['route'=>$data['route'],'id'=>$object->id])
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        {{$data['objects']->links()}}
    @else
        @include("admin.partial.no_item")
        @include("admin.developer.component.link_create",['route'=>$data['route'],'title'=>$data['title_fa']])
    @endif

@endsection

@section('datatable')
    @include('admin.developer.datatable.datatable')
@endsection

@section('select2')
    @include('admin.developer.select2.select2')
@endsection

@section('admin.setting','active')
@section('admin.faq.index','active')