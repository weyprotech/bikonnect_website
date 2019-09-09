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
              <li><a href=<?= $front_url."solution.php" ?>>Solution</a></li>
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
        <div class="index_banner_slider">
          <div class="slider">
            <div class="slide">
              <div class="bg" style="background-image: url(<?= $img_url."images/banner_index.jpg" ?>);"></div>
              <div class="slide_content">
                <h2>Connect Your Bike<br>Ride the Future</h2><a class="btn_more big" href=<?= $front_url."solution.php" ?>>Learn More</a>
              </div>
            </div>
            <div class="slide">
              <div class="bg" style="background-image: url(<?= $img_url."images/banner_index.jpg" ?>);"></div>
              <div class="slide_content">
                <h2>Connect Your Bike<br>Ride the Future</h2><a class="btn_more big" href=<?= $front_url."solution.php" ?>>Learn More</a>
              </div>
            </div>
          </div>
          <div class="slider_dots"></div>
        </div>
        <div class="index_experience page_block">
          <div class="wave"><img src="<?= $img_url."images/img_wave.png" ?>" alt=""></div>
          <div class="block_inner">
            <h2 class="block_title">More Intelligent Cycling<br>Experience</h2>
            <div class="text">
              <p>I have hinted that I would often jerk poor Queequeg from between the whale and the ship—where he would occasionally fall, from the incessant rolling and swaying of both. But this was not the only jamming jeopardy he was exposed to.</p>
            </div>
            <div class="experience_items">
              <div class="item"><a href="<?= $front_url."product05.php" ?>"><img class="thumb" src="<?= $img_url."images/img_index_experience01.png" ?>" alt="E-Bike computer">
                  <h3>E-Bike computer</h3></a></div>
              <div class="item"><a href="<?= $front_url."product02.php" ?>"><img class="thumb" src="<?= $img_url."images/img_index_experience02.png" ?>" alt="E-Bike APP">
                  <h3>E-Bike APP</h3></a></div>
              <div class="item"><a href="<?= $front_url."product04.php" ?>"><img class="thumb" src="<?= $img_url."images/img_index_experience03.png" ?>" alt="Dealer management system">
                  <h3>Dealer management system</h3></a></div>
              <div class="item"><a href="<?= $front_url."product01.php" ?>"><img class="thumb" src="<?= $img_url."images/img_index_experience04.png" ?>" alt="Cycling Data Platform">
                  <h3>Cycling Data Platform</h3></a></div>
            </div>
          </div>
        </div>
        <div class="index_strength page_block">
          <div class="block_inner proportion">
            <h2 class="block_title">Our Strength</h2>
            <div class="strength_content">
              <div class="strength_sliders">
                <div class="item">
                  <div class="mobile_img"><img src="<?= $img_url."images/img_index_strength_m01.png" ?>" alt="Strangth Mobile Picture 01"></div>
                  <div class="slider">
                    <div class="slide">
                      <div class="slide_inner">
                        <h3>Smart Integration</h3>
                        <hr>
                        <p>Data Transmission Firmware Update</p>
                      </div>
                    </div>
                    <div class="slide">
                      <div class="slide_inner">
                        <h3>Smart Integration</h3>
                        <hr>
                        <p>Data Transmission Firmware Update</p>
                      </div>
                    </div>
                    <div class="slide">
                      <div class="slide_inner">
                        <h3>Smart Integration</h3>
                        <hr>
                        <p>Data Transmission Firmware Update</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="mobile_img"><img src="<?= $img_url."images/img_index_strength_m02.png" ?>" alt="Strangth Mobile Picture 02"></div>
                  <div class="slider">
                    <div class="slide">
                      <div class="slide_inner">
                        <h3>Business Strategy</h3>
                        <hr>
                        <p>Store Management System Cycling Data Platform</p>
                      </div>
                    </div>
                    <div class="slide">
                      <div class="slide_inner">
                        <h3>Business Strategy</h3>
                        <hr>
                        <p>Store Management System Cycling Data Platform</p>
                      </div>
                    </div>
                    <div class="slide">
                      <div class="slide_inner">
                        <h3>Business Strategy</h3>
                        <hr>
                        <p>Store Management System Cycling Data Platform</p>
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
                  </svg><img id="strengthIMG" src="<?= $img_url."images/img_index_strength.png" ?>" alt="strength">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="index_solutions page_block">
          <div class="block_inner proportion">
            <div class="block_content">
              <h2 class="block_title">Smart Solutions</h2>
              <h3 class="block_subtitle">Data Management &amp; Analysis</h3>
              <div class="text">
                <p>Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever fap. </p>
              </div><a class="btn_more green" href="<?= $front_url."solution.php" ?>">Learn more</a>
            </div>
            <div class="block_img"><img src="<?= $img_url."images/img_index_solutions.png" ?>" alt="Smart Solutions Picture"></div>
          </div>
        </div>
        <div class="partners_supporters page_block">
          <div class="block_inner">
            <h2 class="block_title">Our Partners &amp; Supporters</h2>
            <div class="partners_items">
              <!--↓ 圖片建議尺寸 寬:230px以下 高:70px ↓-->
              <div class="item"><img src="<?= $img_url."images/partners/img_partners01.png" ?>" alt="LifePlus 雲端生活家"></div>
              <div class="item"><img src="<?= $img_url."images/partners/img_partners02.png" ?>" alt="GIANT"></div>
              <div class="item"><img src="<?= $img_url."images/partners/img_partners03.png" ?>" alt="intel"></div>
              <div class="item"><img src="<?= $img_url."images/partners/img_partners13.png" ?>" alt="Wellgo"></div>
              <div class="item"><img src="<?= $img_url."images/partners/img_partners14.png" ?>" alt="YWS"></div>
              <div class="item"><img src="<?= $img_url."images/partners/img_partners15.png" ?>" alt="Nidec"></div>
              <div class="item"><img src="<?= $img_url."images/partners/img_partners07.png" ?>" alt="Ubike"></div>
              <div class="item"><img src="<?= $img_url."images/partners/img_partners16.png" ?>" alt="MPF"></div>
              <!--↑ 圖片建議尺寸 寬:230px以下 高:70px ↑-->
            </div>
          </div>
        </div>
        <div class="index_vision page_block">
          <div class="bg"></div>
          <div class="block_inner proportion">
            <div class="vision_content">
              <h2 class="block_title">Our Vision</h2>
              <h3 class="block_subtitle">Your bike best secretary</h3>
              <div class="text">
                <p>Nam porttitor blandit accumsan. Ut vel dictum sem, a pretium dui.</p>
              </div><a class="btn_more" href="<?= $front_url."solution.php" ?>">Read More</a>
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
              <form action="<?= $front_url."index.php" ?>" method="post">
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
    <script src="<?= $img_url. "scripts/vendor.js" ?>"></script>
    <script src="<?= $img_url. "scripts/plugins.js" ?>"></script>
    <script src="<?= $img_url. "scripts/main.js" ?>"></script>
    <script src="<?= $img_url. "scripts/vivus.js" ?>"></script>
    <script src="<?= $img_url. "scripts/waypoints.js" ?>"></script>
    <script>
      $(function() {
        var strength = new Vivus('strengthSVG', {
          start: 'manual',
          type: 'scenario-sync',
          duration: 10,
          forceRender: false,
          onReady: function (vivusObj) {
            var waypoint = new Waypoint({
              element: document.getElementById('strengthSVG'),
              handler: function(direction) {
                vivusObj.play();
              },
              offset: '70%' 
            })
          }
        }, function() {
          $('#strengthIMG').fadeIn(800);
        });
      });
    </script>
  </body>
</html>