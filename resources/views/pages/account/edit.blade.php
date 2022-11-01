@extends("layouts.app")
@section('title','Add new address')
@section('content')
    @include('includes.pageHeader',['title'=>'Account Settings','list'=>['Dashboard','Account Settings'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{-- address form start--}}
            {{--address page header start --}}
            <div class="address_header">
                <h2 class="address_form_title">Personal Information</h2>
                <p>edit and update your personal information</p>
            </div>
            {{--address page header end --}}
            {{-- Input start --}}
            <div class="row">
                <div class="address_input_wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4">
                        {{--  name form--}}
                            <form action="">
                                <div class="form-group input-wrapper">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="address_line_one" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           required autocomplete="false" value="IOTA Infotech Limited" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="name_submit_button">
                                    <button type="submit">Update Name</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4  ">
                            {{--  photo submit form--}}
                            <form action="" class="d-flex justify-content-center flex-column">
                                <img id="avatar" src="{{asset("https://images.unsplash.com/photo-1667222448667-f786c1e91c88?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80")}}" alt="avatar" height="100px" width="100px" style="border-radius: 50%; object-fit: cover; cursor: pointer; margin: 0 auto 24px  auto">
                                <input type="file" hidden id="file" accept="image/*">
                                <button class="photo_upload_button"><img src="" alt=""><img src="{{asset("image/Auth/upload.png")}}" alt=""> Upload Photo</button>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <div class="info_section_break"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="region" class="form-label">Email Address</label>
                                <input id="region" type="text"
                                       class="form-control" name="region"
                                       autocomplete="false" value="iotait@gmail.com" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="form-group input-wrapper">
                                <label for="region" class="form-label">Phone Number</label>
                                <input id="region" type="text"
                                       class="form-control" name="region"
                                       autocomplete="false" value="+880 12345678910" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Input end --}}
        {{-- address form end--}}
    </div>
@endsection
@section("script")
    <script>
        $(document).ready(function() {
            $("#avatar").on("click",function (){
               $("#file").click();
            });
            $("#file").on("change",function (e){
                if(e.target.files[0]){
                    $("#avatar").attr("src",URL.createObjectURL(e.target.files[0]))
                }
            });
        });
    </script>
@endsection
