<div class="offcanvas add-new-offcanvas info-offcanvas offcanvas-bottom" tabindex="-1" id="informationOfCanvas"
     aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Information Templates </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
                id="closeNewOffcanvas"
                style="background: url({{ asset('image/common/close.svg') }})no-repeat center;"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="offcanvas-menu">
{{--            <li id="openNewInfo"><a href="javascript:void(0)"><img src="{{ asset('image/off-canvas/new-info.svg') }}"--}}
{{--                                                                   alt="">New Information</a></li>--}}
            @foreach($informationTypes as $info)
                <li><a href="{{route('information.add', encrypt($info->id))}}"><img
                            src="{{ asset('image/off-canvas/create.svg') }}" alt="">{{$info->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
