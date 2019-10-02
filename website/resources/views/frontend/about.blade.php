@extends('frontend.shared._layout')

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="page_banner page_block in_about">
        <div class="block_inner"><img class="about_logo" src="{{ URL::asset('frontend/images/logo_about.png') }}" alt="Micro Program x Bikonnect"></div>
    </div>
    <div class="about_introduction page_block">
        <div class="block_inner">
        <div class="pic_text">
            <div class="pic"><img src="{{ URL::asset('frontend/images/img_about_intro.jpg') }}" alt="About Introduction"></div>
            <div class="text">
            <h2 class="block_subtitle">A new data partner for riding experiences and operational decision services.</h2>
            <p>Microprogram Information Co.,Ltd. has core professional abilities in software-hardware integration and years of industry know-how in the bicycle field. We implement our technological services and create an online biking service that involves direct user interaction. We analyze data on riding, consumption and behavior and connect to the data from sales channels. We help corporations use quantitative data and precisely plan for market strategies and satisfying user services. We help your corporation enter the IoT field quickly and achieve digital transformation perfectly via three critical themes of IoT development, which are cloud service (app), big data and IoT devices. Since we have plenty of experience in bicycle IoT, we have introduced Bikonnect, making Microprogram a new data partner for riding experiences and operational decision services.</p>
            </div>
        </div>
        </div>
    </div>
    <div class="divide_line"><img src="images/bg_line2.png" alt=""></div>
    <div class="bikonnect_introduction page_block">
        <div class="block_inner">
        <div class="pic_text">
            <div class="pic"><img src="{{ URL::asset('frontend/images/img_bikonnect_intro.jpg') }}" alt="Bikonnect Introduction"></div>
            <div class="text">
            <h2 class="block_subtitle">Connect Your Bike, Ride the Future.</h2>
            <p>"Bikonnect" which combines “Bike” and “connect” for “an infinite amount of bicycle connection possibilities.” With the "Connect Your Bike, Ride the Future" brand slogan, Bikonnect provides one-stop technology digitalization services such as the E-Bike Computer, E-Bike App, Store Management System, and Cycling Data Platform to achieve a win-win situation between riders, brands, component manufacturers and stores.</p>
            </div>
        </div>
        </div>
    </div>
    <div class="about_intervalImg"><img src="{{ URL::asset('frontend/images/img_about_interval.jpg') }}" alt="Bike"></div>
    <div class="about_timeline page_block">
        <div class="block_inner">
        <div class="timeline_header">
            <h2 class="block_subtitle">Business Timeline</h2>
            <div id="timeline_years"><img class="bg" src="{{ URL::asset('frontend/images/bg_timeline_years.png') }}" alt="Years Background"><span>2016 - 2020</span></div>
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
                <div class="info_pic"><img src="{{ URL::asset('frontend/images/img_team_info1.jpg') }}" alt="Sherman Ya"></div>
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
                <div class="info_pic"><img src="{{ URL::asset('frontend/images/img_team_info2.jpg') }}" alt="Tony Wu"></div>
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
                <div class="info_pic"><img src="{{ URL::asset('frontend/images/img_team_info3.jpg') }}" alt="Luke Xue"></div>
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
            @include('frontend.shared._partner')
        </div>
    </div>
    @include('frontend.shared._contact')
</main>
@endsection

@section('script')

@endsection