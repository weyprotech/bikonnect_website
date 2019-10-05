<div class="contact page_block" data-anchor="contact">
    <div class="block_inner">
        <div class="contact_info">
            <div class="contact_logo"><img class="retina" src="{{ URL::asset('frontend/images/logo_big.png') }}" alt="Bikonnect"></div>
            <h2>Let's get<br>
                <big>Connect</big>
            </h2>
            <div class="follow_us">
                <span>follow us!</span>
                <div class="social_links"><a href="javascript:;" target="_blank"><i class="icon_facebook"></i></a><a href="javascript:;" target="_blank"><i class="icon_twitter"></i></a><a href="javascript:;" target="_blank"><i class="icon_instagram"></i></a></div>
            </div>
            <div class="info_list">
                <div class="item"><i class="icon_location"></i><a href="https://goo.gl/maps/djPnGB4bzScakSzS9" target="_blank">{{ trans('lang.address') }}</a></div>
                <div class="item"><i class="icon_mail"></i><a href="mailto:smart_ebike@program.com.tw">smart_ebike@program.com.tw</a></div>
                <div class="item"><i class="icon_tel"></i><a href="tel:+886-4-2369-2699">+886-4-2369-2699</a></div>
                <div class="item"><i class="icon_fax"></i><span>+886-4-2258-8577</span></div>
            </div>
        </div>
        <div class="contact_form">
            <!--↓ 輸入有誤時 controls 的 class 加 'error' 即可顯示 error_text, 並在 error_text 顯示錯誤訊息 ↓-->
            <form id="contact-form" action="" method="post">
                <div class="controls_group">
                    <label>{{ trans('lang.name') }}</label>
                    <div class="controls">
                        <input type="text" id="name" name="name">
                        <!--<div class="error_text">Error!</div>-->
                    </div>
                </div>
                <div class="controls_group">
                    <label>{{ trans('lang.phone') }}</label>
                    <div class="controls">
                        <input type="text" id="phone" name="phone">
                        <!--<div class="error_text">Error!</div>-->
                    </div>
                </div>
                <div class="controls_group">
                    <label>E-mail</label>
                    <div class="controls">
                        <input type="email" id="email" name="email">
                        <!--<div class="error_text">Error!</div>-->
                    </div>
                </div>
                <div class="controls_group">
                    <label>{{ trans('lang.message') }}</label>
                    <div class="controls">
                        <textarea id="message" name="message"></textarea>
                        <!--<div class="error_text">Error!</div>-->
                    </div>
                </div>
                <!--↑ 輸入有誤時 controls 的 class 加 'error' 即可顯示 error_text, 並在 error_text 顯示錯誤訊息 ↑-->
                <div class="call_action">
                    <!--<div class="captcha">
                        <div class="captcha_inner">
                        <div class="g-recaptcha" data-sitekey="6LcHGhITAAAAABIgEAplK2EWsVFkaE5o0DWUpsIs"></div>
                        </div>
                    </div>-->
                    <button class="btn_submit" type="submit">{{ trans('lang.send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>