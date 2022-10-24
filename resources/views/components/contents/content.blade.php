<div class="block-wrapper block-min-height content-wrappers">
    <div class="top-block">
        <h6 class="sub-header6 mb-4">
            Drawers
        </h6>
        <div class="conten-items">
            @foreach($drawers as $key => $drawer)
                <x-drawer title="{{$drawer['name']}}" url="{{asset('image/card/card-icon.svg')}}"
                          id="drawer_{{$key}}" :data-drawer="$drawer['id']"
                          :required-pass="$drawer['is_password_required']"/>
            @endforeach
        </div>
    </div>
    <div class="bottom-block">
        <h6 class="sub-header6 mb-4 border-bottom pb-3 mt-4">
            All Contents
        </h6>
        <div class="conten-items">
            @foreach($contents as $content)
                <x-content title="{{$content['name']}}" url="{{asset('image/content/demo1.svg')}}"/>
            @endforeach
        </div>
    </div>
</div>
