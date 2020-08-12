<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>{{ $seoList[app()->getLocale()]['title'] }}</title>
  <meta name="KeyWords" content="{{ $seoList[app()->getLocale()]['keyword'] }}">
  <meta name="Description" content="{{ $seoList[app()->getLocale()]['description'] }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--wow.js-->
  <link rel="stylesheet" href="{{ URL::asset('frontend/styles/animate.css') }}">
  <script src="{{ URL::asset('frontend/scripts/wow.min.js') }}"></script>

  @include('frontend.shared._css')
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-KH99CNK');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body>
  <!--[if lt IE 10]>
    <div class="old_browser">
      <div class="old_browser_inner">
        <div class="oops">OOPS!</div>
        <div class="oops_title">您的瀏覽器版本太舊了！</div>
        <p>請更新至 Internet Explorer 10 以上版本或選用更現代化的瀏覽器，<br><br>使用老舊版本的瀏覽器瀏覽本網站將可能有無法預測的錯誤，請儘快更新。<br><br>微軟已於2016年起停止IE8 (含)以下版本之Windows安全更新（<a href="http://windows.microsoft.com/zh-tw/windows/end-support-help" target="_blank">微軟 終止支援公告</a>），<br>為了您的個資安全、瀏覽流暢度與享受更多網站互動體驗，建議您立即升級瀏覽器。</p>
        <table>
          <caption>&gt;&gt; 建議您更新或使用以下瀏覽器</caption>
          <tr>
            <td><a href="http://windows.microsoft.com/zh-tw/internet-explorer/download-ie" target="_blank"><img src="images/browser/ie.png" alt="IE"><span>IE</span></a></td>
            <td><a href="http://www.google.com/chrome/" target="_blank"><img src="images/browser/chrome.png" alt="Chrome"><span>Chrome</span></a></td>
            <td><a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank"><img src="images/browser/firefox.png" alt="Firefox"><span>Firefox</span></a></td>
            <td><a href="https://www.opera.com/zh-tw/download?os=windows" target="_blank"><img src="images/browser/opera.png" alt="Opera"><span>Opera</span></a></td>
          </tr>
        </table>
        <p>2019 ALL RIGHTS RESERVED. <a href="javascript:;">Privacy &nbsp;| &nbsp;Polity</a>.</p>
      </div>
    </div><![endif]-->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KH99CNK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="wrapper">
    @include('frontend.shared._header',['productList' => $productList])

    @yield('content')

    @include('frontend.shared._footer')
  </div>
  @include('frontend.shared._sidebar')
  @include('frontend.shared._script')
  @yield('script')
</body>

</html>