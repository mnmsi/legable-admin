<div class="content-block {{$requiredPass ? 'drawers' : 'public-drawer'}}" id="{{ $id }}" data-drawer-name="{{$drawerName}}" data-drawer="{{$dataDrawer}}"
     onclick="{{$click}}">
    <img src="{{ $url }}" alt="" class="img-fluid"/>
    <h2 class="sub-header2 drawer-title mb-0">{{ Str::limit( $title,20,'...')  }}</h2>
</div>
