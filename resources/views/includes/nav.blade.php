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
                    @foreach($notifications->data as $notification)
                        <li class="notification_element {{!$notification->seen ? 'active' : ''}}" {{!$notification->seen ? "onclick=updateNotificationStatus(".$notification->id.")" : ""}}>
                            <div class="notification_text_icon">
                                <div class="notification_icon">
                                    <img src="{{asset("image/bell.png")}}" alt="image">
                                </div>
                                <div class="notification_text">
                                    {{$notification->title}} <br>
                                    {{$notification->details}}
                                </div>
                            </div>
                            <div class="time">{{\Carbon\Carbon::parse($notification->date)->ago()}}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{--  notification end--}}
            <a href="{{route('security.settings')}}" class="nav-link">
                <img src="{{asset('image/common/setting.svg')}}" alt="">
            </a>
            <div class="dropdown dropdown-list">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img
                        src="{{Auth::user()->avatar ?get_image(Auth::user()->avatar) : asset("image/common/profile.svg")}}"
                        alt="profile" height="40" width="40px" style="border-radius: 50%">
                </a>

                <ul class="dropdown-menu user-profile">
                    <li class="u-profile">
                        <div class="p-image">
                            <img src="{{Auth::user()->avatar ?get_image(Auth::user()->avatar) : asset("image/common/profile.svg")}}" alt="" class="img-fluid avatar">
                            <img src="{{asset('image/sidebar/badge.png')}}" alt="" class="badgeIcon">
                        </div>
                        <p>
                            <label>IOTA Infotech Ltd.</label>
                            @if(!check_plan())
                                <label>Free Membership</label>
                            @else
                                <label>Paid Membership</label>
                            @endif
                        </p>
                    </li>
                    <li class="body-item">
                        <a class="dropdown-item" href="/account-settings">
                            <img src="{{asset('image/sidebar/icon1.png')}}" alt=""/>
                            <label>Account Settings</label>
                        </a>
                    </li>
                    <li class="body-item">
                        <a class="dropdown-item" href="{{route('myPlan.my-plan')}}">
                            <img src="{{asset('image/sidebar/icon2.png')}}" alt=""/>
                            <label>My Plan</label>
                        </a>
                    </li>
                    <li class="body-item">
                        <a class="dropdown-item" href="javascript:void(0)" id="helpAndSupport">
                            <img src="{{asset('image/sidebar/icon3.png')}}" alt=""/>
                            <label>Help & Support</label>
                        </a>
                    </li>

                    @if(!check_plan())
                        <li class="body-item">
                            <a class="dropdown-item go-pro" href="{{route('myPlan.my-plan')}}">
                                <img src="{{asset('image/sidebar/icon4.png')}}" alt=""/>
                                <label>Upgrade to Pro</label>
                            </a>
                        </li>
                    @endif

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
