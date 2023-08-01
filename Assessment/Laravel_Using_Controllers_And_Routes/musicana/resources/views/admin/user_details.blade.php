@extends('admin.layout.main')

@push('title')
    <title>User Details</title>
@endpush
@section('midsection')
<style>
    .card .table td, .card .table th {
        padding-left: 0.5rem;
    }
</style>

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Details</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active" aria-current="page">User Details</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card">                              
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                                        </div>
                                        <div class="col-md-3 py-3 text-right"></div>
                                    </div>
                                </div>

                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Language</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data->count() > 0)
                                                @foreach($data as $d)
                                                    <td>{{$d->id}}</td>
                                                    <td>
                                                        <img src="{{url('website/upload/images/user/'.$d->image)}}" alt="{{$d->image}}" width="80px">
                                                    </td>
                                                    <td>{{$d->name}}</td>
                                                    <td>{{$d->username}}</td>
                                                    <td>{{$d->email}}</td>
                                                    <td>{{$d->gender}}</td>
                                                    <td>{{$d->language}}</td>
                                                    <td>{{$d->status}}</td>
                                                    <td>
                                                        <a href="{{url('/update_user_status/'.$d->id)}}" class="btn btn-warning p-2">
                                                            @if ($d->status == "Block")
                                                                <i class="fas fa-exclamation-triangle"> Unblock</i>
                                                            @else
                                                                <i class="fas fa-exclamation-triangle"> Block</i>
                                                            @endif
                                                        </a>
                                                        <a href="{{url('/delete_user/'.$d->id)}}" class="btn btn-danger p-2" onclick="return confirm('Are you sure want to delete this record?');"><i class="fas fa-trash"> Delete</i></a>
                                                    </td>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9" class="text-center">There is no user records.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
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