<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
            <!--begin::Header Nav-->
            <ul class="menu-nav">

                @can('member-list')
                    <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                        <a href="{{ route('members.index') }}" class="menu-link">
                            <span class="menu-text">Members</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                @endcan

                @can('event-list')
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="{{ route('events.index') }}" class="menu-link">
                            <span class="menu-text">Events</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                @endcan

                @can('lifestyle-list')
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="{{ route('lifestyle.index') }}" class="menu-link">
                            <span class="menu-text">Lifesyle</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                @endcan

                @can('music-list')
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="{{ route('music.index') }}" class="menu-link">
                            <span class="menu-text">Music</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                @endcan
            </ul>
            <!--end::Header Nav-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item">
                    <a href="#">Notification</a>
                </div>
                <!--end::Toggle-->
            </div>
            <!--end::Notifications-->
            <!--begin::User-->
            <div class="topbar-item">
                @if (Auth::check())
                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->first_name }}</span>
                        <span class="symbol symbol-35 symbol-light-success">
                                <span class="symbol-label font-size-h5 font-weight-bold">{{ substr(strtoupper(Auth::user()->first_name), 0, 1) }}</span>
                        </span>
                    </div>
                @endif
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
