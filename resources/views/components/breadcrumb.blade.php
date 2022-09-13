<div class="page-title-wrapper">
    <div class="page-name-wrapper">
        <h2>{{$title}}</h2>
    </div>
    <div class="icon-button-wrapper">
        <p>{{$subtitle}}</p>
        @if($buttonText != "")
            <a href="{{$link}}"><img src="{{$buttonIcon}}" alt="image">
                <div>{{$buttonText}}</div>
            </a>
        @endif
    </div>
</div>
