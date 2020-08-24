<footer id="footer">
<div class="block_inner">
        <div class="contact_info">
          <img
            class="retina"
            src="{{ URL::asset('frontend/images/logo_w.png') }}"
            alt="Bikonnect"
          >
          <div class="info_list">           
            <div class="copyright">2019 ALL RIGHTS RESERVED. &nbsp;<a href="{{ route('main.privacy',app()->getLocale()) }}">Privacy
                &nbsp;|
                &nbsp;Polity</a>.
            </div>
          </div>
        </div>
        <div class="contact_map_right">
          <div class="contact_map">{{ trans('lang.solution') }}
            <div class="copyright">
              <ul>
                @foreach($solutionList as $solutionKey => $solutionValue)
                  <li><a {{ stripos($_SERVER['REQUEST_URI'], $solutionValue->url) ? 'class=current' : ''}} href="{{ route('main.solution', [$solutionValue->url,app()->getLocale()]) }}">|
                    &nbsp;{{ $solutionValue->lang[0]->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="contact_map">{{ trans('lang.products') }}
            <div class="copyright">
              <ul>
                @foreach($productList as $productKey => $productValue)
                  <li><a {{ stripos($_SERVER['REQUEST_URI'], $productValue->url) ? 'class=current' : ''}} href="{{ route('main.product', [$productValue->url, app()->getLocale()]) }}">|
                    &nbsp;{{ $productValue->lang[0]->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="contact_map"><a href="{{ route('main.about', app()->getLocale()) }}">{{ trans('lang.aboutus') }}</a></div>
          <div class="contact_map"><a href="#contact">{{ trans('lang.contact') }}</a></div>
          <div class="contact_map"><a href="{{ URL::route('blog.index', [1, app()->getLocale()]) }}">{{ trans('lang.blog') }}</a></div>
        </div>
      </div>
</footer>