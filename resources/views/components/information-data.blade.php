<div class="content-block-2 text-decoration-none" id="{{ $id }}" onclick="getInformationData('{{ $id }}')">
    <img src="{{$url}}" alt="" class="img-fluid top-icon"/>
    <div class="footer-item">
        <p>{{Str::limit($name,20,'...')}}</p>
        <img src="{{asset('image/content/lockIcon.svg')}}" alt="" class="img-fluid"/>
    </div>
</div>
