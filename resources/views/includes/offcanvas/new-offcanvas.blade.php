<div class="offcanvas add-new-offcanvas offcanvas-bottom" tabindex="-1" id="newOffcanvas"
 aria-labelledby="offcanvasBottomLabel">
 <div class="offcanvas-header">
  <h5 class="offcanvas-title" id="offcanvasBottomLabel">Create New</h5>
  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="closeNewOffcanvas"
   style="background: url({{ asset('image/common/close.svg') }})no-repeat center;"></button>
 </div>
 <div class="offcanvas-body small">
  <ul class="offcanvas-menu">
   <li id="openNewInfo"><a href="javascript:void(0)"><img src="{{ asset('image/off-canvas/new-info.svg') }}"
      alt="">New
     Information</a></li>
   <li><a href="#"><img src="{{ asset('image/off-canvas/create.svg') }}" alt="">Create Box</a></li>
   <li><a href="#"><img src="{{ asset('image/off-canvas/drawer.svg') }}" alt="">New Drawer</a></li>
  </ul>
 </div>
</div>
