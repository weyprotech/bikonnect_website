@extends('frontend.shared._layout',array('seoList' => $seoList))

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="product_introduction page_block">
        <div class="block_inner proportion">
        <div class="block_content">
            <h1 class="block_title">{{ $product->lang[0]->title_1 }}</h1>
            <div class="text">
                <p>{!! nl2br(e($product->lang[0]->content_1)) !!}</p>
            </div>
        </div>
        <div class="block_img"><img src="{{ $product->lang[0]->img_1 }}" alt=""></div>
        </div>
    </div>
    <div class="product_characteristic page_block">
        <div class="wave top"><img src="{{ URL::asset('frontend/images/product_char_wave_top.png') }}" alt=""></div>
        <div class="block_inner proportion">
        <div class="block_content">
            <h2 class="block_subtitle">{!! nl2br(e($product->lang[0]->title_2)) !!}</h2>
            <div class="text">
            <p>{!! nl2br(e($product->lang[0]->content_2)) !!}</p>
            </div>
        </div>
        <div class="block_img"><img src="{{ $product->lang[0]->img_2 }}" alt=""></div>
        </div>
        <div class="wave bottom"><img src="{{ URL::asset('frontend/images/product_char_wave_bottom.png') }}" alt=""></div>
        <div class="bike"><img src="{{ URL::asset('frontend/images/product_char_bike.png') }}" alt=""></div>
    </div>
    <div class="product_keyAdvantages page_block">
        <div class="block_inner">
        <div class="block_content">
            <h2 class="block_subtitle">{{ $product->lang[0]->title_3 }}</h2>
            {!!  html_entity_decode($product->lang[0]->content_3) !!}
        </div>
        <div class="block_img"><img src="{{ $product->lang[0]->img_3 }}" alt=""></div>
        </div>
    </div>
    <div class="product_future page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">{!! $product->lang[0]->title_4 !!}</h2>
        <div class="image_video"><img src="{{ $product->lang[0]->img_4 }}" alt=""></div>
        </div>
    </div>
    <div class="product_application page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">{{ trans('lang.applicationrange') }}</h2>
        <div class="aplication_items">
            <?php switch($productId){
                case '05716e4e-2c50-4f3a-8309-96306d7a5fb1': ?>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/porduct01/icon_img01.png') }}" alt=""></div><span>E-Bike brand operators</span>
                    </div>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/porduct01/icon_img02.png') }}" alt=""></div><span>Bike brands operators</span>
                    </div>
                <?php break;
                case 'dcebd914-a2fc-42c6-867e-17ec4138c4c9': ?>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/product02/icon_img01.png') }}" alt=""></div><span>E-Bike</span>
                    </div>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/product02/icon_img02.png') }}" alt=""></div><span>Regular Bike</span>
                    </div>
                <?php break;
                case '90e4ceb9-005e-4fc5-88a3-23bf8d2938da': ?>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/product03/icon_img01.png') }}" alt=""></div><span>E-Bike</span>
                    </div>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/product03/icon_img02.png') }}" alt=""></div><span>Regular Bike</span>
                    </div>
                <?php break;
                case 'cc31abdf-3f9b-49b9-8dff-8c9563edd36c': ?>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/product04/icon_img01.png') }}" alt=""></div><span>Bike dealers / Bike stores </span>
                    </div>
                <?php break;
                case '28cff062-ed94-44d0-b6b6-7692a47495f5': ?>
                    <div class="item">
                        <div class="icon_img"><img src="{{ URL::asset('frontend/images/products/product05/icon_img01.png') }}" alt=""></div><span>E-Bike</span>
                    </div>
                <?php break; 
            } ?>           
        </div>
        </div>
    </div>
    @include('frontend.shared._contact')
</main>
@endsection

@section('script')

@endsection