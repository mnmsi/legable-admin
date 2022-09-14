<nav class="primary-nav navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
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
                            <img src="{{asset('image/common/profile.svg')}}" alt="" class="img-fluid avatar">
                        </li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
{{--                <a class="nav-link active" aria-current="page" href="#">--}}
{{--                    <img src="{{asset('image/common/profile.svg')}}" alt="profile">--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
</nav>
