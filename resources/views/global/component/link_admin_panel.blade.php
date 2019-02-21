@if(auth()->guard('admin')->check())
    <a  href="{{route('admin.home.index')}}" target="_blank" title="مشاهده پنل مدیریت در صفحه جدید" class="adminPanel"> پنل مدیریت</a>
@endif