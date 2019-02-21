@extends('admin.master')
@section('content')
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
                        نام و نام خانوادگی
                    </th>
                    <th class="text-center">
                        ایمیل
                    </th>
                    <th class="text-center">
                        نقش مدیریتی
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
                            {{$object->fullName}}
                        </td>

                        <td class="text-center">
                            {{$object->email}}
                        </td>
                        <td class="text-center">
                            @foreach($object->getRoleNames() as $role)
                                {{\Spatie\Permission\Models\Role::where('guard_name','admin')->where('name',$role)->first()->description}}
                                @if(!$loop->last)
                                    &nbsp;&nbsp;-&nbsp;&nbsp;
                                @endif
                            @endforeach

                        </td>
                        <td class="text-center">
                            {{$object->createdAtInPersianNumber}}
                        </td>
                        <td class="text-center">
                            @if(auth()->guard('admin')->user()->can('admin update'))
                                <a href="{{route("admin.{$data['route']}.edit",$object->id)}}"
                                   class="btn btn-icon-only blue">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endif
                            @if(auth()->guard('admin')->user()->can('admin delete'))
                                @if(auth()->guard('admin')->user()->id != $object->id && $object->type != 'super_admin')
                                    <a href="{{route("admin.".$data['route'].".destroy",$object->id)}}"
                                       class="btn btn-icon-only red">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @endif
                            @endif

                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('datatable')
    @include('admin.developer.datatable.datatable')
@endsection

@section('admin.admin','active')
@section('admin.admin.index','active')