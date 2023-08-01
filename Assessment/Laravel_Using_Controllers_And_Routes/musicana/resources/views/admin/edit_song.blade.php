@extends('admin.layout.main')

@push('title')
    <title>Edit Song</title>
@endpush
@section('midsection')

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Song</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Songs</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Song</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Edit Song</h6>
                                        </div>
                                        <div class="col-md-3 py-3 text-right">
                                            <a href="{{url('/manage_song')}}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-table"></i>
                                                </span>
                                                <span class="text">Manage Song</span>
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

                                <div class="card-body">
                                    <form action="{{url('/manage_song/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="songName">Song Name:</label>
                                            <input type="text" name="name" class="form-control" id="songName" value="{{$data->name}}" placeholder="Enter song name">
                                            @error('name')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="songImage">Song Image:</label>
                                            <img src="{{url('admin/upload/song_images/'.$data->image)}}" alt="{{$data->image}}" width="100px" />
                                            <input type="file" name="image" class="form-control" id="songImage">
                                            @error('image')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="song">Song:</label>
                                            <audio controls>
                                                <source src="{{url('admin/upload/songs/'.$data->song)}}" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                            <input type="file" name="song" class="form-control" id="song">
                                            @error('song')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="song_category">Song Category:</label>
                                            <select class="select2-single-placeholder form-control" name="song_category" id="song_category">
                                                <option value="">---Select---</option>
                                                @if (!empty($songCategories))
                                                    @foreach($songCategories as $songCategory)
                                                        <option value="{{$songCategory->id}}" @if ($data->scat_id == $songCategory->id) selected @endif>{{$songCategory->category_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('song_category')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <a href="{{url('/manage_song')}}" class="btn btn-warning btn-icon-split">
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