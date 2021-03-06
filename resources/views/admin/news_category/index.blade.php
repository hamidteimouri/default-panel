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
            <br>
            <div class="portlet-body">
                <table data-datatable3 class="table table-striped table-bordered table-hover myDatatable" id="">
                    <thead>
                    <tr>
                        <th class="text-center">
                            عنوان
                        </th>

                        <th class="text-center">
                            نمایش
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
            {{$data['objects']->links()}}
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a target="_blank" title="مشاهده اخبار در سایت" href="{{route('front.news.index')}}" class="btn blue">
                    اخبار در سایت
                </a>
            </div>
        </div>
    @else
        @include("admin.partial.no_item")
        @include("admin.developer.component.link_create",['route'=>$data['route'],'title'=>$data['title_fa']])
    @endif
@endsection

@section('datatable')
    @include('admin.developer.datatable.datatable')
@endsection

@section('admin.news','active')
@section('admin.newsCategory.index','active')