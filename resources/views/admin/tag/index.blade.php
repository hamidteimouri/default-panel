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
                            عنوان
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
                                {{$object->title}}
                            </td>

                            <td class="text-center">
                                {{$object->createdAtInPersianNumber}}
                            </td>
                            <td class="text-center">
                                <a href="{{route("admin.".$data['route'].".edit",$object->id)}}"
                                   class="btn btn-icon-only blue">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route("admin.".$data['route'].".destroy",$object->id)}}"
                                   class="btn btn-icon-only red">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            {{$data['objects']->links()}}
        </div>

    @else
        @include("admin.partial.no_item")
        @include("admin.developer.component.link_create",['route'=>$data['route'],'title'=>$data['title_fa']])
    @endif
@endsection

@section('datatable')
    @include('admin.developer.datatable.datatable')
@endsection

@section('admin.tag','active')
@section('admin.tag.index','active')