@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="breadcrumbs">
        <div class="breadcrumbs_inner">
            <a href="{{ URL::route('blog.index',[$page,app()->getLocale()]) }}">Blog</a>
            <span class="arr"> /</span>
            <span class="current">{{ $blog->bloglang[0]->title }}</span>
        </div>
    </div>
    <div class="blog_container page_block">
        <div class="block_inner">
            <div class="contain_main">
                <div class="blog_detail">
                    <h1 class="detail_title">{{ $blog->bloglang[0]->title }}</h1>
                    <div class="info_share">
                        <div class="info">
                            <div class="date">{{ $blog->date }}</div>
                            <div class="line"></div>
                            <div class="sort">{{ $blog->blogcategory->blogcategorylang[0]->title }}</div>
                        </div>
                        <div class="share_links">
                            <a class="facebook" href="javascript:;" target="_blank"><i class="icon_share_facebook"></i></a>
                            <a class="line" href="javascript:;" target="_blank"><i class="icon_share_line"></i></a>
                        </div>
                    </div>
                    <div class="detail_content">
                        {!!  html_entity_decode($blog->bloglang[0]->content) !!}
                    </div>
                </div>
                <div class="blog_message">
                    <div class="message_form">
                        <a class="form_toggle" href="javascript:;"><i class="icon_message"></i>
                            <h2>Write a resonse...</h2>
                        </a>                   
                        <div class="form_main">
                            <form method="post" action="{{ URL::route('blog.detail',[$blog->Id,$page]) }}">
                                @csrf
                                <div class="controls_wrapper">
                                    <div class="controls_group">
                                        <label>Name</label>
                                        <div class="controls">
                                            <input type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="controls_group">
                                        <label>Message</label>
                                        <div class="controls">
                                            <textarea name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="call_action">
                                        <button class="btn_submit" type="submit">Sumbit</button>
                                    </div>
                                </div>
                            </form>                                
                        </div>
                    </div>
                    <div class="message_responses">
                        <a class="responses_toggle" href="javascript:;">{{ $commentCount }} responses</a>            
                        <div class="responses_items">
                            @foreach($blog->blogcomment as $commentKey => $commentValue)
                            <div class="item">
                                <div class="response">
                                    <div class="name_date">
                                        <div class="name">{{ $commentValue->name }}</div>
                                        <div class="date">{{ str_replace('-','.',$commentValue->date) }}</div>
                                    </div>
                                    <div class="message_text">{{ $commentValue->message }}</div>
                                </div>
                                @if(!empty($commentValue->response))
                                    <div class="reply">
                                        <div class="info">Bikonnect Reply &nbsp; | &nbsp; {{ $commentValue->response_date }}</div>
                                        <div class="message_text">{{ $commentValue->response }}</div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="contain_aside">
                <div class="blog_aside">
                    <h2>Other Articles</h2>
                    <div class="blog_aside_items">
                        @foreach($related_blog as $relatedKey => $relatedValue)
                            <div class="item">
                                <a href="{{ URL::route('blog.detail',[$relatedValue->Id,$page,app()->getLocale()]) }}">
                                    <div class="thumb" style="background-image: url({{ $relatedValue->img }});">
                                        <img src="{{ URL::asset('frontend/images/size_3x2.png') }}">
                                    </div>
                                    <div class="text">
                                        <h3>{{ $relatedValue->bloglang[0]->title }}</h3>
                                        <div class="sort">{{ $relatedValue->blogcategory->blogcategorylang[0]->title }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach                    
                    </div>
                </div>
                <div id="pageButton">
                    <a id="backTop" href="javascript:;">
                        <img src="{{ URL::asset('frontend/images/arrow_backTop.png') }}"><span>Top</span>
                    </a>
                    <a id="backPrev" href="{{ URL::route('blog.index',[$page,app()->getLocale()]) }}">
                        <img src="{{ URL::asset('frontend/images/arrow_backPrev.png') }}"><span>Back</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.shared._contact')        
</main>
@endsection

@section('script')

@endsection