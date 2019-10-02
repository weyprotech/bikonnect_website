<nav>
    <ul>
        <li class="{{ Request::is('backend') ? 'active' : '' }}">
            <a href="{{ route('panel.index') }}"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
        </li>
        <li class="{{ Request::is('backend/solution') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">解決方案管理</span></a>
            <ul>
                <li class="{{ Request::is('backend/solution/video') ? 'active' : '' }}"><a href="{{ route('solution.video') }}">影片區維護</a></li>
                <li class="{{ (Request::is('backend/solution/content') or Request::is('backend/solution/content/*')) ? 'active' : '' }}"><a href="{{ route('solution.content') }}">圖文區維護</a></li>
                <li class="{{ (Request::is('backend/solution/aspect') or Request::is('backend/solution/aspect/*')) ? 'active' : '' }}"><a href="{{ route('solution.aspect') }}">特點維護</a></li>
            </ul>
        </li>
        <li class="{{ Request::is('backend/about') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">關於我們管理</span></a>
            <ul>
                <li class="{{ (Request::is('backend/about/content') or Request::is('backend/about/content/*')) ? 'active' : '' }}"><a href="{{ route('about.content') }}">圖文區維護</a></li>
                <li class="{{ (Request::is('backend/about/history') or Request::is('backend/about/history/*')) ? 'active' : '' }}"><a href="{{ route('about.history') }}">沿革維護</a></li>
                <li class="{{ (Request::is('backend/about/team') or Request::is('backend/about/team/*')) ? 'active' : '' }}"><a href="{{ route('about.team') }}">團隊維護</a></li>
                <li class="{{ (Request::is('backend/about/partner') or Request::is('backend/about/partner/*')) ? 'active' : '' }}"><a href="{{ route('about.partner') }}">廠商維護</a></li>
            </ul>
        </li>
        <li class="{{ (Request::is('backend/product') or Request::is('backend/product/*')) ? 'active' : '' }}">
            <a href=""><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">產品管理</span></a>
        </li>
        <li class="{{ (Request::is('backend/admin') or Request::is('backend/admin/*')) ? 'active' : '' }}">
            <a href="{{ route('admin.auth') }}"><i class="fa fa-lg fa-fw fa-lock"></i> <span class="menu-item-parent">權限管理</span></a>
        </li>
    </ul>
</nav>

