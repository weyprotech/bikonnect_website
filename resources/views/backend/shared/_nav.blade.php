<nav>
    <ul>
        <li class="{{ Request::is('backend') ? 'active' : '' }}">
            <a href="{{ route('panel.index') }}"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
        </li>
        <li class="{{ (Request::is('backend/banner') or Request::is('backend/banner/*')) ? 'active' : '' }}">
            <a href="{{ route('banner.index') }}"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">輪播圖管理</span></a>
        </li>

        <li class="{{ Request::is('backend/homepage/*') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">首頁管理</span></a>
            <ul>
                <li class="{{ Request::is('backend/homepage/content1/*') ? 'active' : '' }}"><a href="{{ route('content1.edit',[1]) }}">內文(1)維護</a></li>
                <li class="{{ Request::is('backend/homepage/content2/*') ? 'active' : '' }}"><a href="{{ route('content2.index') }}">內文(2)維護</a></li>
                <li class="{{ Request::is('backend/homepage/content3/*') ? 'active' : '' }}"><a href="{{ route('content3.index') }}">內文(3)維護</a></li>
                <li class="{{ Request::is('backend/homepage/content4/*') ? 'active' : '' }}"><a href="{{ route('content4.edit',[1]) }}">內文(4)維護</a></li>
            </ul>
        </li>

        <li class="{{ Request::is('backend/solution/*') ? 'active' : '' }}">
            <a href="{{ route('solution.index') }}"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">解決方案管理</span></a>
        </li>
        <li class="{{ Request::is('backend/about') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">關於我們管理</span></a>
            <ul>
                <li class="{{ (Request::is('backend/about/content') or Request::is('backend/about/content/*')) ? 'active' : '' }}"><a href="{{ route('about.content') }}">圖文區維護</a></li>
                <li class="{{ (Request::is('backend/about/history_title')) ? 'active' : '' }}"><a href="{{ route('about.history_title') }}">沿革標題維護</a></li>
                <li class="{{ (Request::is('backend/about/history') or Request::is('backend/about/history/*')) ? 'active' : '' }}"><a href="{{ route('about.history') }}">沿革維護</a></li>
                <li class="{{ (Request::is('backend/about/team') or Request::is('backend/about/team/*')) ? 'active' : '' }}"><a href="{{ route('about.team') }}">團隊維護</a></li>
                <li class="{{ (Request::is('backend/about/partner') or Request::is('backend/about/partner/*')) ? 'active' : '' }}"><a href="{{ route('about.partner') }}">廠商維護</a></li>
            </ul>
        </li>
        <li class="{{ Request::is('backend/blog') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">部落格管理</span></a>
            <ul>
                <li class="{{ Request::is('backend/blog/category') ? 'active' : '' }}"><a href="{{ route('blog.category') }}">類別維護</a></li>
                <li class="{{ (Request::is('backend/blog/content') or Request::is('backend/blog/content/*')) ? 'active' : '' }}"><a href="{{ route('blog.content') }}">部落格維護</a></li>
            </ul>
        </li>

        <li class="{{ (Request::is('backend/product') or Request::is('backend/product/*')) ? 'active' : '' }}">
            <a href="{{ route('product.index') }}"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">產品管理</span></a>
        </li>

        <li class="{{ Request::is('backend/contact') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">連絡我們管理</span></a>
            <ul>
                <li class="{{ Request::is('backend/contact/contact/edit/1') ? 'active' : '' }}"><a href="{{ route('contact.edit',[1]) }}">聯絡我們維護</a></li>
                <li class="{{ Request::is('backend/contact/email/*') ? 'active' : '' }}"><a href="{{ route('contact.email_index') }}">信箱維護</a></li>                
                <li class="{{ Request::is('backend/contact/mail/*') ? 'active' : '' }}"><a href="{{ route('contact.contact_mail') }}">信件維護</a></li>
            </ul>
        </li>

        <li class="{{ Request::is('backend/privacy/*') ? 'active' : '' }}">
            <a href="{{ route('privacy.index') }}"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">隱私權管理</span></a>
        </li>

        <li class="{{ Request::is('backend/term/*') ? 'active' : '' }}">
            <a href="{{ route('term') }}"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">條款管理</span></a>           
        </li>

        <li class="{{ (Request::is('backend/admin') or Request::is('backend/admin/*')) ? 'active' : '' }}">
            <a href="{{ route('admin.auth') }}"><i class="fa fa-lg fa-fw fa-lock"></i> <span class="menu-item-parent">權限管理</span></a>
        </li>
    </ul>
</nav>

