<header id="header">
    <div class="header_inner"><a class="header_logo" href="{{ route('main.index',app()->getLocale()) }}"><img class="retina" src="{{ URL::asset('frontend/images/logo.png') }}" alt="Bikonnect"></a>
        <nav class="header_nav">
            <ul>
                <li><a {{ stripos($_SERVER['REQUEST_URI'], 'solution') ? 'class=current' : ''}} href="javascript:;">{{ trans('lang.solution') }}</a>
                  <ul>
                      @foreach($solutionList as $solutionKey => $solutionValue)
                        <li><a {{ stripos($_SERVER['REQUEST_URI'], $solutionValue->url) ? 'class=current' : ''}} href="{{ route('main.solution', [$solutionValue->url,app()->getLocale()]) }}">{{ $solutionValue->lang[0]->title }}</a></li>
                      @endforeach
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
            <button><i class="icon_search" data-featherlight="#fl2" data-featherlight-variant="fixwidth"></i></button>
        </nav>        
        <!--lightbox search-->
        <div class="lightbox" id="fl2">
          <div class="blog_search_form">
            <div class="row">
              <div class="">
                <div class="controls search_controls">
                  <form role="search" method="get" id="searchform1" class="search-form" action="{{ route('main.search', [app()->getLocale(),1]) }}">
                    <!-- <input type="hidden" name="cx" value="cb4f830c52fc9dbfd"/> -->
                    <input type="search" name="q"  size="31" value="" class="csetext">
                    <button type="submit"><i class="icon_search"></i></button>            
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><a id="btn_menu" href="javascript:;"><span></span></a>
    </div>
</header>