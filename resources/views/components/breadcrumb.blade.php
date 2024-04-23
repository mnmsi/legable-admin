<div class="page-title-wrapper">
    <div class="page-name-wrapper">
        <h2>{{$title}}</h2>
    </div>
    <div class="icon-button-wrapper">
        <p>{{$subtitle}}</p>
        @if($buttonText != "")
            @if($id == "")
                <a href="{{$link}}">
                    @if($buttonIcon != "")
                        <img src="{{$buttonIcon}}" alt="image">
                    @endif
                    <div>{{$buttonText}}</div>
                </a>
            @else
                <button id="{{$id}}">
                    @if($buttonIcon != "")
                        <img src="{{$buttonIcon}}" alt="image">
                    @endif
                    <div>{{$buttonText}}</div>
                </button>
            @endif
        @endif
    </div>
</div>
