@extends("layouts.app")
@section('title','Add Banking Information')
@section('content')
    @include('includes.pageHeader',['title' => !empty($type) ? 'Add ' . $type : 'Add Information','list'=>['Dashboard',!empty($type) ? 'Add ' . $type : 'Add Information'],'btn'=>[],'link'=>[]])

    <div class="block-min-height block-wrapper">
        <form action="{{route('information.store', $informationId)}}" method="POST">
            @csrf

            @if(old('title'))
                @foreach(old('title') as $key => $title)
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group input-wrapper">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                       name="title[]" required placeholder="Input title here"
                                       value="{{old('title')[$key]}}">
                                @include('components.utils.form_field_alert',['name' => "title.$key"])
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 change-value-wrapper">
                            <div class="form-group input-wrapper input-value">
                                <label for="value" class="form-label">Value</label>
                                <input id="value" type="text" class="form-control @error('value') is-invalid @enderror"
                                       name="data[]" required placeholder="input information here"
                                       value="{{old('data')[$key]}}">
                                @include('components.utils.form_field_alert',['name' => "data.$key"])
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group input-wrapper">
                            <label for="title" class="form-label">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title[]" required placeholder="Input title here">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 change-value-wrapper">
                        <div class="form-group input-wrapper input-value">
                            <label for="value" class="form-label">Value</label>
                            <input id="value" type="text" class="form-control @error('value') is-invalid @enderror"
                                   name="data[]" required placeholder="input information here">
                        </div>
                    </div>
                </div>
            @endif
            <div id="append_area"></div>
            <div class="d-flex justify-content-end">
                <button id="add_more_button" type="button" class="add_more_button"><img
                        src="{{asset("image/document/add_more.svg")}}" alt=""> Add more
                </button>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6">
                    <div class="address_submit_wrapper">
                        <a href="">Cancel</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="address_submit_wrapper">
                        <button type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#add_more_button").on("click", function () {

                $("#append_area").append(`<div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group input-wrapper">
                                    <label for="title" class="form-label">Title</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                           name="title[]" required placeholder="Input title here">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 change-value-wrapper">
                                    <div class="form-group input-wrapper input-value">
                                        <label for="value" class="form-label">Value</label>
                                        <input id="value" type="text" class="form-control @error('value') is-invalid @enderror"
                                              required name="data[]" placeholder="input information here">
                                    </div>
                                </div>
                            </div>`)
            })

            $(document).on("change", "#option", function (e) {
                let value = $(this).val();
                let input = $(this).closest(".select-wrapper").siblings(".change-value-wrapper");
                let file = $(this).closest(".select-wrapper").siblings(".change-file-wrapper");
                let clickable = file.children().children()[2]
                let input_file = file.children().children()[1]
                $(clickable).click(function () {
                    input_file.click();
                })
                if (value == "file") {
                    input.css("display", "none")
                    file.show();
                } else {
                    input.css("display", "block")
                    file.hide();
                }
            })
        })
    </script>
@endsection
