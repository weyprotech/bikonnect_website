@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="page_banner page_block in_solution">
        <div class="block_inner">
        <h1 class="block_title">{{ trans('lang.solutiontitle') }}</h1>
        </div>
    </div>
    <div class="solution_introduction page_block">
        <div class="block_inner">
            <div class="image_video">
                <iframe width="560" height="315" src="{{ $videoList[0]->lang[0]->youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="text">
                {!! nl2br($videoList[0]->lang[0]->content) !!}
            </div>
        </div>
    </div>

    <div class="divide_line"><img src="{{ URL::asset('frontend/images/bg_line.png') }}" alt=""></div>

    <?php
    $k = 1;
    ?>
    @foreach($contentList as $contentKey => $contentValue)
    <div class="<?=($k%2==0)?"solution_keyAdvantages":"solution_help"?> page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">{{ $contentValue->lang[0]->title }}</h2>
        <div class="pic_text">
            <div class="pic"><img src="{{ $contentValue->lang[0]->img }}" alt="{{ $contentValue->lang[0]->title }}"></div>
            <div class="text">
            {!!  html_entity_decode($contentValue->lang[0]->content) !!}
            </div>
        </div>
        </div>
    </div>
        <?php
        $k++;
        ?>
    @endforeach

    <div class="solution_application page_block">
        <div class="block_inner">
            <h2 class="block_subtitle">{{ trans('lang.applicationrange') }}</h2>
            <div class="application_items">
                <div class="item"><img src="{{ URL::asset('frontend/images/icon_app01.png') }}" alt="Application Range 01"><span>{!! trans('lang.ar1') !!}</span></div>
                <div class="item"><img src="{{ URL::asset('frontend/images/icon_app02.png') }}" alt="Application Range 02"><span>{!! trans('lang.ar2') !!}</span></div>
                <div class="item"><img src="{{ URL::asset('frontend/images/icon_app03.png') }}" alt="Application Range 03"><span>{!! trans('lang.ar3') !!}</span></div>
                <div class="item"><img src="{{ URL::asset('frontend/images/icon_app04.png') }}" alt="Application Range 04"><span>{!! trans('lang.ar4') !!}</span></div>
                <div class="item"><img src="{{ URL::asset('frontend/images/icon_app05.png') }}" alt="Application Range 05"><span>{!! trans('lang.ar5') !!}</span></div>
            </div>
        </div>
    </div>

    <div class="solution_cyclists_operators page_block">
        <div class="block_inner">
        <div class="content_block cyclists">
            <h2 class="block_subtitle">{{ trans('lang.cyclists') }}</h2>
            <div class="table">
                @foreach($aspectList as $aspectValue)  
                    @if($aspectValue->category == 0)              
                        <div class="tr">
                            <div class="th">{{ $aspectValue->lang[0]->title }}</div>
                            <div class="td">{{ $aspectValue->lang[0]->content }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="content_block operators">
            <h2 class="block_subtitle">{{ trans('lang.operators') }}</h2>
            <div class="table">
                @foreach($aspectList as $aspectValue)
                    @if($aspectValue->category == 1)
                        <div class="tr">
                            <div class="th">{{ $aspectValue->lang[0]->title }}</div>
                            <div class="td">{{ $aspectValue->lang[0]->content }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    </div>

    <div class="solution_keyFeatures page_block">
        <div class="block_inner">
            <div class="content_block">
                <h2 class="block_subtitle">{{ trans('lang.keyfeatures') }}</h2>
                <div class="keyFeature_slider">
                    @foreach($productList as $productKey => $productValue)
                    <div class="slide">
                        <div class="pic_text">
                        <div class="pic">
                            <div class="img" style="background-image: url({{ URL::asset($productValue->lang[0]->img_5) }});" alt="{{ $productValue->lang[0]->title }}"></div>
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