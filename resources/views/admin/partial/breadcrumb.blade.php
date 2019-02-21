@isset($items)
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{route('admin.home.index')}}">پنل مدیریت</a>
            <i class="fa fa-arrow-left"></i>
        </li>

        @foreach($items as $item)
            @if(!$loop->last)
                <li>
                    <a href="{{$item['route']}}">{{$item['title']}}</a>
                    <i class="fa fa-circle"></i>
                </li>
            @else
                <li>
                    <a style="cursor: text">{{$item['title']}}</a>
                </li>
            @endif
        @endforeach
    </ul>
@endisset