@extends('frontend.shared._layout',array('seoList' => array('en' => array('title' => 'Search','keyword' => '','description' => ''),'zh-TW' => array('title' => 'error','keyword' => '','description' => ''))))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="page_banner page_block in_solution">
        <div class="block_inner">
            <h1 class="block_title">Search Result</h1>
        </div>
    </div>
    <div class="blog_list_wrapper page_block">
        <div class="block_inner">
            <div class="blog_search_form">
                <div class="row">
                    <div class="grid g_12">
                        <div class="controls search_controls">
                            <form role="search" method="get" id="searchform1" class="search-form" action="{{ route('main.search', [app()->getLocale(),1]) }}">
                                @csrf
                                <input type="search" name="q" value="{{ $q }}">
                                <button type="submit"><i class="icon_search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="solution_help page_block">
                <div class="block_inner">
                    <h2 class="block_subtitle">Search String：{{ $q }}</h2>
                    <div id="search">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pager_navigation">
        <div class="pager_nav_inner">
            <!-- <a class="arrow prev" href="javascript:;"><i class="arrow_prev"></i></a>

        <a class="current" href="javascript:;">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a><a href="javascript:;">4</a><a
                href="javascript:;"
            >5</a><a
                class="arrow next"
                href="javascript:;"
            ><i class="arrow_next"></i></a> -->
        </div>
    </div>
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
  $.ajax({
    url:"https://www.googleapis.com/customsearch/v1?key=AIzaSyByvven5nhBqXsW-CC0qpUQXpGikhzjr_k&cx=b0bc2370b85667ab5&q={{$q}}&start={{($page-1)*10}}&num=10",
    dataType:'json',
    type:'get',
    success: function(response){
        console.log(response.searchInformation.totalResults);
        if(response.searchInformation.totalResults == 0){
            window.location = "{{ route('main.error') }}"
        }
        for(i=0;i<10;i++){
            if(response.items[i] != undefined){
                $('#search').append('<div class="search_list">'+
                                '<ul class="common_list">'+
                                    '<li><b>'+response.items[i].htmlTitle+'</b></li>'+
                                '</ul>'+
                                '<div class="search_text"'+(response.items[i].pagemap.cse_image != undefined ? ((response.items[i].pagemap.cse_image[0].src != "https://www.bikonnect.com/frontend/images/size_porduct_intro.png" && response.items[i].pagemap.cse_image[0].src != "https://bikonnect.com/frontend/images/size_porduct_intro.png") ? 'style="background:url('+response.items[i].pagemap.cse_image[0].src+')  no-repeat left; background-size: 60px;">' : 'style="background-size: 0px;padding-left:0px"') : 'style="background-size: 0px;padding-left:0px"')+
                                    response.items[i].htmlSnippet+
                                '</div>'+
                                '<a href="#">'+
                                    '<p><small><u>'+response.items[i].link+'</u></small></p>'+
                                '</a>'+
                            '</div>');

                }
            }

        var count = Math.ceil(response.searchInformation.totalResults/10);
        var page = '{{ $page }}';

        if(page!=1){
            $(".pager_nav_inner").append('<a class="arrow prev" href="{{ route('main.search', [app()->getLocale(),( $page-1)])."?q=$q" }}"><i class="arrow_prev"></i></a>');
        }
        for(i = 1;i<=count;i++){
            $(".pager_nav_inner").append('<a'+((page == i) ? ' class="current"' : '')+' href="{{ route('main.search', [app()->getLocale()]) }}/'+i+'?q={{$q}}">'+i+'</a>');
        }
        if(count > page){
            $(".pager_nav_inner").append('<a class="arrow next" href="{{ route('main.search', [app()->getLocale(),$page+1])."?q=$q" }}"><i class="arrow_next"></i></a>');
        }
    }
  })
  // var cx = '013085341302766272419:jv_-ew83yiw';
  // var gcse = document.createElement('script');
  // gcse.type = 'text/javascript';
  // gcse.async = true;
  // gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
  //   '//www.google.com/cse/cse.js?cx=' + cx;
  // var s = document.getElementsByTagName('script')[0];
  // s.parentNode.insertBefore(gcse, s);

})();

//等load完之後才計算數量
// window.addEventListener("load", function(event) {
//     var index= $(".gs-snippet");
//     console.log(index[0].innerHTML);

//     if(index[0].innerHTML == '無搜尋結果'){
//         window.location = "{{ route('main.error') }}"
//     }
// });

</script>
@endsection