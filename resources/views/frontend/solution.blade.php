@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('title', 'Bikonnect')

@section('content')

<main id="main">
    <div class="page_banner page_block in_solution">
        <div class="block_inner">
            <h1 class="block_title">{{ $solution->lang[0]->title }}</h1>
        </div>
    </div>
    <div class="solution_introduction page_block">
        <div class="block_inner">
            <div class="image_video">
            {!! $solution->lang[0]->video_youtube !!}
            </div>
            <div class="contact_m"><a class="btn_download" href="{{ $solution->lang[0]->dm_file }}"  download="{{ $solution->lang[0]->title }}"><i class="icon_download"></i>Download</a></div>
            <div class="text">
                {!! nl2br($solution->lang[0]->video_content) !!}
            </div>
        </div>
    </div>

    <!-- <div class="divide_line"><img src="{{ secure_asset('frontend/images/bg_line.png') }}" alt=""></div> -->
    <div class="divide_line"><img src="{{ URL::asset('frontend/images/bg_line.png') }}" alt=""></div>

    <?php
    $k = 1;
    ?>
    <div class="solution_help page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">{{ $solution->lang[0]->content_title_1 }}</h2>
        <div class="pic_text">
            <div class="pic"><img src="{{ $solution->lang[0]->content_img_1 }}" alt="{{ $solution->lang[0]->content_title_1 }}"></div>
            <div class="text">
            {!!  html_entity_decode($solution->lang[0]->content_content_1) !!}
            </div>
        </div>
        </div>
    </div>

    <div class="<?=($k%2==0) ? "solution_help":"solution_keyAdvantages"?> page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">{{ $solution->lang[0]->content_title_2 }}</h2>
        <div class="pic_text">
            <div class="pic"><img src="{{ $solution->lang[0]->content_img_2 }}" alt="{{ $solution->lang[0]->content_title_2 }}"></div>
            <div class="text">
            {!!  html_entity_decode($solution->lang[0]->content_content_2) !!}
            </div>
        </div>
        </div>
    </div>


    <div class="solution_application page_block">
        <div class="block_inner">
            <h2 class="block_subtitle">{{ trans('lang.applicationrange') }}</h2>
            <div class="application_items">
                @if(!empty($applicationList))
                    @foreach ($applicationList as $applicationKey => $applicationValue)
                        <div class="item"><img src="{{ URL::asset($applicationValue->lang[0]->img) }}" alt="{{ $applicationValue->lang[0]->content }}"><span>{!! nl2br(e($applicationValue->lang[0]->content))  !!}</span></div>                    
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="solution_service page_block">
        <div class="block_inner">
            <h2 class="block_subtitle">{{ $solution->lang[0]->service_title }}</h2>
            <div class="solution_service_content"><img src="{{ URL::asset($solution->lang[0]->service_img) }}" alt="{{ $solution->lang[0]->title }}"></div>
        </div>
      </div>
    <div class="solution_cyclists_operators page_block">
        <?php $i = 1; ?>
        @foreach($aspeccategorytList as $aspeccategorytKey => $aspeccategorytValue)
        {!! $i % 2 == 1 ? '<div class="block_inner">' : '' !!}
            <div class="content_block {{ $i % 2 == 0 ? 'operators' : 'cyclists' }}">
                <h2 class="block_subtitle">{{ $aspeccategorytValue->lang[0]->title }}</h2>
                <div class="table">
                    @if(!empty($aspectList))
                        @foreach($aspectList as $aspectValue)            
                            <div class="tr">
                                <div class="th">{{ $aspectValue->lang[0]->title }}</div>
                                <div class="td">{{ $aspectValue->lang[0]->content }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>               
        {!! ($i % 2 == 0) || ($aspeccategorytKey == $aaspeccategoryCount - 1) ? '</div>' : '' !!}
        <?php $i++; ?>
        @endforeach
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
                            <!-- <div class="img" style="background-image: url({{ secure_asset($productValue->lang[0]->img_5) }});" alt="{{ $productValue->lang[0]->title }}"></div> -->
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