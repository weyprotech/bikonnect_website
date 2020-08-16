@extends('frontend.shared._layout',array('seoList' => array('en' => array('title' => 'Search','keyword' => '','description' => ''),'zh-TW' => array('title' => 'error','keyword' => '','description' => ''))))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
<div id="results"></div>
</main>
@endsection

@section('script')
<script>
   const myInitCallback = function() {
    var element = google.search.cse.element.render({gname:'gsearch', div:'results', tag:'searchresults-only', attributes:{linkTarget:''}});
  google.search.cse.element.getElement('gsearch');
  element.execute('{{$q}}');
    
};
window.__gcse = {
  parsetags: 'explicit',
  initializationCallback: myInitCallback
};

(function() {
  var cx = '013085341302766272419:jv_-ew83yiw';
  var gcse = document.createElement('script');
  gcse.type = 'text/javascript';
  gcse.async = true;
  gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
    '//www.google.com/cse/cse.js?cx=' + cx;
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(gcse, s);

})();

//等load完之後才計算數量
window.addEventListener("load", function(event) {
    var index= $(".gs-snippet");
    console.log(index[0].innerHTML);

    if(index[0].innerHTML == '無搜尋結果'){
        window.location = "{{ route('main.error') }}"
    }
});

</script>
@endsection