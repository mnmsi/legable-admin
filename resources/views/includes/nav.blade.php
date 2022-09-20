<nav class="primary-nav navbar navbar-expand-lg navbar-light bg-white web-main-nav">
    <div class="container-fluid">
        <div class="navbar-nav ms-auto custom-nav-item">
            <a class="nav-link" href="">
                <img src="{{asset('image/common/bell.svg')}}" alt="">
            </a>
            <a class="nav-link" href="#">
                <img src="{{asset('image/common/setting.svg')}}" alt="">
            </a>
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
    </div>
</nav>
