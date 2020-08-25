<div id="sidebar">
    <div class="sidebar_logo"><a href="{{ route('main.index') }}"><img src="{{ URL::asset('frontend/images/logo.png') }}" alt="Bikonnect"></a></div>
    <nav class="sidebar_menu">
        <ul>
        <li><a {{ stripos($_SERVER['REQUEST_URI'], 'solution') ? 'class=current' : ''}} href="javascript:;">{{ trans('lang.solution') }}</a>
                  <ul>
                    <li><a href="{{ route('main.solution', app()->getLocale()) }}">{{ trans('lang.solution') }}</a></li>
                  </ul>
                </li>
            <li><a {{ stripos($_SERVER['REQUEST_URI'], 'product') ? 'class=current' : ''}} href="javascript:;">{{ trans('lang.products') }}</a>
                <ul>
                    @foreach($productList as $productKey => $productValue)
                    <li><a {{ stripos($_SERVER['REQUEST_URI'], $productValue->url) ? 'class=current' : ''}} href="{{ route('main.product', [$productValue->url, app()->getLocale()]) }}">{{ $productValue->lang[0]->title }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a {{ stripos($_SERVER['REQUEST_URI'], 'about') ? 'class=current' : ''}} href="{{ route('main.about', app()->getLocale()) }}">{{ trans('lang.aboutus') }}</a></li>
            <li><a href="#contact">{{ trans('lang.contact') }}</a></li>
            <li><a href="{{ URL::route('blog.index', [1, app()->getLocale()]) }}">{{ trans('lang.blog') }}</a></li>
        </ul>
        <div class="dropdown language">
            <div class="dropdown_head">{{app()->getLocale() == 'en' ? 'ENGLISH' : '中文'}}</div>
            <div class="dropdown_list">
                <div class="item"><a class="language_option {{app()->getLocale() == 'en' ? 'active' : ''}}" href="javascript:;" data-language="en">English</a></div>
                <div class="item"><a class="language_option {{app()->getLocale() == 'zh-tw' ? 'active' : ''}}" href="javascript:;" data-language="zh-tw">中文</a></div>
            </div>
        </div>
        <!--lightbox search btn-->
        <div class="blog_search_form m_20">
            <div class="row">
            <div class="grid g_6_12">
                <div
                class="controls search_controls"
                data-featherlight="#fl2"
                data-featherlight-variant="fixwidth"
                >
                <input type="search">
                <button><i class="icon_search"></i></button>
                </div>
            </div>
            </div>
        </div>
    </nav>
</div>