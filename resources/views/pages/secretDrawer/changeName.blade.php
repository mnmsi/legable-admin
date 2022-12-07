@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('/image/drawer/modalIcon2.svg')}}" alt="" class="img-fluid"/>
                    </div>
                    <div class="row all-form-wrapper mt-5">
                        <div>
                            <h3 class="sub-header3 mb-0">Create new Box</h3>
                            <p class="form-label-2">add a box to this drawer</p>
                        </div>

                        <form action="{{route('drawer.change.name', $id)}}" method="post" id="boxCreateFormId">
                            @csrf

                            <div class="col-12">
                                <input type="hidden" name="prev_url" value="{{$prev_url}}">
                                <div class="form-group input-wrapper">
                                    <label for="name" class="form-label"></label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name', $name) }}" autocomplete="false" autofocus
                                           placeholder="Enter drawer name">
                                    @include('components.utils.form_field_alert', ['name'=>'name'])
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary my-4 submit-btn">Rename Drawer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

