@extends('website.layout.main')

@push('title')
    <title>Edit Profile</title>
@endpush
@section('midsection')

<!-- bradcam_area  -->
<div class="bradcam_area breadcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Edit Profile</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ edit user section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Edit Profile</h2>
            </div>
            @if (session('fail'))
                <div class="my-3">
                    <span class="alert alert-danger">
                        {{session('fail')}}
                    </span>
                </div>
            @endif
            @if (session('success'))
                <div class="my-3">
                    <span class="alert alert-success">
                        {{session('success')}}
                    </span>
                </div>
            @endif
            <div class="col-lg-12">
                <form class="form-contact contact_form" action="{{url('/user_profile/'.$data->id)}}" method="post" id="userRegistrationForm" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter name">
                                    @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="Enter email">
                                    @error('email')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-control">
                                    <label>Gender</label>
                                    <input type="radio" name="gender" id="gender" value="Male" @if ($data->gender == 'Male') checked @endif>Male
                                    <input type="radio" name="gender" id="gender2" value="Female" @if ($data->gender == 'Female') checked @endif>Female
                                </div>
                                @error('gender')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group form-control">
                                    <label class="mb-2">Language </label>
                                    @php
                                        $language = explode(',',$data->language);
                                    @endphp
                                    <input type="checkbox" name="language[]" value="Hindi" id="hindi" @if (in_array('Hindi', $language)) checked @endif>
                                    <label for="hindi">Hindi</label>
                                    <input type="checkbox" name="language[]" value="English" id="english" @if (in_array('English', $language)) checked @endif>
                                    <label for="english">English</label>
                                    <input type="checkbox" name="language[]" value="Gujarati" id="gujarati" @if (in_array('Gujarati', $language)) checked @endif>
                                    <label for="gujarati">Gujarati</label>
                                </div>
                                @error('language')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <img src="{{url('website/upload/images/user/'.$data->image)}}" alt="$data->image" width="100px" />
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-userRegistrationForm btn_4 boxed-btn">Update Profile</button>
                    </div>
                </form>
            </div>
            <!-- <div class="col-lg-3">
            </div> -->
        </div>
    </div>
</section>
<!-- ================ edit user section end ================= -->

@endsection