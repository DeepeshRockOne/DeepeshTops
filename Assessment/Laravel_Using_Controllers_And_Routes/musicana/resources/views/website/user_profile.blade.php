@extends('website.layout.main')

@push('title')
    <title>User Profile</title>
@endpush
@section('midsection')

<!-- bradcam_area  -->
<div class="bradcam_area breadcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Your Profile</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<!-- ================ user profile section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Your Profile</h2>
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
            <div class="row">   
                <div class="col-12 text-center">
                    <div class="form-group">
                        <img src="{{url('website/upload/images/user/'.$data->image)}}" alt="$data->image" class="rounded-circle" width="130px" />
                    </div>
                </div>
                @if ($data->count() > 0)
                    <div class="col-12 text-center">
                        <div class="form-group">
                            <h3>Hello, {{$data->name}}</h3>
                        </div>
                    </div>
                @endif
            </div>
            <div class="form-group mt-3 text-center">
                <a href="{{url('/user_profile/'.$data->id)}}" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></a>
            </div>
            </div>
            <div class="col-lg-2"></div>
            <!-- <div class="col-lg-3">
            </div> -->
        </div>
    </div>
</section>
<!-- ================ user profile section end ================= -->

@endsection