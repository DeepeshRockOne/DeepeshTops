<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blogs</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Blog</a>
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
        <h3 class="text-center">View Blogs</span></h3>
        <br>
        @if (session('loging_success'))
        <span class="alert alert-success">
            {{session('loging_success')}}
        </span>
        @endif
        @if (session('blog_added_success'))
        <span class="alert alert-success">
            {{session('blog_added_success')}}
        </span>
        @endif
        @if (session('blog_deleted_success'))
        <span class="alert alert-success">
            {{session('blog_deleted_success')}}
        </span>
        @endif
        @if (session('blog_update_success'))
        <span class="alert alert-success">
            {{session('blog_update_success')}}
        </span>
        @endif
        @if (session('no_such_blog'))
        <span class="alert alert-danger">
            {{session('no_such_blog')}}
        </span>
        @endif
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th width="500px">Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                        @foreach ($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>
                                <img src="{{url('images/upload/'.$d->image)}}" width="70px" alt="">
                            </td>
                            <td>{{$d->title}}</td>
                            <td width="500px">{{$d->content}}</td>
                            <td>
                                <a href="{{url('/edit_blog/'.$d->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('/delete_blog/'.$d->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">There is no blogs available. Please add.</td>
                        </tr>
                        @endif  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>