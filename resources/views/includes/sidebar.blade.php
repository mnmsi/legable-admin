<aside class="sidebar-wrapper" id="sidebar">
    <div class="sidebar-wrapper-content-wrapper">
        <div class="sidebar-sticky-wrapper">
            <div class="logo-wrapper">
                <a href="/"><img src="{{asset('image/common/logo.svg')}}" alt=""></a>
            </div>
            {{-- search bar--}}
            <div class="searchbar-wrapper">
                <div class="searchbar-content-wrapper">
                    <label for="search"><img src="{{asset('image/common/search.svg')}}" alt="search"></label>
                    <input type="text" id="search" placeholder="Search anything" onkeyup="search('{{route('search')}}', this)">
                    <div id="suggestion"></div>
                </div>
            </div>
        </div>
        {{-- search bar end --}}
        {{--        sidebar menu start--}}
        <div class="sidebar-menu">
            {{--            single menu item--}}
            <a href="/"
               class="single-menu-wrapper {{ (request()->is('/') || request()->is('search-empty')) ? 'active' : '' }}" id="dashboard">
                <div class="menu-content-wrapper">
                    <div class="icon-wrapper">
                        <img src="{{asset("image/sidebar/dashboard.svg")}}" alt="icon">
                    </div>
                    <div class="link-name">Dashboard</div>
                </div>
            </a>
            {{--            single menu item--}}
            {{--            single menu item--}}
            <a href="/drawer" class="single-menu-wrapper {{ (request()->segment(1)=='drawer') ? 'active' : '' }}" id="secretDrawer">
                <div class="menu-content-wrapper">
                    <div class="icon-wrapper">
                        <img src="{{asset("image/sidebar/secret.svg")}}" alt="icon">
                    </div>
                    <div class="link-name">Secret Drawers</div>
                </div>
            </a>
            {{--            single menu item--}}
            {{--            single menu item--}}
            <a href="/content" class="single-menu-wrapper {{ (request()->segment(1)=='content') ? 'active' : '' }}" id="content">
                <div class="menu-content-wrapper">
                    <div class="icon-wrapper">
                        <img src="{{asset("image/sidebar/inbox.svg")}}" alt="icon">
                    </div>
                    <div class="link-name">All Contents</div>
                </div>
            </a>
            {{-- single menu item --}}
            {{--   Menu Break Title start --}}
            <div class="menu-break-title-wrapper">
                <div class="menu-break-title">Device and Security</div>
            </div>
            {{--   Menu Break Title end --}}
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
            <a href="/security/settings"
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
            {{--   Menu Break Title start --}}
            <div class="menu-break-title-wrapper">
                <div class="menu-break-title user_profile_break">Profile</div>
            </div>
            {{--   Menu Break Title end --}}
            {{--   Profile start  --}}
            <div class="profile-wrapper">
                <div class="profile-image">
                    <img src="{{asset("image/common/profile.svg")}}" alt="image">
                </div>
                <div>
                    <div class="profile-name">IOTA infotech Ltd.</div>
                    <div class="subscription-type">Premium Member</div>
                </div>
            </div>
            {{--   Profile end  --}}
            {{--  logout start--}}
            <div class="logout-button-wrapper">
                <form method="POST" action="{{ route('logout') }}" id="logoutform">
                    @csrf
                    <a href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit();">
                        <img src="{{asset("image/sidebar/logout.svg")}}" alt="image">
                        <div>Log out</div>
                    </a>
                </form>
            </div>
            {{--   logout end--}}
        </div>
        {{-- sidebar menu end--}}
    </div>
</aside>
