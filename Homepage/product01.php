<?php 
    $img_url = "http://127.0.0.1/bikonnect-website/frontend/dist/";
    $front_url = "http://127.0.0.1/bikonnect-website/Homepage/"
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bikonnect</title>
    <meta name="KeyWords" content="bikonnect">
    <meta name="Description" content="Bikonnect Website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="<?= $img_url."styles/main.css" ?>">
  </head>
  <body><!--[if lt IE 10]>
    <div class="old_browser">
      <div class="old_browser_inner">
        <div class="oops">OOPS!</div>
        <div class="oops_title">您的瀏覽器版本太舊了！</div>
        <p>請更新至 Internet Explorer 10 以上版本或選用更現代化的瀏覽器，<br><br>使用老舊版本的瀏覽器瀏覽本網站將可能有無法預測的錯誤，請儘快更新。<br><br>微軟已於2016年起停止IE8 (含)以下版本之Windows安全更新（<a href="http://windows.microsoft.com/zh-tw/windows/end-support-help" target="_blank">微軟 終止支援公告</a>），<br>為了您的個資安全、瀏覽流暢度與享受更多網站互動體驗，建議您立即升級瀏覽器。</p>
        <table>
          <caption>&gt;&gt; 建議您更新或使用以下瀏覽器</caption>
          <tr>
            <td><a href="http://windows.microsoft.com/zh-tw/internet-explorer/download-ie" target="_blank"><img src="images/browser/ie.png" alt="IE"><span>IE</span></a></td>
            <td><a href="http://www.google.com/chrome/" target="_blank"><img src="images/browser/chrome.png" alt="Chrome"><span>Chrome</span></a></td>
            <td><a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank"><img src="images/browser/firefox.png" alt="Firefox"><span>Firefox</span></a></td>
            <td><a href="https://www.opera.com/zh-tw/download?os=windows" target="_blank"><img src="images/browser/opera.png" alt="Opera"><span>Opera</span></a></td>
          </tr>
        </table>
        <p>2019 ALL RIGHTS RESERVED. <a href="javascript:;">Privacy &nbsp;| &nbsp;Polity</a>.</p>
      </div>
    </div><![endif]-->
    <div id="wrapper">
      <header id="header">
        <div class="header_inner"><a class="header_logo" href="<?= $front_url."index.php" ?>"><img class="retina" src="<?= $img_url."images/logo.png" ?>" alt="Bikonnect"></a>
          <nav class="header_nav">
            <ul>
              <li><a href="<?= $front_url."solution.php" ?>">Solution</a></li>
              <li><a href="javascript:;">Products</a>
                <ul>
                  <li><a href="<?= $front_url."product01.php" ?>">Cyling Data Platform</a></li>
                  <li><a href="<?= $front_url."product02.php" ?>">E-Bike App</a></li>
                  <li><a href="<?= $front_url."product03.php" ?>">Smart Lock for E-Bike</a></li>
                  <li><a href="<?= $front_url."product04.php" ?>">E-Bike store management system</a></li>
                  <li><a href="<?= $front_url."product05.php" ?>">E-Bike computer</a></li>
                </ul>
              </li>
              <li><a href="<?= $front_url."about.php" ?>">About Us</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="javascript:;">Blog</a></li>
            </ul>
            <div class="dropdown language">
              <div class="dropdown_head">ENGLISH</div>
              <div class="dropdown_list">
                <div class="item"><a class="active" href="javascript:;">English</a></div>
                <div class="item"><a href="javascript:;">中文</a></div>
              </div>
            </div>
          </nav><a id="btn_menu" href="javascript:;"><span></span></a>
        </div>
      </header>
      <main id="main">
        <div class="product_introduction page_block">
          <div class="block_inner proportion">
            <div class="block_content">
              <h1 class="block_title">Cyling Data Platform</h1>
              <div class="text">
                <p>The E-Bike cycling data platform provides easy-to-use data services for regular bike and E-bike brands or component manufacturers, allowing operators to know the real-time cycling data, bikes or components repair status of members, and even texting marketing notifications and events management to members.</p>
              </div>
            </div>
            <div class="block_img"><img src="<?= $img_url."images/products/porduct01/intro.png" ?>" alt=""></div>
          </div>
        </div>
        <div class="product_characteristic page_block">
          <div class="wave top"><img src="<?= $img_url."images/product_char_wave_top.png" ?>" alt=""></div>
          <div class="block_inner proportion">
            <div class="block_content">
              <h2 class="block_subtitle">Integrate Store<br>Management System</h2>
              <div class="text">
                <p>Meanwhile, it could integrate with store management system to quickly know the service data of dealers and members, with technology connecting cyclists, dealers and owners; therefore, it drives business strategy to create brand value and enhance market competitiveness.</p>
              </div>
            </div>
            <div class="block_img"><img src="<?= $img_url."images/products/porduct01/characteristic.png" ?>" alt=""></div>
          </div>
          <div class="wave bottom"><img src="<?= $img_url."images/product_char_wave_bottom.png" ?>" alt=""></div>
          <div class="bike"><img src="<?= $img_url."images/product_char_bike.png" ?>" alt=""></div>
        </div>
        <div class="product_keyAdvantages page_block">
          <div class="block_inner">
            <div class="block_content">
              <h2 class="block_subtitle">Key Advantages</h2>
              <ul class="key_list">
                <li>Visualized members’cycling data statistics</li>
                <li>Member's relevant data is easy to query</li>
                <li>Easily send marketing messages to members</li>
                <li>E-Bike system equipments management for members’E-Bike</li>
                <li>Assign easily to administrative authorizations of members’data </li>
                <li>Integrated store management system</li>
              </ul>
            </div>
            <div class="block_img"><img src="<?= $img_url."images/products/porduct01/key.png" ?>" alt=""></div>
          </div>
        </div>
        <div class="product_future page_block">
          <div class="block_inner">
            <h2 class="block_subtitle">Connect your bike<br>Ride the future</h2>
            <div class="image_video"><img src="<?= $img_url."images/products/porduct01/future.jpg" ?>" alt=""></div>
          </div>
        </div>
        <div class="product_application page_block">
          <div class="block_inner">
            <h2 class="block_subtitle">Application Range</h2>
            <div class="aplication_items">
              <div class="item">
                <div class="icon_img"><img src="<?= $img_url."images/products/porduct01/icon_img01.png" ?>" alt=""></div><span>E-Bike brand operators</span>
              </div>
              <div class="item">
                <div class="icon_img"><img src="<?= $img_url."images/products/porduct01/icon_img02.png" ?>" alt=""></div><span>Bike brands operators</span>
              </div>
            </div>
          </div>
        </div>
        <div class="contact page_block" data-anchor="contact">
          <div class="block_inner">
            <div class="contact_info">
              <div class="contact_logo"><img class="retina" src="<?= $img_url."images/logo_big.png" ?>" alt="Bikonnect"></div>
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
              <form action="<?= $front_url."product01.php" ?>" method="post">
                <!--↓ 輸入有誤時 controls 的 class 加 'error' 即可顯示 error_text, 並在 error_text 顯示錯誤訊息 ↓-->
                <div class="controls_group">
                  <label>Name</label>
                  <div class="controls">
                    <input type="text" name="name">
                    <div class="error_text">Error!</div>
                  </div>
                </div>
                <div class="controls_group">
                  <label>Phone</label>
                  <div class="controls">
                    <input type="text" name="phone">
                    <div class="error_text">Error!</div>
                  </div>
                </div>
                <div class="controls_group">
                  <label>E-mail</label>
                  <div class="controls">
                    <input type="email" name="email">
                    <div class="error_text">Error!</div>
                  </div>
                </div>
                <div class="controls_group">
                  <label>Message</label>
                  <div class="controls">
                    <textarea name="message"></textarea>
                    <div class="error_text">Error!</div>
                  </div>
                </div>
                <!--↑ 輸入有誤時 controls 的 class 加 'error' 即可顯示 error_text, 並在 error_text 顯示錯誤訊息 ↑-->
                <div class="call_action">
                  <!-- <div class="captcha">
                    <div class="captcha_inner">
                      <div class="g-recaptcha" data-sitekey="6LcHGhITAAAAABIgEAplK2EWsVFkaE5o0DWUpsIs"></div>
                    </div>s
                  </div> -->
                  <button class="btn_submit" type="submit">Send</button>              
                </div>
              </form>
              <?php if($_POST){
                  require_once("./PHPMailer-5.2.9/PHPMailerAutoload.php");

                  $mail = new PHPMailer();
                  $mail->IsSMTP();
                  $mail->Host = 'smtp.sendgrid.net';
                  $mail->SMTPAuth = true;
                  $mail->Username = "azure_9131e480018e796d9d0b46988542082b@azure.com";
                  $mail->Password = "test#12ab";    
                  $mail->Port = 587;
                  $mail->setFrom('azure_9131e480018e796d9d0b46988542082b@azure.com','test');
                  $mail->AddAddress('smart_ebike@program.com.tw', 'test');
                  $mail->IsHTML(true);
                  $mail->Subject = 'bikonnect_mail';
                  $content = '姓名:'.$_POST['name'].',信箱:'.$_POST['email'].',連絡電話:'.$_POST['phone'].',內容'.$_POST['message'];
                  $mail->Body = $content;
              
                  if($mail->Send()){
                      return true;
                  }else{
                      echo $mail->ErrorInfo;
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </main>
      <footer id="footer">
        <div class="copyright">2019 ALL RIGHTS RESERVED. &nbsp;<a href="<?= $front_url."privacy_polity.php" ?>">Privacy &nbsp;| &nbsp;Polity</a>.
          
        </div>
      </footer>
    </div>
    <div id="sidebar">
      <div class="sidebar_logo"><a href="<?= $front_url."index.php" ?>"><img src="<?= $img_url."images/logo.png" ?>" alt="Bikonnect"></a></div>
      <nav class="sidebar_menu">
        <ul>
          <li><a href="<?= $front_url."solution.php" ?>">Solution</a></li>
          <li><a href="javascript:;">Products</a>
            <ul>
              <li><a href="<?= $front_url."product01.php" ?>">Cyling Data Platform</a></li>
              <li><a href="<?= $front_url."product02.php" ?>">E-Bike App</a></li>
              <li><a href="<?= $front_url."product03.php" ?>">Smart Lock for E-Bike</a></li>
              <li><a href="<?= $front_url."product04.php" ?>">E-Bike store management system</a></li>
              <li><a href="<?= $front_url."product05.php" ?>">E-Bike computer</a></li>
            </ul>
          </li>
          <li><a href="<?= $front_url."about.php" ?>">About Us</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="javascript:;">Blog</a></li>
        </ul>
        <div class="dropdown language">
          <div class="dropdown_head">ENGLISH</div>
          <div class="dropdown_list">
            <div class="item"><a class="active" href="javascript:;">English</a></div>
            <div class="item"><a href="javascript:;">中文</a></div>
          </div>
        </div>
      </nav>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="<?= $img_url."scripts/vendor.js" ?>"></script>
    <script src="<?= $img_url."scripts/plugins.js" ?>"></script>
    <script src="<?= $img_url."scripts/main.js" ?>"></script>
  </body>
</html>