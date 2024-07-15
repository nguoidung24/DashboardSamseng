<div>
    <div class="logo-wrapper" style="position: relative">
        <a style="display: block; color: white; font-weight: bold; letter-spacing: 5px; font-size: 20px; position: absolute;top: 50%; transform: translateY(-50%); left: 40%; transform: translateX(-50%);"
            href="/">
            SAMSENG
        </a>
        <div class="back-btn">
            <i data-feather="grid">
            </i>
        </div>
        <div class="toggle-sidebar icon-box-sidebar">
            <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
            {{-- 📌 --}}
        </div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="/">
            <div class="icon-box-sidebar">
                <i data-feather="grid">
                </i>
            </div>
        </a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow">
            <i data-feather="arrow-left">
            </i>
        </div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="menu-box">
                    <ul>
                        @foreach ($menu as $item)
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ $item['link'] }}">
                                    <i data-feather="{{ $item['icon'] }}">
                                    </i>
                                    <span class="position-relative">
                                        {{ $item['text'] }}
                                        {{-- Badge --}}
                                        &nbsp;
                                        &nbsp;
                                        <span id="<?= $item['__id'] ?>">

                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                        {{-- <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/products">
                                <i data-feather="list">
                                </i>
                                <span>Sản phẩm</span>
                            </a>
                        </li> --}}
                        {{-- <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i data-feather="git-pull-request">
                                </i>
                                <span class="">File manager</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a class="" href="index.html">Default</a>
                                </li>
                                <li>
                                    <a class="" href="dashboard-02.html">Ecommerce</a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow">
            <i data-feather="arrow-right">
            </i>
        </div>
    </nav>
</div>
