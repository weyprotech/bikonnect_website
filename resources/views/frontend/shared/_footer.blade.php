<footer id="footer">
<div class="block_inner">
        <div class="contact_info">
          <img
            class="retina"
            src="{{ URL::asset('frontend/images/logo_w.png') }}"
            alt="Bikonnect"
          >
          <div class="info_list">
            <div class="copyright">2020 ALL RIGHTS RESERVED. &nbsp;<a href="{{ route('main.privacy',app()->getLocale()) }}">Privacy Policy</a>&nbsp;| &nbsp; <a href="{{ route('main.term',app()->getLocale()) }}">TERMS AND CONDITIONS.</a></div>
          </div>
        </div>
        <div class="contact_map_right">
          <div class="contact_map">Solution
            <div class="copyright">
              <ul>
                @foreach($solutionList as $solutionKey => $solutionValue)
                  <li><a {{ stripos($_SERVER['REQUEST_URI'], $solutionValue->url) ? 'class=current' : ''}} href="{{ route('main.solution', [$solutionValue->url,app()->getLocale()]) }}">|
                    &nbsp;{{ $solutionValue->lang[0]->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="contact_map">Products
            <div class="copyright">
              <ul>
                @foreach($productList as $productKey => $productValue)
                  <li><a {{ stripos($_SERVER['REQUEST_URI'], $productValue->url) ? 'class=current' : ''}} href="{{ route('main.product', [$productValue->url, app()->getLocale()]) }}">|
                    &nbsp;{{ $productValue->lang[0]->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="contact_map"><a href="about.html">About US</a></div>
          <div class="contact_map"><a href="#contact">Contact</a></div>
          <div class="contact_map"><a href="blog.html">Blog</a></div>
        </div>
      </div>
</footer>