<nav>
    <ul>
        <li>
            <a href="{{ route('panel.index') }}"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">解決方案管理</span></a>
            <ul>
                <li><a href="{{ route('solution.video') }}">影片區維護</a></li>
                <li><a href="{{ route('solution.content') }}">圖文區維護</a></li>
                <li><a href="{{ route('solution.aspect') }}">特點維護</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">關於我們管理</span></a>
            <ul>
                <li><a href="{{ route('about.content') }}">圖文區維護</a></li>
                <li><a href="{{ route('about.history') }}">沿革維護</a></li>
                <li><a href="{{ route('about.team') }}">團隊維護</a></li>
                <li><a href="{{ route('about.partner') }}">廠商維護</a></li>
            </ul>
        </li>
        <li>
            <a href=""><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">產品管理</span></a>
        </li>
        <li>
            <a href="{{ route('admin.auth') }}"><i class="fa fa-lg fa-fw fa-lock"></i> <span class="menu-item-parent">權限管理</span></a>
        </li>
    </ul>
</nav>