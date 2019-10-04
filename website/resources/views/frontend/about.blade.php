@extends('frontend.shared._layout')

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="page_banner page_block in_about">
        <div class="block_inner">
        <img class="about_logo" src="{{ URL::asset('frontend/images/logo_about.png') }}" alt="Micro Program x Bikonnect"></div>
    </div>    
    <div class="about_introduction page_block">
        <div class="block_inner">
            <div class="pic_text">
                <div class="pic"><img src="{{ $contentList[0]->lang[0]->img }}" alt="About Introduction"></div>
                <div class="text">
                <h2 class="block_subtitle">{{ $contentList[0]->lang[0]->title }}</h2>
                <p>{{ $contentList[0]->lang[0]->content }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="divide_line"><img src="images/bg_line2.png" alt=""></div>
    <div class="bikonnect_introduction page_block">
        <div class="block_inner">
        <div class="pic_text">
            <div class="pic"><img src="{{ $contentList[1]->lang[0]->img }}" alt="Bikonnect Introduction"></div>
            <div class="text">
                <h2 class="block_subtitle">{{ $contentList[0]->lang[0]->title }}</h2>
                <p>{{ $contentList[0]->lang[0]->content }}</p>
            </div>
        </div>
        </div>
    </div>
    <div class="about_intervalImg"><img src="{{ URL::asset('frontend/images/img_about_interval.jpg') }}" alt="Bike"></div>
    <div class="about_timeline page_block">
        <div class="block_inner">
            <div class="timeline_header">
                <h2 class="block_subtitle">{{ trans('lang.businesstimeline') }}</h2>
                <div id="timeline_years"><img class="bg" src="{{ URL::asset('frontend/images/bg_timeline_years.png') }}" alt="Years Background"><span>2016 - 2020</span></div>
                <div id="timeline_arrows"></div>
            </div>
            <div id="timeline_slider">
                    @foreach($historyList as $historyKey => $historyValue)
                    <div class="slide" data-years="{{ $historyValue->lang[0]->year }}">
                        <h3>{{ $historyValue->lang[0]->title }}</h3>
                        <ul>
                            {!! $historyValue->lang[0]->content !!}
                        </ul>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
    <div class="about_team page_block">
        <div class="block_inner">
            <h2 class="block_subtitle">{{ trans('lang.team') }}</h2>
            <div class="team_intro">
                @foreach($teamList as $teamKey => $teamValue)
                <div class="item">
                    <div class="info">
                        <div class="info_pic"><img src="{{ $teamValue->img }}" alt="{{ $teamValue->lang[0]->name }}"></div>
                        <div class="info_content">
                            <h3>{{ $teamValue->lang[0]->name }}</h3>
                            <h4>{{ $teamValue->lang[0]->title }}</h4>
                            <hr>
                            <p>{{$teamValue->lang[0]->content}}</p>
                        </div>
                    </div>
                    <div class="name_jobTitle">
                        <h3 class="info_name">{{ $teamValue->lang[0]->name }}</h3>
                        <hr class="divide_line">
                        <h4 class="job_title">{{ $teamValue->lang[0]->title }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="partners_supporters page_block in_about">
        <div class="block_inner">
            <h2 class="block_subtitle">{{ trans('lang.ourpartner') }}</h2>
            <div class="partners_items">
                @foreach($partnerList as $partnerKey => $partnerValue)
                <!--↓ 圖片建議尺寸 寬:230px以下 高:70px ↓-->                
                <div class="item"><img src="{{ $partnerValue->img }}" alt="{{ $partnerValue->lang[0]->title }}"></div>
                <!--↑ 圖片建議尺寸 寬:230px以下 高:70px ↑-->
                @endforeach
            </div>
        </div>
    </div>
    @include('frontend.shared._contact')
</main>
@endsection

@section('script')

@endsection