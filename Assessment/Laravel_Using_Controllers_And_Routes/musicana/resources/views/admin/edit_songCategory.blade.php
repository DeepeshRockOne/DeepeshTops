@extends('admin.layout.main')

@push('title')
    <title>Edit Song Category</title>
@endpush
@section('midsection')

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Song Category</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Song Category</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Song Category</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Edit Song Category</h6>
                                        </div>
                                        <div class="col-md-3 py-3 text-right"></div>
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
                                <div class="card-body">
                                    <form action="{{url('/manage_songCategory/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="songCategoryName">Song Category Name:</label>
                                            <input type="text" name="category_name" class="form-control" id="songCategoryName" value="{{$data->category_name}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="songCategoryImage">Song Category Image:</label>
                                            <img src="{{url('admin/upload/song_category_images/'.$data->category_image)}}" alt="{{$data->category_image}}" width="100px" />

                                            <input type="file" name="category_image" class="form-control">
                                            @error('category_image')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <a href="{{url('/manage_songCategory')}}" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Cancel</span>
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </button>
                                    </form>
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