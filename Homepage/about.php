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
              <li><a href="<?= $front_url."solution.php"?>">Solution</a></li>
              <li><a href="javascript:;">Products</a>
                <ul>
                  <li><a href="<?= $front_url."product01.php "?>">Cyling Data Platform</a></li>
                  <li><a href="<?= $front_url."product02.php "?>">E-Bike App</a></li>
                  <li><a href="<?= $front_url."product03.php "?>">Smart Lock for E-Bike</a></li>
                  <li><a href="<?= $front_url."product04.php "?>">E-Bike store management system</a></li>
                  <li><a href="<?= $front_url."product05.php "?>">E-Bike computer</a></li>
                </ul>
              </li>
              <li><a class="current" href="<?= $front_url."about.php" ?>">About Us</a></li>
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
        <div class="page_banner page_block in_about">
          <div class="block_inner"><img class="about_logo" src="<?= $img_url."images/logo_about.png" ?>" alt="Micro Program x Bikonnect"></div>
        </div>
        <div class="about_introduction page_block">
          <div class="block_inner">
            <div class="pic_text">
              <div class="pic"><img src="<?= $img_url."images/img_about_intro.jpg" ?>" alt="About Introduction"></div>
              <div class="text">
                <h2 class="block_subtitle">A new data partner for riding experiences and operational decision services.</h2>
                <p>Microprogram Information Co.,Ltd. has core professional abilities in software-hardware integration and years of industry know-how in the bicycle field. We implement our technological services and create an online biking service that involves direct user interaction. We analyze data on riding, consumption and behavior and connect to the data from sales channels. We help corporations use quantitative data and precisely plan for market strategies and satisfying user services. We help your corporation enter the IoT field quickly and achieve digital transformation perfectly via three critical themes of IoT development, which are cloud service (app), big data and IoT devices. Since we have plenty of experience in bicycle IoT, we have introduced Bikonnect, making Microprogram a new data partner for riding experiences and operational decision services.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="divide_line"><img src="<?= $img_url."images/bg_line2.png" ?>" alt=""></div>
        <div class="bikonnect_introduction page_block">
          <div class="block_inner">
            <div class="pic_text">
              <div class="pic"><img src="<?= $img_url."images/img_bikonnect_intro.jpg" ?>" alt="Bikonnect Introduction"></div>
              <div class="text">
                <h2 class="block_subtitle">Connect Your Bike, Ride the Future.</h2>
                <p>"Bikonnect" which combines “Bike” and “connect” for “an infinite amount of bicycle connection possibilities.” With the "Connect Your Bike, Ride the Future" brand slogan, Bikonnect provides one-stop technology digitalization services such as the E-Bike Computer, E-Bike App, Store Management System, and Cycling Data Platform to achieve a win-win situation between riders, brands, component manufacturers and stores.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="about_intervalImg"><img src="<?= $img_url."images/img_about_interval.jpg" ?>" alt="Bike"></div>
        <div class="about_timeline page_block">
          <div class="block_inner">
            <div class="timeline_header">
              <h2 class="block_subtitle">Business Timeline</h2>
              <div id="timeline_years"><img class="bg" src="<?= $img_url."images/bg_timeline_years.png" ?>" alt="Years Background"><span>2016 - 2020</span></div>
              <div id="timeline_arrows"></div>
            </div>
            <div id="timeline_slider">
              <div class="slide" data-years="2016 - 2020">
                <h3>Operation service</h3>
                <ul>
                  <li>Operated product services jointly with industrial partners.block_subtitle.</li>
                  <li>Established the E-Bike Department, which focused on the development of the E-Bike field.</li>
                  <li>Developed the China Region Riding APP for Giant, which was launched in the Chinese Market.</li>
                  <li>Jointly developed the E-Bike inspection tool for stores and E-BIKEAPP, and applied such to GIANT Global’s sales channels and users.</li>
                  <li>The “Giant RideLife – Bike e-Service” was presented with an award at the Ministry of Economic Affairs’ 24th “SMEs Innovation Awards.”</li>
                  <li>Passed certification for ISO 27001 “International Standards for Information Security Management Systems,” and was awarded the “Potential SME Award” and “Taiwan Excellence Award.”</li>
                  <li>Created the Bikonnect brand to provide one-stop digitalized biking services.</li>
                  <li>Developed YWS’ dedicated circular “E-Lock” for the E-Bike.</li>
                  <li>Established the Overseas Business Unit.</li>
                </ul>
              </div>
              <div class="slide" data-years="2013 - 2016">
                <h3>Development of the Bicycle Soft/Hardware Device</h3>
                <ul>
                  <li>Assisted Giant Manufacturing Co. Ltd. in the research for improving production lines and digital upgrades.</li>
                  <li>Planned, designed, developed and supplied Giant Bicycle’s Speed and Cadence Sensors (with Ble and ANT transfer interfaces). The sensors’ official distribution began in 2015.</li>
                  <li>Developed the Cycling Computer BLE Transfer Module for Giant Bicycle’s Electric Bicycle.</li>
                  <li>Introduced “Giant RideLife – Bike e-Service, Life,”  which provided services such as digitalizing the deliveries of bicycles, serving as a social networking platform for riding, providing the ARS Bluetooth Warning Sensor Device, etc.</li>
                </ul>
              </div>
              <div class="slide" data-years="2011-2015">
                <h3>Service innovation</h3>
                <ul>
                  <li>Introduced service design and user research.</li>
                  <li>Jointly operated the public bicycle rental service of YouBike.</li>
                  <li>Acquired strategical investment from renowned enterprises, such as Giant, Intel Capital, CDIB Capital Group and Gamania.</li>
                  <li>Received the “National Award of Outstanding SMEs”</li>
                </ul>
              </div>
              <div class="slide" data-years="2006-2010">
                <h3>Product R&amp;D</h3>
                <ul>
                  <li>Entered the field of electronic tickets.</li>
                  <li>Independently developed product module equipment and cloud service system.</li>
                  <li>Offered technical services to OEMs and ODMs of various industries.</li>
                </ul>
              </div>
              <div class="slide" data-years="2001-2005">
                <h3>System integration</h3>
                <ul>
                  <li>Established the department responsible for software and hardware R&amp;D.</li>
                  <li>Start offering customized value-added services of system integration.</li>
                  <li>Developed RFID wireless sensing technology.</li>
                </ul>
              </div>
              <div class="slide" data-years="1995-2000">
                <h3>Product sales</h3>
                <ul>
                  <li>Founder Tony Wu established Microprogram in Chiayi.</li>
                  <li>Operated in the fields of software development and information equipment sales.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="about_team page_block">
          <div class="block_inner">
            <h2 class="block_subtitle">Team</h2>
            <div class="team_intro">
              <div class="item">
                <div class="info">
                  <div class="info_pic"><img src="<?= $img_url."images/img_team_info1.jpg" ?>" alt="Sherman Ya"></div>
                  <div class="info_content">
                    <h3>Sherman Ya</h3>
                    <h4>COO</h4>
                    <hr>
                    <p>It is not because things are difficult that we do not dare, it is because we do not dare that they are difficult.</p>
                  </div>
                </div>
                <div class="name_jobTitle">
                  <h3 class="info_name">Sherman Ya</h3>
                  <hr class="divide_line">
                  <h4 class="job_title">COO</h4>
                </div>
              </div>
              <div class="item">
                <div class="info">
                  <div class="info_pic"><img src="<?= $img_url."images/img_team_info2.jpg" ?>" alt="Tony Wu"></div>
                  <div class="info_content">
                    <h3>Tony Wu</h3>
                    <h4>CEO</h4>
                    <hr>
                    <p>Persist in innovation and embrace change.</p>
                  </div>
                </div>
                <div class="name_jobTitle">
                  <h3 class="info_name">Tony Wu</h3>
                  <hr class="divide_line">
                  <h4 class="job_title">CEO</h4>
                </div>
              </div>
              <div class="item">
                <div class="info">
                  <div class="info_pic"><img src="<?= $img_url."images/img_team_info3.jpg" ?>" alt="Luke Xue"></div>
                  <div class="info_content">
                    <h3>Luke Xue</h3>
                    <h4>CTO</h4>
                    <hr>
                    <p>Be the best, not just be.</p>
                  </div>
                </div>
                <div class="name_jobTitle">
                  <h3 class="info_name">Luke Xue</h3>
                  <hr class="divide_line">
                  <h4 class="job_title">CTO</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="partners_supporters page_block in_about">
          <div class="block_inner">
            <h2 class="block_subtitle">Our Partners &amp; Supporters</h2>
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
              <form action="<?= $front_url."about.php" ?>" method="post">
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
          <li><a href="<?= $front_url."solution.php"?>">Solution</a></li>
          <li><a href="javascript:;">Products</a>
            <ul>
              <li><a href="<?= $front_url."product01.php" ?>">Cyling Data Platform</a></li>
              <li><a href="<?= $front_url."product02.php" ?>">E-Bike App</a></li>
              <li><a href="<?= $front_url."product03.php" ?>">Smart Lock for E-Bike</a></li>
              <li><a href="<?= $front_url."product04.php" ?>">E-Bike store management system</a></li>
              <li><a href="<?= $front_url."product05.php" ?>">E-Bike computer</a></li>
            </ul>
          </li>
          <li><a class="current" href="<?= $front_url."about.php" ?>">About Us</a></li>
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
    <script src="<?= $img_url."scripts/plugins.js"?> "></script>
    <script src="<?= $img_url."scripts/main.js"?> "></script>
  </body>
</html>