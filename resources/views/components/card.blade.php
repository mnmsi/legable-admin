<div class="document-card  {{$requiredPass? 'drawers' : 'public-drawer'}}" id="{{ $id }}" data-drawer-name="{{$drawerName}}" data-drawer="{{$dataDrawer}}" onclick="{{$click}}">
    <div class="document-card-content-wrapper">
        <div class="card-icon-wrapper">
            <div class="card-icon">
                <img src="{{ $icon }}" alt="icon">
            </div>
            <div class="dropdown">
                <div class="three-dot" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                    <img src="{{ asset('image/card/dots.svg') }}" alt="dots">
                </div>
                <ul class="dropdown-menu card-dropdown" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{$id}}">Change Password</a></li>
                    <li><a class="dropdown-item" href="{{$id}}">Rename Drawer</a></li>
                    <li><a class="dropdown-item" href="{{$id}}">Delete Drawer</a></li>
                </ul>
            </div>
        </div>
        <div class="document-card-footer">
            <div class="document-card-footer-content-wrapper">
                <div>
                    <h2 class="document-footer-title">{{ $title }}</h2>
                    <p class="document-footer-date">{{ $date }}</p>
                </div>
                @if($requiredPass)
                    <div class="document-lock-icon">
                        <img src="{{ asset('image/card/lock.svg') }}" alt="lock">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
