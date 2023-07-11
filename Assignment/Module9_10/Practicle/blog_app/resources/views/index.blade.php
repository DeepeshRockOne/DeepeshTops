<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Application</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/view_blogs')}}" class="btn btn-primary"><i class="fa fa-table"></i> View Blogs</a>
                @if(session()->has('userid'))
                    <a href="{{url('/logout')}}" class="btn btn-warning">Logout</a>
                @else
                    <a href="{{url('/registration')}}" class="btn btn-primary">Sign Up</a>
                    <a href="{{url('/login')}}" class="btn btn-warning">Login</a>
                @endif
            </div>
        </div>
        <div class="loggedin">
            @if(session()->has('userid'))
                <span>Welcome {{session('uname')}}</span>
            @endif
        </div>
        @if (session('blog_added_success'))
        <span class="alert alert-success text-center">
            {{session('blog_added_success')}}
        </span>
        @endif
        @if (session('logout_success'))
        <span class="alert alert-success text-center">
            {{session('logout_success')}}
        </span>
        @endif

        <form action="{{url('/add_blog')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container col-md-6">
                <h3 class="text-center">Blog Application</span></h3>

                <div class="custom-file-upload">
                    <label for="blogTitle" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" id="blogTitle" value="{{old('title')}}" placeholder="Enter blog title">
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="blogContent" class="form-label">Content:</label>
                    <textarea class="form-control" name="content" id="blogContent" rows="3" placeholder="Enter blog content">{{old('content')}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="blogImage" class="form-label">Blog Image:</label>
                    <input type="file" name="image" class="form-control" id="blogImage">
                    @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="add" class="btn btn-primary">Add New Blog</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>