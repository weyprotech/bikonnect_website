@extends('frontend.shared._layout')

@section('title', 'Bikonnect')

@section('content')
<main id="main">
    <div class="page_banner page_block in_solution">
        <div class="block_inner">
        <h1 class="block_title">E-Bike Data Service Solution</h1>
        </div>
    </div>
    <div class="solution_introduction page_block">
        <div class="block_inner">
        <div class="image_video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/QOKVoRQH9hk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="text">
            <p>The “E-Bike Data Service Solution” provided by Microprogram enhance E-Bike cyclist experience and bike brand service value with IoT and Big Data to make smart technologies improve global competition for E-Bike. Compared to regular bicycles, E-Bike offers the advantage of power supply, and E-Bike data service has combined E-Bike Computer and E-Bike App, which could provide cyclists' real-time dynamic cycling data to the cycling data platform to bike brands or component manufacturers.</p>
            <p>Through cyclists' data to assist the brand’s business decision-making, the E-Bike digital upgrades practically to create more added value for brand owners. For cyclists, a series of smart bike products, including E-Bike Computer and E-Bike App, make the cyclists’ experience more intelligent, reaching a win-win situation for cyclists, bike brands, dealers and component manufacturers.</p>
        </div>
        </div>
    </div>
    <div class="divide_line"><img src="{{ URL::asset('frontend/images/bg_line.png') }}" alt=""></div>
    <div class="solution_help page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">We Can Help You</h2>
        <div class="pic_text">
            <div class="pic"><img src="{{ URL::asset('frontend/images/img_solution_help.jpg') }}" alt="We can help you"></div>
            <div class="text">
            <ul class="common_list">
                <li>E-Bike digital upgrade, system integration of offline products and online services</li>
                <li>Dealer after-sales service management (maintenance history, repair and maintenance online appointment)</li>
                <li>Member cycling data collection and analysis</li>
                <li>E-Bike OTA version update</li>
                <li>E-Bike anti-theft</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="solution_keyAdvantages page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">Key Advantages</h2>
        <div class="pic_text">
            <div class="pic"><img src="{{ URL::asset('frontend/images/img_solution_keyAdvantages.jpg') }}" alt="Key Advantages"></div>
            <div class="text">
            <ul class="common_list">
                <li>Analyze cycling and E-Bike data to provide brands with future market trends</li>
                <li>Online E-Bike App integrates Offline E-Bike computer</li>
                <li>Classable authorizations to members’data management for management platform</li>
                <li>User data collection</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="solution_application page_block">
        <div class="block_inner">
        <h2 class="block_subtitle">Application Range</h2>
        <div class="application_items">
            <div class="item"><img src="{{ URL::asset('frontend/images/icon_app01.png') }}" alt="Application Range 01"><span>E-Bike brand<br>operators</span></div>
            <div class="item"><img src="{{ URL::asset('frontend/images/icon_app02.png') }}" alt="Application Range 02"><span>Bike brands<br>operators</span></div>
            <div class="item"><img src="{{ URL::asset('frontend/images/icon_app03.png') }}" alt="Application Range 03"><span>Bike brands</span></div>
            <div class="item"><img src="{{ URL::asset('frontend/images/icon_app04.png') }}" alt="Application Range 04"><span>Bike stores/<br>dealers</span></div>
            <div class="item"><img src="{{ URL::asset('frontend/images/icon_app05.png') }}" alt="Application Range 05"><span>Bike parts<br>operators</span></div>
        </div>
        </div>
    </div>
    <div class="solution_cyclists_operators page_block">
        <div class="block_inner">
        <div class="content_block cyclists">
            <h2 class="block_subtitle">Cyclists</h2>
            <div class="table">
            <div class="tr">
                <div class="th">Cycling aspect:</div>
                <div class="td">E-Bike computer, cycling record with E-Bike APP, devices connection by Bluetooth ,personal riding route track</div>
            </div>
            <div class="tr">
                <div class="th">Repair aspect:</div>
                <div class="td">repair and maintenance appointment, appointment reminder, maintenance history</div>
            </div>
            </div>
        </div>
        <div class="content_block operators">
            <h2 class="block_subtitle">Operators</h2>
            <div class="table">
            <div class="tr">
                <div class="th">Sales aspect:</div>
                <div class="td">members’data collection, customers preference inquiry, notifications of preferential activities, service-related history</div>
            </div>
            <div class="tr">
                <div class="th">Market aspect:</div>
                <div class="td">business decisions, Big Data analysis, optimization upgrade</div>
            </div>
            <div class="tr">
                <div class="th">Brand aspect:</div>
                <div class="td">master comprehensive information, improve user satisfaction</div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="solution_keyFeatures page_block">
        <div class="block_inner">
        <div class="content_block">
            <h2 class="block_subtitle">Key Features</h2>
            <div class="keyFeature_slider">
            <div class="slide">
                <div class="pic_text">
                <div class="pic">
                    <div class="img" style="background-image: url({{ URL::asset('frontend/images/img_solution_keyFeatures01.jpg') }});" alt="Key Features 01"></div>
                </div>
                <div class="text">
                    <h3>E-Bike APP</h3>
                    <p>connected cycling data, cycling record, bike maintenance reminder, one-click diagnosis, route navigation, comprehensive after-sales service offering users a better experience.</p>
                </div>
                </div>
            </div>
            <div class="slide">
                <div class="pic_text">
                <div class="pic">
                    <div class="img" style="background-image: url({{ URL::asset('frontend/images/img_solution_keyFeatures01.jpg') }});" alt="Key Features 02"></div>
                </div>
                <div class="text">
                    <h3>E-Bike computer</h3>
                    <p>displays the demand of important information for E-Bike commuter and leisure users, which pair with E-Bike APP by Bluetooth to achieve the collection and recording of personal cycling data and extend more personalized function services.</p>
                </div>
                </div>
            </div>
            <div class="slide">
                <div class="pic_text">
                <div class="pic">
                    <div class="img" style="background-image: url({{ URL::asset('frontend/images/img_solution_keyFeatures01.jpg') }});" alt="Key Features 03"></div>
                </div>
                <div class="text">
                    <h3>Store management system</h3>
                    <p>maintenance and repair online appointment, consumer bike situation feedback, maintenance history, members management, and simple operation but enhanced management efficiency and service quality of store management system.</p>
                </div>
                </div>
            </div>
            <div class="slide">
                <div class="pic_text">
                <div class="pic">
                    <div class="img" style="background-image: url({{ URL::asset('frontend/images/img_solution_keyFeatures01.jpg') }});" alt="Key Features 04"></div>
                </div>
                <div class="text">
                    <h3>Cycling data platform</h3>
                    <p>Collect the cyclists’cycling data, user behavior, consumption information and others data; and through categorized users, Big Data analysis, cycling heat map, and bicycle accident location statistics, quantified data as precision marketing, strategy planning, decision-making judgment indicators for enterprises to provide customers with the most accurate service and create the corporate value promotion.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    @include('frontend.shared._contact')
</main>
@endsection

@section('script')

@endsection