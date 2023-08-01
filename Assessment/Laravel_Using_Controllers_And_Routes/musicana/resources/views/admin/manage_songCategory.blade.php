@extends('admin.layout.main')

@push('title')
    <title>Manage Song Category</title>
@endpush
@section('midsection')

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage Song Category</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Song Category</li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Song Category</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card">                              
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Manage Song Category</h6>
                                        </div>
                                        <div class="col-md-3 py-3 text-right">
                                            <a href="{{url('/add_songCategory')}}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus-circle"></i>
                                                </span>
                                                <span class="text">Add Song Category</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                @if (session('success'))
                                    <div class="my-3 text-center">
                                        <span class="alert alert-success">
                                            {{session('success')}}
                                        </span>
                                    </div>
                                @endif
                                @if (session('fail'))
                                    <div class="my-3 text-center">
                                        <span class="alert alert-danger">
                                            {{session('fail')}}
                                        </span>
                                    </div>
                                @endif

                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data->count() > 0)
                                                @foreach($data as $d)
                                                    <tr>
                                                        <td>{{$d->id}}</td>
                                                        <td>
                                                            <img src="{{url('admin/upload/song_category_images/'.$d->category_image)}}" alt="{{$d->category_image}}" width="80px">
                                                        </td>
                                                        <td>{{$d->category_name}}</td>
                                                        <td>
                                                            <a href="{{url('/manage_songCategory/'.$d->id)}}" class="btn btn-primary p-2"><i class="fas fa-edit"> Edit</i></a>
                                                            <a href="{{url('/delete_songCategory/'.$d->id)}}" class="btn btn-danger p-2" onclick="return confirm('Are you sure want to delete this record?');"><i class="fas fa-trash"> Delete</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center">There is no records, please add Song Category.</td>
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