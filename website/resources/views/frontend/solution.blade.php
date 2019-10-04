@extends('frontend.shared._layout')

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="page_banner page_block in_solution">
        <div class="block_inner">
        <h1 class="block_title">E-Bike Data Service Solution</h1>
        </div>
    </div>
    <div class="solution_introduction page_block">
        <div class="block_inner">
            <div class="image_video">
                <iframe width="560" height="315" src="{{ $videoList[0]->lang[0]->youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="text">
                {{$videoList[0]->lang[0]->content}}
            </div>
        </div>
    </div>
    <div class="divide_line"><img src="{{ URL::asset('frontend/images/bg_line.png') }}" alt=""></div>
    @foreach($contentList as $contentKey => $contentValue)
        <div class="solution_help page_block">
            <div class="block_inner">
            <h2 class="block_subtitle">{{ $contentValue->lang[0]->title }}</h2>
            <div class="pic_text">
                <div class="pic"><img src="{{ $contentValue->lang[0]->img }}" alt="{{ $contentValue->lang[0]->title }}"></div>
                <div class="text">
                <ul class="common_list">
                   {{{!! $contentValue->lang[0]->content !!}}}
                </ul>
                </div>
            </div>
            </div>
        </div>
    @endforeach
    <div class="solution_cyclists_operators page_block">
        <div class="block_inner">
        <div class="content_block cyclists">
            <h2 class="block_subtitle">Cyclists</h2>
            <div class="table">
            @for($i=0;$i<=1;$i++)
                <div class="tr">
                    <div class="th">{{ $aspectList[$i]->lang[0]->title }}</div>
                    <div class="td">{{ $aspectList[$i]->lang[0]->content }}</div>
                </div>
            @endfor
            </div>
        </div>
        <div class="content_block operators">
            <h2 class="block_subtitle">Operators</h2>
            <div class="table">
                @for($i=2;$i<5;$i++)
                    <div class="tr">
                        <div class="th">{{ $aspectList[$i]->lang[0]->title }}</div>
                        <div class="td">{{ $aspectList[$i]->lang[0]->content }}</div>
                    </div>
                @endfor            
            </div>
        </div>
        </div>
    </div>
    <div class="solution_keyFeatures page_block">
        <div class="block_inner">
        <div class="content_block">
            <h2 class="block_subtitle">Key Features</h2>
                <div class="keyFeature_slider">
                @foreach($productList as $productKey => $productValue)
                    <div class="slide">
                        <div class="pic_text">
                        <div class="pic">
                            <div class="img" style="background-image: url({{ URL::asset('frontend/images/img_solution_keyFeatures01.jpg') }});" alt="Key Features 01"></div>
                        </div>
                        <div class="text">
                            <h3>{{ $productValue->lang[0]->title }}</h3>
                            <p>{{ $productValue->lang[0]->content_4 }}</p>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
    @include('frontend.shared._contact')
</main>
@endsection

@section('script')

@endsection