<div class="document-card" id="{{$id}}">
    <div class="document-card-content-wrapper">
        <div class="card-icon-wrapper">
            <div class="card-icon">
                <img src="{{$icon}}" alt="icon">
            </div>
            <div class="three-dot pe-4">
                <img src="{{asset("image/card/dots.svg")}}" alt="dots">
            </div>
        </div>
        <div class="document-card-footer">
            <div class="document-card-footer-content-wrapper">
                <div>
                    <h2 class="document-footer-title">{{$title}}</h2>
                    <p class="document-footer-date">{{$date}}</p>
                </div>
                <div class="document-lock-icon">
                    <img src="{{asset('image/card/lock.svg')}}" alt="lock">
                </div>
            </div>
        </div>
    </div>
</div>
