@extends('frontend.shared._layout')

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="product_introduction page_block">
        <div class="block_inner proportion">
        <div class="block_content">
            <h1 class="block_title">{{ $product->lang[0]->title_1 }}</h1>
            <div class="text">
                <p>{{ $product->lang[0]->content_1 }}</p>
            </div>
        </div>
        <div class="block_img"><img src="{{ $product->lang[0]->img_1 }}" alt=""></div>
        </div>
    </div>
    <div class="product_characteristic page_block">
        <div class="wave top"><img src="{{ URL::asset('frontend/images/product_char_wave_top.png') }}" alt=""></div>
        <div class="block_inner proportion">
        <div class="block_content">
            <h2 class="block_subtitle">{!! nl2br($product->lang[0]->title_2) !!}</h2>
            <div class="text">
            <p>{{ $product->lang[0]->content_2 }}</p>
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
            <ul class="key_list">
                {!!  html_entity_decode($product->lang[0]->content_3) !!}
            </ul>
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
        <h2 class="block_subtitle">Application Range</h2>
        <div class="aplication_items">
            <div class="item">
                <div class="icon_img"><img src="images/products/porduct01/icon_img01.png" alt=""></div><span>E-Bike brand operators</span>
                </div>
                <div class="item">
                <div class="icon_img"><img src="images/products/porduct01/icon_img02.png" alt=""></div><span>Bike brands operators</span>
            </div>
        </div>
        </div>
    </div>
    <div class="contact page_block" data-anchor="contact">
        <div class="block_inner">
        <div class="contact_info">
            <div class="contact_logo"><img class="retina" src="images/logo_big.png" alt="Bikonnect"></div>
            <h2>Let's get<br>
            <big>Connect</big>
            </h2>
            <div class="follow_us"><span>follow us!</span>
            <div class="social_links"><a href="javascript:;" target="_blank"><i class="icon_facebook"></i></a><a href="javascript:;" target="_blank"><i class="icon_twitter"></i></a><a href="javascript:;" target="_blank"><i class="icon_instagram"></i></a></div>
            </div>
            <div class="info_list">
            <div class="item"><i class="icon_location"></i><a href="https://goo.gl/maps/djPnGB4bzScakSzS9" target="_blank">7F, No.402, Shizheng Rd, Xitun Dist., Taichung City 407.,Taiwan</a></div>
            <div class="item"><i class="icon_mail"></i><a href="mailto:smart_ebike@program.com.tw">smart_ebike@program.com.tw</a></div>
            <div class="item"><i class="icon_tel"></i><a href="tel:+886-4-2369-2699">+886-4-2369-2699</a></div>
            <div class="item"><i class="icon_fax"></i><span>+886-4-2258-8577</span></div>
            </div>
        </div>
        <div class="contact_form">
            <!--↓ 輸入有誤時 controls 的 class 加 'error' 即可顯示 error_text, 並在 error_text 顯示錯誤訊息 ↓-->
            <div class="controls_group">
            <label>Name</label>
            <div class="controls">
                <input type="text">
                <div class="error_text">Error!</div>
            </div>
            </div>
            <div class="controls_group">
            <label>Phone</label>
            <div class="controls">
                <input type="text">
                <div class="error_text">Error!</div>
            </div>
            </div>
            <div class="controls_group">
            <label>E-mail</label>
            <div class="controls">
                <input type="email">
                <div class="error_text">Error!</div>
            </div>
            </div>
            <div class="controls_group">
            <label>Message</label>
            <div class="controls">
                <textarea></textarea>
                <div class="error_text">Error!</div>
            </div>
            </div>
            <!--↑ 輸入有誤時 controls 的 class 加 'error' 即可顯示 error_text, 並在 error_text 顯示錯誤訊息 ↑-->
            <div class="call_action">
            <div class="captcha">
                <div class="captcha_inner">
                <div class="g-recaptcha" data-sitekey="6LcHGhITAAAAABIgEAplK2EWsVFkaE5o0DWUpsIs"></div>
                </div>
            </div>
            <button class="btn_submit" type="submit">Send</button>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection

@section('script')

@endsection