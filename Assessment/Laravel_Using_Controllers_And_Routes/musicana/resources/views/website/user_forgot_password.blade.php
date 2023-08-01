@extends('website.layout.main')

@push('title')
    <title>Forgot Password</title>
@endpush
@section('midsection')

<!-- bradcam_area  -->
<div class="bradcam_area breadcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Forgot Password</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ user forgot password section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Forgot Password</h2>
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
                <form class="form-contact contact_form" action="{{url('/user_forgot_password')}}" method="post" id="userLoginForm" novalidate="novalidate">
                    @csrf
                    <div class="row">   
                        <div class="col-12">
                            <div class="form-group">
                                <label>Registered Email</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter registered email">
                                @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-userLoginForm btn_4 boxed-btn">Submit</button>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <a href="{{url('/user_login')}}">Back to Login</a>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
            <!-- <div class="col-lg-3">
            </div> -->
        </div>
    </div>
</section>
<!-- ================ user forgot password section end ================= -->

@endsection