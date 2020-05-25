@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="blog_slider">
        @foreach($topList as $topKey => $topValue)
            <div class="slide">
                <a href="{{ URL::route('blog.detail', [$topValue->url, $page, app()->getLocale()]) }}">
                    <div class="pic" style="background-image: url({{ $topValue->img }})"></div>
                    <div class="slide_content">
                        <div class="content_inner">
                            <div class="date_sort">
                                <div class="date">{{ str_replace('-', '.', $topValue->date) }}</div>
                                <div class="line"></div>
                                <div class="sort">{{ $topValue->blogcategory->blogcategorylang[0]->title }}</div>
                            </div>
                            <h3>{{ $topValue->bloglang[0]->title }}</h3>
                            <p>{{ $topValue->bloglang[0]->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach       
    </div>
    <div class="blog_list_wrapper page_block">
        <div class="block_inner">
            <div class="blog_search_form">
                <div class="row">
                <div class="grid g_6_12">
                    <div class="controls search_controls">
                    <input type="search" id="search">
                    <button type="button" onClick="get_blog('search')"><i class="icon_search"></i></button>
                    </div>
                </div>
                <div class="grid g_6_12">
                    <div class="select_wrapper">
                    <select id="category_select" onChange="get_blog('select')">
                        <option value="">All</option>                        
                        @foreach($blogCategoryList as $blogCategoryKey => $blogCategoryValue)
                            <option value="{{ $blogCategoryValue->Id }}">{{ $blogCategoryValue->blogcategorylang[0]->title }}</option>                        
                        @endforeach
                    </select>
                    </div>
                </div>
                </div>
            </div>
            <div class="blog_list">
                @for($i=0; $i < 12; $i++)
                    @if(isset($blogList[$i]))
                        <div class="item">
                            <a href="{{ URL::route('blog.detail', [$blogList[$i]->url, $page, app()->getLocale()]) }}">
                                <div class="thumb" style="background-image: url({{ $blogList[$i]->img }})">
                                    <img src="{{ URL::asset('frontend/images/size_3x2.png') }}">
                                </div>
                                <div class="text">
                                    <div class="date">{{ str_replace('-','.',$blogList[$i]->date) }}</div>
                                    <h3>{{ $blogList[$i]->bloglang[0]->title }}</h3>
                                    <div class="sort">{{ $blogList[$i]->blogcategory->blogcategorylang[0]->title }}</div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
    <div class="pager_navigation">
        <div class="pager_nav_inner">
            <a class="arrow prev" href="{{ URL::route('blog.index', [$page>1 ? $page-1 : 1, app()->getLocale()]) }}"><i class="arrow_prev"></i></a>
                @for($i=1;$i<=$totalpage;$i++)
                    <a {{ $i == $page ? 'class="current"' : '' }} href="{{ URL::route('blog.index', [$i,app()->getLocale()]) }}">{{ $i }}</a>
                @endfor
            <a class="arrow next" href="{{ URL::route('blog.index', [$page+1 >= $totalpage ? $totalpage : $page+1, app()->getLocale()]) }}"><i class="arrow_next"></i></a>
        </div>
    </div>
    @include('frontend.shared._contact')
</main>
@endsection

@section('script')
    <script>
    function get_blog($type){
        var category = '';
        var search = '';
        var langId = '{{$langId}}';
        category = $('#category_select').val();
        search = $('#search').val();
        $.ajax({
            url:"{{ URL::route('ajax.get_blog') }}",
            data:{search : search,category : category,langId : langId,_token : '{{ csrf_token() }}'},
            type:'post',
            dataType:'json',
            success:function(response){
                $('.blog_list').html('');
                $.each(response['blogList'],function(key,value){
                    if(value.bloglang.length !== 0){
                        $('.blog_list').append(
                            '<div class="item">'+
                                '<a href="https://www.bikonnect.com/blog_detail/' + value.url + '/{{ $page }}/{{ app()->getLocale() }}">'+
                                    '<div class="thumb" style="background-image: url('+value.img+')">'+
                                        '<img src="{{ URL::asset('frontend/images/size_3x2.png') }}">'+
                                    '</div>'+
                                    '<div class="text">'+
                                        '<div class="date">'+value.date.replace('-','.')+'</div>'+
                                        '<h3>'+value.bloglang[0].title+'</h3>'+
                                        '<div class="sort">'+value.blogcategory.blogcategorylang[0].title+'</div>'+
                                    '</div>'+
                                '</a>'+
                            '</div>'
                        );
                    }
                });
            }
        });
    }
    </script>
@endsection