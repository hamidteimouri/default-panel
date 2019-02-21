<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">

    <ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200">
        <li class=" @yield("admin.home.index")">
            <a href="{{route('admin.home.index')}}">
                <i class="icon-home"></i>
                <span class="title">داشبورد</span>
            </a>
        </li>
        @if(auth()->guard('admin')->user()->hasRole('super_admin'))
            <li class="@yield("admin.acl")">
                <a href="javascript:;">
                    <i class="icon-lock"></i>
                    <span class="title">سطوح دسترسی</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="@yield("admin.role.index")">
                        <a href="{{route('admin.role.index')}}">
                            <i class="icon-news"></i>
                            مدیریت نقش ها
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if(auth()->guard('admin')->user()->can('admin index'))
            <li class="@yield("admin.admin")">
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">مدیران</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    @if(auth()->guard('admin')->user()->can('admin index'))
                        <li class="@yield("admin.admin.index")">
                            <a href="{{route('admin.admin.index')}}">
                                <i class="icon-news"></i>
                                لیست مدیران
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('admin create'))
                        <li class="@yield("admin.admin.create") title">
                            <a href="{{route('admin.admin.create')}}">
                                <i class="icon-news"></i>
                                افزودن مدیر
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if(auth()->guard('admin')->user()->can('setting index'))
            <li class="@yield("admin.setting")">
                <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title">تنظیمات</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    @if(auth()->guard('admin')->user()->can('about edit'))
                        <li class="@yield("admin.about.edit")">
                            <a title="ویرایش متن درباره ما" href="{{route('admin.about.edit')}}">
                                <i class="icon-paper"></i>
                                درباره ما</a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('contact edit'))
                        <li class="@yield("admin.contact.edit")">
                            <a title="ویرایش اطلاعات تماس" href="{{route('admin.contact.edit')}}">
                                <i class="icon-paper"></i>
                                تماس با ما</a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('message index'))
                        <li class="@yield("admin.message.index")">
                            <a title="تیکت ها" href="{{route('admin.message.index')}}">
                                <i class="icon-paper"></i>
                                پیام های تماس با ما
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('faq index'))
                        <li class="@yield("admin.faq.index")">
                            <a href="{{route('admin.faq.index')}}">
                                <i class="icon-paper"></i>
                                سوالات متداول
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('profile index'))
                        <li class="@yield("admin.profile.index")">
                            <a href="{{route('admin.profile.index')}}">
                                <i class="icon-paper"></i>
                                پروفایل
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if(auth()->guard('admin')->user()->hasAnyPermission(['news index','news create']))
            <li class="@yield("admin.news")">
                <a href="javascript:;">
                    <i class="icon-speech"></i>
                    <span class="title">اخبار</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    @if(auth()->guard('admin')->user()->can('newsCategory index'))
                        <li class="@yield("admin.newsCategory.index")">
                            <a href="{{route('admin.newsCategory.index')}}">
                                <i class="icon-news"></i>
                                دسته بندی اخبار
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('news index'))
                        <li class="@yield("admin.news.index")">
                            <a href="{{route('admin.news.index')}}">
                                <i class="icon-news"></i>
                                لیست اخبار
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('news create'))
                        <li class="@yield("admin.news.create")">
                            <a href="{{route('admin.news.create')}}">
                                <i class="icon-news"></i>
                                افزودن خبر
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('newsletter index'))
                        <li class="@yield("admin.newsletter.index")">
                            <a href="{{route('admin.newsletter.index')}}">
                                <i class="icon-news"></i>
                                مدیریت خبرنامه ها
                            </a>
                        </li>
                    @endif

                </ul>

            </li>
        @endif
        @if(auth()->guard('admin')->user()->hasAnyPermission(['article index','article create']))
            <li class="@yield("admin.article")">
                <a href="javascript:;">
                    <i class="icon-docs"></i>
                    <span class="title">مقالات</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    @if(auth()->guard('admin')->user()->can('articleCategory index'))
                        <li class="@yield("admin.articleCategory.index")">
                            <a href="{{route('admin.articleCategory.index')}}">
                                <i class="icon-news"></i>
                                دسته بندی مقالات
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('article index'))
                        <li class="@yield("admin.article.index")">
                            <a href="{{route('admin.article.index')}}">
                                <i class="icon-news"></i>
                                لیست مقالات
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('article index'))
                        <li class="@yield("admin.article.create") title">
                            <a href="{{route('admin.article.create')}}">
                                <i class="icon-news"></i>
                                افزودن مقاله
                            </a>
                        </li>
                    @endif

                </ul>

            </li>
        @endif
        @if(auth()->guard('admin')->user()->can('slider index'))
            <li class="@yield("admin.slider")">
                <a href="javascript:;">
                    <i class="icon-picture"></i>
                    <span class="title">اسلایدر</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    @if(auth()->guard('admin')->user()->can('slider index'))
                        <li class="@yield("admin.slider.index")">
                            <a href="{{route('admin.slider.index')}}">
                                <i class="icon-news"></i>
                                لیست اسلایدرها
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('slider create'))
                        <li class="@yield("admin.slider.create") title">
                            <a href="{{route('admin.slider.create')}}">
                                <i class="icon-news"></i>
                                افزودن اسلایدر
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if(auth()->guard('admin')->user()->can('tag index'))
            <li class="@yield("admin.tag")">
                <a href="javascript:;">
                    <i class="icon-tag"></i>
                    <span class="title">برچسب ها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(auth()->guard('admin')->user()->can('tag index'))
                        <li class="@yield("admin.tag.index")">
                            <a href="{{route('admin.tag.index')}}">
                                <i class="icon-news"></i>
                                لیست برچسب ها
                            </a>
                        </li>
                    @endif
                    @if(auth()->guard('admin')->user()->can('tag create'))
                        <li class="@yield("admin.tag.create")">
                            <a href="{{route('admin.tag.create')}}">
                                <i class="icon-news"></i>
                                افزودن برچسب
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

    </ul>
</div>