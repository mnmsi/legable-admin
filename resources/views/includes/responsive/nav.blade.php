{{--please use 'res' as prepend when add class for responsive--}}
<nav class="res-nav">
    <div class="res-navbar-wrapper">
        <div data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="{{asset('image/common/expandNav.svg')}}" alt="">
        </div>
        <div class="res-page-name">@yield('title')</div>
        <div class="res-profile-icon-wrapper">
            <div class="res-help-icon">
                <a href="#"><img src="{{asset('image/common/help.svg')}}" alt=""></a>
            </div>
            <div class="dropdown dropdown-list">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('image/common/profile.svg')}}" alt="profile">
                </a>

                <ul class="dropdown-menu user-profile">
                    <li class="u-profile">
                        <div class="p-image">
                            <img src="{{asset('image/common/profile.svg')}}" alt="" class="img-fluid avatar">
                            <img src="{{asset('image/sidebar/badge.png')}}" alt="" class="badgeIcon">
                        </div>
                        <p>
                            <label>IOTA Infotech Ltd.</label>
                            <label>Free Membership</label>
                        </p>
                    </li>
                    <li class="body-item">
                        <a class="dropdown-item" href="/account-settings">
                            <img src="{{asset('image/sidebar/icon1.png')}}" alt=""/>
                            <label>Account Settings</label>
                        </a>
                    </li>
                    <li class="body-item">
                        <a class="dropdown-item" href="#">
                            <img src="{{asset('image/sidebar/icon2.png')}}" alt=""/>
                            <label>My Plan</label>
                        </a>
                    </li>
                    <li class="body-item">
                        <a class="dropdown-item" href="#">
                            <img src="{{asset('image/sidebar/icon3.png')}}" alt=""/>
                            <label>Help & Support</label>
                        </a>
                    </li>
                    <li class="body-item">
                        <a class="dropdown-item go-pro" href="#">
                            <img src="{{asset('image/sidebar/icon4.png')}}" alt=""/>
                            <label>Upgrade to Pro</label>
                        </a>
                    </li>
                    <li class="sign-out">
                        <a class="dropdown-item" href="#">
                            <img src="{{asset('image/sidebar/icon5.png')}}" alt=""/>
                            <label>Sign out</label>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- search bar--}}
        {{-- search bar end --}}
    </div>
    <div class="searchbar-wrapper">
        <div class="searchbar-content-wrapper">
            <label for="search"><img src="{{asset('image/common/search-black.svg')}}" alt="search"></label>
            <input type="text" id="search" placeholder="Search anything">
        </div>
    </div>
</nav>
