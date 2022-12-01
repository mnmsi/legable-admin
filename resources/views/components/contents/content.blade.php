@include('includes.pageHeader',['title'=>'All Contents','list'=>['Dashboard','All Contents'],'btn'=> [ 'id'=>'add_box','text'=>'+ Add Box', 'fnClick' => $drawerFn ?? "" ],'link'=>['url'=>route('file.upload', [($content_type ?? 'drawer')=>($drawer_id ?? 'all')]),'text'=>'Upload Content'], 'showBtn' => $showBtn ?? true, 'contentType' => $content_type ?? 'drawer'])
<div class="block-wrapper block-min-height content-wrappers">
    <div class="top-block">
        <h6 class="sub-header6 mb-4 text-capitalize">
            {{$content_type ?? "Drawers"}}
        </h6>
        <div class="conten-items">
            @foreach($drawers as $key => $drawer)
                <x-drawer title="{{$drawer['name']}}" url="{{asset('image/card/card-icon.svg')}}"
                          id="drawer_{{$key}}" :data-drawer="$drawer['id']"
                          :required-pass="$drawer['is_password_required']" :drawer-name="$drawer['name']"
                          :type="$drawer['content_type']"/>
            @endforeach
        </div>
    </div>
    <div class="bottom-block">
        <h6 class="sub-header6 mb-4 border-bottom pb-3 mt-5">
            All Contents
        </h6>
        <div class="conten-items">
            @foreach($contents as $content)
                <x-content :type="$content['content_type']" :required-pass="$content['is_password_required']"
                           title="{{$content['name']}}" url="{{asset('image/content/demo1.svg')}}"
                           id="{{$content['id']}}"/>
            @endforeach
        </div>
    </div>
</div>
