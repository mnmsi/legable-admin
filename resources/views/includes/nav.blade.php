<nav class="primary-nav navbar navbar-expand-lg navbar-light bg-white web-main-nav">
    <div class="container-fluid">
        <div class="navbar-nav ms-auto custom-nav-item">
            {{-- notification start --}}
            <div class="dropdown notification_process">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('image/common/bell.svg')}}" alt="">
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="notification_panel_title">Notification</li>
                    <li class="notification_element active">
                        <div class="notification_text_icon">
                            <div class="notification_icon">
                                <img src="{{asset("image/bell.png")}}" alt="image">
                            </div>
                            <div class="notification_text">
                                Hi, IOTA Infotech Limited!
                                Your plan will be <strong>renewed in 5 days</strong>.
                            </div>
                        </div>
                        <div class="time">1hr ago</div>
                    </li>
                    <li class="notification_element">
                        <div class="notification_text_icon">
                            <div class="notification_icon">
                                <img src="{{asset("image/bell.png")}}" alt="image">
                            </div>
                            <div class="notification_text">
                                Hi, IOTA Infotech Limited!
                                Your plan will be <strong>renewed in 5 days</strong>.
                            </div>
                        </div>
                        <div class="time">1hr ago</div>
                    </li>
                </ul>
            </div>
            {{--  notification end--}}
            <a href="{{route('security.settings')}}" class="nav-link">
                <img src="{{asset('image/common/setting.svg')}}" alt="">
            </a>
            <div class="dropdown dropdown-list">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{get_image(Auth::user()->avatar)}}" alt="profile" height="40" width="auto">
                </a>

                <ul class="dropdown-menu user-profile" >
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
                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                            @csrf
                            <a class="dropdown-item" href="javascript:void(0)"
                               onclick="document.getElementById('logoutForm').submit();">
                                <img src="{{asset('image/sidebar/icon5.png')}}" alt=""/>
                                <label class="sign_out_button">Sign out</label>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</nav>
