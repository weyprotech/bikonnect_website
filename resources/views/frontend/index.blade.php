@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('content')
<main id="main">
    <div class="index_banner_slider">
        <div class="slider">
        @foreach($bannerList as $bannerKey => $bannerValue)
            <div class="slide">
                <!-- <div class="bg" style="background-image: url({{ secure_asset($bannerValue->bannerImg) }});"></div> -->
                <div class="bg" style="background-image: url({{ URL::asset($bannerValue->bannerImg) }});"></div>

                <div class="slide_content">
                    <h2>{!! nl2br(e($bannerValue->bannerlang[0]->title)) !!}</h2>
                </div>
                <div class="slide_content_btn">
                    <a class="btn_more big" href="{{ $learnmore->learnmorelang[0]->main_href }}">{{ $learnmore->learnmorelang[0]->main_title }}</a>
                </div>            
            </div>
        @endforeach        
        </div>
        <div class="slider_dots"></div>
    </div>
    <div class="index_experience page_block">
        <div class="wave"><img src="{{ URL::asset('frontend/images/img_wave.png') }}" alt=""></div>
        <div class="block_inner">
            <div class="wow fadeInDown">
                <h2 class="block_title">{!! nl2br(e($content1->content1lang[0]->title)) !!}</h2>
            </div>
            <div class="text wow fadeInUp">
                <p>{!! nl2br(e($content1->content1lang[0]->content)) !!}</p>
            </div>
            <div class="experience_items">
                @foreach($content2List as $content2Key => $content2Value)
                    <div class="item">
                        <!-- <a href="{{ route('main.product', [$content2Value->product->url, app()->getLocale()]) }}"><img class="thumb" src="{{ secure_asset($content2Value->Img) }}" alt="{{ $content2Value->content2lang[0]->title }}"> -->
                        <a href="{{ route('main.product', [$content2Value->product->url, app()->getLocale()]) }}"><img class="thumb" src="{{ URL::asset($content2Value->Img) }}" alt="{{ $content2Value->content2lang[0]->title }}">
                            <h3>{{ $content2Value->content2lang[0]->title }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="index_strength page_block">
        <div class="block_inner proportion">
            <h2 class="block_title">{{ trans('lang.ourstrength') }}</h2>
            <div class="strength_content">
                <div class="strength_sliders">
                    <div class="item">
                        <!-- <div class="mobile_img"><img src="{{ secure_asset('frontend/images/img_index_strength_m01.png') }}" alt="Strangth Mobile Picture 01"></div> -->
                        <div class="mobile_img"><img src="{{ URL::asset('frontend/images/img_index_strength_m01.png') }}" alt="Strangth Mobile Picture 01"></div>
                        <div class="slider">
                        @foreach($content3List as $content3Key => $content3Value)
                            <div class="slide">
                                <div class="slide_inner">                        
                                <h3>{!! nl2br(e($content3Value->content3lang[0]->title)) !!}</h3>
                                <hr>
                                <p>{!! nl2br(e($content3Value->content3lang[0]->content)) !!}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="item">
                        <div class="mobile_img"><img src="{{ URL::asset('frontend/images/img_index_strength_m02.png') }}" alt="Strangth Mobile Picture 02"></div>
                        <div class="slider">
                            <div class="slide">
                                <div class="slide_inner">
                                    <h3>{{ trans('lang.businessstrategy') }}</h3>
                                    <hr>
                                    <p>{{ trans('lang.businessstrategycontent') }}</p>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide_inner">
                                    <h3>{{ trans('lang.businessstrategy') }}</h3>
                                    <hr>
                                    <p>{{ trans('lang.businessstrategycontent') }}</p>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide_inner">
                                    <h3>{{ trans('lang.businessstrategy') }}</h3>
                                    <hr>
                                    <p>{{ trans('lang.businessstrategycontent') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="strength_animation">
                    <div class="img">
                        <svg id="strengthSVG" width="1920px" height="1390px" viewbox="0 0 1920 1390" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <rect id="path" x="0" y="0" width="1920" height="1390"></rect>
                        </defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <mask id="mask" fill="white">
                            <use xlink:href="#path"></use>
                            </mask>
                            <use fill="#002855" xlink:href="#path"></use>
                            <g mask="url(#mask)" transform="translate(100.000000, -77.000000)">
                            <path data-duration="80" d="M1665.74135,1020.9529 C1609.9631,914.14307 1508.3933,832.371367 1380.65488,805.840932 C1262.02272,781.122043 1144.33068,809.021758 1051.84202,873.551918 C985.920949,909.46071 861.43294,963.878953 745.192857,940.566138 C745.192857,940.566138 611.264427,926.650377 480.273191,752.324982 C422.169232,657.960111 327.065947,586.788329 209.584451,562.381158 C102.755929,540.201581 -3.36581267,560.549506 -91.0054022,611.877116" stroke="#FFFFFF" stroke-width="5" transform="translate(787.367975, 787.221006) rotate(-45.000000) translate(-787.367975, -787.221006) "></path>
                            <g stroke="none" stroke-width="1" fill-rule="evenodd" transform="translate(22.666667, 298.333333)">
                                <path data-async data-duration="5" d="M2.24858592,978.571839 C4.08070467,986.430527 6.6405578,988.246361 9.9281453,984.019342 C13.2157328,979.792324 17.3345828,974.406161 22.2846953,967.860855" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" transform="translate(12.266641, 977.048910) scale(1, -1) rotate(197.000000) translate(-12.266641, -977.048910) "></path>
                                <circle fill="#00AEC7" cx="1506.6624" cy="18.6624" r="18.6624"></circle>
                                <circle fill="#FFFFFF" cx="953.329067" cy="507.995733" r="18.6624"></circle>
                                <circle fill="#0078FF" cx="1197.32907" cy="81.3290667" r="18.6624"></circle>
                                <path data-async data-duration="5" d="M1535.42697,23.0906505 C1537.25909,30.949338 1539.81894,32.7651724 1543.10653,28.5381537 C1546.39412,24.3111349 1550.51297,18.9249724 1555.46308,12.3796662" stroke="#FFFFFF" stroke-width="3.1104" stroke-linecap="round" transform="translate(1545.445026, 21.567721) scale(-1, -1) rotate(129.000000) translate(-1545.445026, -21.567721) "></path>
                            </g>
                            </g>
                        </g>
                        </svg><img id="strengthIMG" src="{{ URL::asset('frontend/images/img_index_strength.png') }}" alt="strength">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="index_solutions page_block" style="background-image: url({{ $content4->Img }});">
        <div class="block_inner proportion">
            <div class="block_content">
                <h2 class="block_title wow fadeInDown">{!! nl2br(e($content4->content4lang[0]->title)) !!}</h2>
                <h3 class="block_subtitle wow fadeInUp">{!! nl2br(e($content4->content4lang[0]->description)) !!}</h3>
                <div class="text wow fadeInUp">
                <p>{!! nl2br(e($content4->content4lang[0]->content)) !!}</p>
                </div>
                <a class="btn_more green wow fadeInUp" href="{{ $learnmore->learnmorelang[0]->solution_href }}">{{ $learnmore->learnmorelang[0]->solution_title }}</a>
            </div>
            <div class="block_img"><img src="{{ URL::asset('frontend/images/img_index_solutions.png') }}" alt="Smart Solutions Picture"></div>
        </div>
    </div>
    <div class="partners_supporters page_block">
        <div class="block_inner">
            <h2 class="block_title">{{ trans('lang.ourpartner') }}</h2>
            <div class="partners_items">
                @foreach($partnerList as $partnerKey => $partnerValue)
                    <!--↓ 圖片建議尺寸 寬:230px以下 高:70px ↓-->                
                    <div class="item"><img src="{{ $partnerValue->img }}" alt="{{ $partnerValue->lang[0]->title }}"></div>
                @endforeach
                <!--↑ 圖片建議尺寸 寬:230px以下 高:70px ↑-->
            </div>
        </div>
    </div>
    <div class="index_vision page_block">
        <div class="bg"></div>
        <div class="block_inner proportion">
        <div class="vision_content">
            <h2 class="block_title wow fadeInDown">{{ trans('lang.ourvision') }}</h2>
            <h3 class="block_subtitle wow fadeInUp">{{ trans('lang.ourvisioncontent') }}</h3>
            <div class="text">
            <!-- p Nam porttitor blandit accumsan. Ut vel dictum sem, a pretium dui.-->
            </div><a class="btn_more wow fadeInUp" href="{{ $learnmore->learnmorelang[0]->vision_href }}">{{ $learnmore->learnmorelang[0]->vision_title }}</a>
        </div>
        </div>
    </div>
    @include('frontend.shared._contact',array('contact' => $contact))
</main>
@endsection

@section('script')

@endsection