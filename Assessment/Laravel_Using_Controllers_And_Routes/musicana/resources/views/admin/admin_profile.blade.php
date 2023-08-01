@extends('admin.layout.main')

@push('title')
    <title>Admin Profile</title>
@endpush
@section('midsection')

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card">                              
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
                                        </div>
                                        <div class="col-md-3 py-3 text-right">
                                            <a href="{{url('/admin_dashboard')}}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="text">Admin Dashboard</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-body text-center">
                                    <div class="imgcontainer">
                                        <img src="{{url('admin/img/boy.png')}}" alt="Avatar" class="rounded-circle" width="150px" />
                                    </div>
                                    @if ($data->count() > 0)
                                        <div>
                                            <p>Admin Id: {{$data->admin_id}}</p>
                                            <p>Admin Name: {{$data->admin_uname}}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection