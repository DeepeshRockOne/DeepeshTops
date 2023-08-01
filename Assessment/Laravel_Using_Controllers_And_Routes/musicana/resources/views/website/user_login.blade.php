@extends('website.layout.main')

@push('title')
<title>Login</title>
@endpush
@section('midsection')

<!-- bradcam_area  -->
<div class="bradcam_area breadcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Login</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ user login section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Login</h2>
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
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" action="{{url('/user_login')}}" method="post" id="userLoginForm" novalidate="novalidate">
                    @csrf
                    <div class="row">   
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
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                                @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-userLoginForm btn_4 boxed-btn">Login</button>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{url('/user_registration')}}">Click here, Sign up for new account</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{url('/user_forgot_password')}}">Forgot password</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
            <!-- <div class="col-lg-3">
            </div> -->
        </div>
    </div>
</section>
<!-- ================ user login section end ================= -->

@endsection