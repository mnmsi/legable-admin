<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="res-off-canvas-content-wrapper">
            <div class="res-off-canvas-header">
                <div class="res-profile-wrapper">
                    <div class="res-profile-image-wrapper">
                        <img src="{{asset('image/common/profile.svg')}}" alt="image">
                    </div>
                    <div class="res-profile-name_wrapper">
                        <div class="res-profile-name">
                            IOTA Infotech Ltd.
                        </div>
                        <div class="res-profile-member-tag">
                            Premium Member
                        </div>
                    </div>
                </div>
            </div>
            {{--            offcanvas menu start--}}
            <div class="res-off-canvas-menu">
                {{--            single menu item--}}
                <a href="/"
                   class="single-menu-wrapper {{ (request()->is('/') || request()->is('search-empty')) ? 'active' : '' }}">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/dashboard.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">Dashboard</div>
                    </div>
                </a>
                {{--            single menu item--}}
                {{--            single menu item--}}
                <a href="/drawer" class="single-menu-wrapper {{ (request()->segment(1)=='drawer') ? 'active' : '' }}">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/secret.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">Secret Drawers</div>
                    </div>
                </a>
                {{--            single menu item--}}
                {{--            single menu item--}}
                <a href="/content" class="single-menu-wrapper {{ (request()->segment(1)=='content') ? 'active' : '' }}">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/inbox.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">All Contents</div>
                    </div>
                </a>
                {{-- single menu item --}}
                {{-- single menu item --}}
                {{--   Menu Break Title start --}}
                <div class="menu-break-title-wrapper">
                    <div class="menu-break-title">Device and Security</div>
                </div>
                {{--   Menu Break Title end --}}
                {{--   single menu item--}}
                {{--            single menu item--}}
                <a href="/device" class="single-menu-wrapper {{request()->is("device") ? "active" : ""}}">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/device.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">Devices</div>
                    </div>
                </a>
                {{-- single menu item --}}
                {{--            single menu item--}}
                <a href="/account-settings"
                   class="single-menu-wrapper {{request()->is("account-settings") ? "active" : ""}}">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/account.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">Account Settings</div>
                    </div>
                </a>
                {{-- single menu item --}}
                {{--   single menu item--}}
                <a href="/security-settings"
                   class="single-menu-wrapper {{request()->is("security-settings") ? "active" : ""}}">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/security.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">Security Settings</div>
                    </div>
                </a>
                {{-- single menu item --}}
                {{--   Menu Break Title start --}}
                <div class="menu-break-title-wrapper">
                    <div class="menu-break-title">Plans & Subscriptions</div>
                </div>
                {{--   Menu Break Title end --}}
                {{--            single menu item--}}
                <a href="/my-plans" class="single-menu-wrapper {{request()->is("my-plans") ? "active" : ""}} ">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/dimond.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">My Plans</div>
                    </div>
                </a>
                {{-- single menu item --}}
                {{--            single menu item--}}
                <a href="/billing" class="single-menu-wrapper {{request()->is("billing") ? "active" : ""}}">
                    <div class="menu-content-wrapper">
                        <div class="icon-wrapper">
                            <img src="{{asset("image/sidebar/billing-info.svg")}}" alt="icon">
                        </div>
                        <div class="link-name">Billing Info</div>
                    </div>
                </a>
                {{-- single menu item --}}
                {{--  logout start--}}
                <div class="logout-button-wrapper">
                    <a href="#">
                        <img src="{{asset("image/sidebar/logout.svg")}}" alt="image">
                        Logout
                    </a>
                </div>
                {{--   logout end--}}
            </div>
            {{--  offcanvas menu end--}}
        </div>
    </div>
</div>
