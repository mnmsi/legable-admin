@extends("layouts.app")
@section('title','Add Banking Information')
@section('content')
    @include('includes.pageHeader',['title'=>'Add Banking Information','list'=>['Dashboard','Add Banking Information'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        <form action="">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="form-group input-wrapper">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="Input title here">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="form-group input-wrapper">
                        <label for="option" class="form-label">Select Type</label>
                        <select name="" id="option" class="form-select info_form_select_wrapper">
                            <option selected value="text">Text</option>
                            <option  value="file">File</option>
                        </select>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="form-group input-wrapper input-value">
                        <label for="value" class="form-label">Value</label>
                        <input id="value" type="text" class="form-control @error('value') is-invalid @enderror" name="value" required placeholder="input information here">
                        @error('value')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div id="append_area">

            </div>
            <div class="d-flex justify-content-end">
                <button id="add_more_button" type="button" class="button">Add more</button>
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
            $("#add_more_button").on("click",function (){
                $("#append_area").append(`

<div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="form-group input-wrapper">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="Input title here">
                        @error('title')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group input-wrapper">
                    <label for="option" class="form-label">Select Type</label>
                    <select name="" id="option" class="form-select info_form_select_wrapper">
                        <option selected value="text">Text</option>
                        <option  value="file">File</option>
                    </select>
@error('title')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group input-wrapper">
                    <label for="value" class="form-label">Value</label>
                    <input id="value" type="text" class="form-control @error('value') is-invalid @enderror" name="value" required placeholder="input information here">
                        @error('value')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
            </div>
        </div>


`)
            })
            $(document).on("change","#option",function (e){
                let value = $(this).val();
               let input =  $(this).find(".input-value");
                console.log(input)
            })
        })
    </script>
@endsection
