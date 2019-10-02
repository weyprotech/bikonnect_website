<header id="header">
    <div class="header_inner"><a class="header_logo" href="{{ route('main.index') }}"><img class="retina" src="{{ URL::asset('frontend/images/logo.png') }}" alt="Bikonnect"></a>
        <nav class="header_nav">
        <ul>
            <li><a href="{{ route('main.solution') }}">Solution</a></li>
            <li><a href="javascript:;">Products</a>
            <ul>
                <li><a href="product01.html">Cyling Data Platform</a></li>
                <li><a href="product02.html">E-Bike App</a></li>
                <li><a href="product03.html">Smart Lock for E-Bike</a></li>
                <li><a href="product04.html">E-Bike store management system</a></li>
                <li><a href="product05.html">E-Bike computer</a></li>
            </ul>
            </li>
            <li><a href="{{ route('main.about') }}">About Us</a></li>
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