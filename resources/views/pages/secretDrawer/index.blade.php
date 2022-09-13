@extends('layouts.app')
@section('content')
    <x-breadcrumb title="Drawers" subtitle="Welcome, IOTA Infotech Limited 👋 " buttonText="+ Add Drawer " link="/drawer/add"/>
    <div class="block-wrapper block-min-height wrapper-block">
        <h3>asd</h3>
        <h3>asd</h3>
        <h3>asd</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade global-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-width">
                <div class="modal-content">
                    <div class="modal-header justify-content-end">
                        <button type="button" class="close p-0 border-0" data-bs-dismiss="modal">
                            <img src="{{asset('/image/drawer/closeIcon.svg')}}" alt="" class="img-fluid"/>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{asset('/image/drawer/modalIcon.svg')}}" alt="" class="img-fluid"/>
                        <div class="row all-form-wrapper mt-5">
                            <div class="col-12">
                                <div class="mb-3">
                                    <h3 class="sub-header3 mb-0">Enter your password</h3>
                                    <label for="dName" class="form-label-2 mb-4">Enter security key to unlock this drawer</label>
                                    <input type="text" class="form-control" id="dName" placeholder="Enter security key">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary my-4 submit-btn">Unlock Drawer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
