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
                @if($showBtn)
                    @if($content_type !== 'contents')
                        <button class="add-btn addBoxCls" id="{{$btn['id']}}"
                                onclick="{{$btn['fnClick'] ?: ""}}">{{$btn['text']}}</button>
                    @endif
                @endif
            @endif
            @if(count($link)>0)
                @if(is_null($contentId))
                        <button type="button" class="redirect" id="uploadContentBtn" onclick="showContentModal(this)"
                                data-content-type="{{($content_type ?? 'drawer') == 'boxes' ? 'drawer' : 'box'}}"
                                data-content-id="{{$contentId}}">{{$link['text']}}</button>
                @else
                    <button type="button" class="redirect" id="uploadContentBtn" onclick="showAjaxContentModal(this)"
                            data-content-type="{{($content_type ?? 'drawer') == 'boxes' ? 'drawer' : 'box'}}"
                            data-content-id="{{$contentId}}">{{$link['text']}}</button>
                @endif

            @endif
        </div>
    </div>
</div>
