@extends('website.layout.main')

@push('title')
    <title>Sign Up</title>
@endpush
@section('midsection')

<!-- bradcam_area  -->
<div class="bradcam_area breadcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Sign Up</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ user registration section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Registration</h2>
            </div>
            <div class="col-12 text-center">
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
            </div>
            <div class="col-lg-12">
                <form class="form-contact contact_form" action="{{url('/user_registration')}}" method="post" id="userRegistrationForm" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter name">
                                    @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Enter username">
                                    @error('username')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter email">
                                    @error('email')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                    @error('password')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password">
                                    @error('cpassword')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-control">
                                    <label class="mb-2">Gender</label>
                                    <input type="radio" name="gender" id="gender" value="Male" @if (old('gender') == 'Male') checked @endif>Male
                                    <input type="radio" name="gender" id="gender2" value="Female" @if (old('gender') == 'Female') checked @endif>Female
                                </div>
                                @error('gender')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group form-control">
                                    <label class="mb-2">Language </label>
                                    <input type="checkbox" name="language[]" value="Hindi" id="hindi" @if (in_array('Hindi', old('language', []))) checked @endif>
                                    <label for="hindi">Hindi</label>
                                    <input type="checkbox" name="language[]" value="English" id="english" @if (in_array('English', old('language', []))) checked @endif>
                                    <label for="english">English</label>
                                    <input type="checkbox" name="language[]" value="Gujarati" id="gujarati" @if (in_array('Gujarati', old('language', []))) checked @endif>
                                    <label for="gujarati">Gujarati</label>
                                </div>
                                @error('language')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Image</label>
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
                        <button type="submit" class="button button-userRegistrationForm btn_4 boxed-btn">Register</button>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <a href="{{url('/user_login')}}">Click here for login</a>
                    </div>
                </form>
            </div>
            <!-- <div class="col-lg-3">
            </div> -->
        </div>
    </div>
</section>
<!-- ================ user registration section end ================= -->

@endsection