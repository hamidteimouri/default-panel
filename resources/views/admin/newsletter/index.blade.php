@extends('admin.master')
@section('content')

    <div class="portlet light">

        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bars"></i>لیست {{$data['titles_fa']}}
            </div>
            <div class="actions">

                <a href="{{route('admin.newsletter.export')}}" class="btn btn-circle btn-success">
                    <i class="fa fa-file-excel-o"></i>
                    خروجی اکسل
                </a>
                @include("admin.developer.component.link_dashboard")
            </div>
        </div>
        <div class="portlet-body">
            <table data-datatable class="table table-striped table-bordered table-hover myDataTable" id="">
                <thead>
                <tr>
                    <th>
                        ایمیل
                    </th>
                    <th class="hidden-xs">
                        نمایش
                    </th>
                    <th class="hidden-xs">
                        وضعیت
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
                        <td>
                            {{$object->email}}
                        </td>

                        <td class="text-center">
                            {{displayStatus($object->display)}}
                        </td>
                        <td class="text-center">
                            {!! seenStatus($object->seen) !!}
                            {{--{!! $object->seen !!}--}}
                        </td>
                        <td class="text-center">
                            {{$object->createdAtInPersianNumber}}
                        </td>
                        <td class="text-center">
                            @if($object->seen == 0)
                                <a title="مشاهده" href="{{route('admin.'.$data['route'].'.show',$object->id)}}"
                                   class="btn btn-icon-only btn-warning">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif

                            @include("admin.developer.component.link_delete",['route'=>$data['route'],'id'=>$object->id])

                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>

    {{$data['objects']->links()}}

    <br><br>
    <div class="clearfix"></div>
@endsection

@section('datatable')
    @include('admin.developer.datatable.datatable')
@endsection

@section('select2')
    @include('admin.developer.select2.select2')
@endsection

@section('admin.news','active')
@section('admin.newsletter.index','active')