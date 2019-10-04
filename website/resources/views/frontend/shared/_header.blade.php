<header id="header">
    <div class="header_inner"><a class="header_logo" href="{{ route('main.index') }}"><img class="retina" src="{{ URL::asset('frontend/images/logo.png') }}" alt="Bikonnect"></a>
        <nav class="header_nav">
        <ul>
            <li><a href="{{ route('main.solution') }}">{{ trans('lang.solution') }}</a></li>
            <li><a href="javascript:;">{{ trans('lang.products') }}</a>
                <ul>
                    @foreach($productList as $productKey => $productValue)
                        <li><a href="{{ route('main.product',$productValue->Id) }}">{{ $productValue->lang[0]->title }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ route('main.about') }}">{{ trans('lang.aboutus') }}</a></li>
            <li><a href="#contact">{{ trans('lang.contact') }}</a></li>
            <li><a href="javascript:;">{{ trans('lang.blog') }}</a></li>
        </ul>
        <div class="dropdown language">
            <div class="dropdown_head">ENGLISH</div>
            <div class="dropdown_list">
            <div class="item"><a class="active" href="javascript:;">English</a></div>
            <div class="item"><a href="javascript:;">中文</a></div>
            </div>
        </div>
        </nav><a id="btn_menu" href="javascript:;"><span></span></a>
    </div>
</header>