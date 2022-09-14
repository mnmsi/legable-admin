<div class="page-title-wrapper">
    <div class="page-name-wrapper">
        <h2>{{$title}}</h2>
    </div>
    <div class="icon-button-wrapper">
        <div class="header-list">
            <ul>
                @forelse($list as $li)
                    <li>{{$li}}</li>
                @empty
                    <li></li>
                @endforelse
            </ul>
        </div>
        <div class="header-btn">
            @if(count($btn)>0)
                <button class="add-btn" id="{{$btn['id']}}">{{$btn['text']}}</button>
            @endif
            @if(count($link)>0)
                <a href="{{$link['url']}}" class="redirect">{{$link['text']}}</a>
            @endif
        </div>
    </div>
</div>
