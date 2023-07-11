<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/view_blogs')}}" class="btn btn-primary"><i class="fa fa-table"></i> View Blogs</a>
            </div>
        </div>
        <div class="loggedin">
            @if(session()->has('userid'))
                <span>Welcome {{session('uname')}}</span>
            @endif
        </div>

        <form action="{{url('/update_blog/'.$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container col-md-6">
                <h3 class="text-center">Update Blog</span></h3>

                <div class="custom-file-upload">
                    <label for="blogTitle" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" id="blogTitle" value="{{$data->title}}" placeholder="Enter blog title" value="{{old('title')}}">
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="blogContent" class="form-label">Content:</label>
                    <textarea class="form-control" name="content" id="blogContent" rows="3" placeholder="Enter blog content">{{$data->content}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="blogImage" class="form-label">Blog Image:</label>
                    @if($data->image)
                        <img src="{{url('images/upload/'.$data->image)}}" alt="{{$data->image}}" width="100px">
                    @endif
                    <input type="file" name="image" class="form-control" id="blogImage">
                    @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-primary">Update Blog</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>