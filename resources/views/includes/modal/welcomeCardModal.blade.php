<!-- Modal -->
<div class="modal fade welcome-card-modal" id="cardModal" tabindex="-1" aria-labelledby="welcome-card-modal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width modal-fit-width">
        <div class="modal-content">
            <div class="modal-body">
                <div class="header">
                    Information Templates
                </div>
                <div class="body-item">

                    @foreach($informationTypes as $info)
                        <a href="{{route('information.add', encrypt($info->id))}}"><p class="add-dash-icon-1"
                                                                             id="infoModalClose">{{$info->name}}</p></a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    a {
        all: unset;
    }
</style>
