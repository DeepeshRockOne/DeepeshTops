<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <a href="{{url('/registration')}}" class="btn btn-warning">Sign Up</a>
                @endif
            </div>
        </div>
        @if (session('register_success'))
        <span class="alert alert-success">
            {{session('register_success')}}
        </span>
        @endif
        @if (session('login_fail'))
        <span class="alert alert-danger">
            {{session('login_fail')}}
        </span>
        @endif

        <form action="{{url('/login_auth')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container col-md-6">
                <h3 class="text-center">Login</span></h3>

                <div class="custom-file-upload">
                    <label for="username" class="form-label">User Name:</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}" placeholder="Enter username">
                    @error('username')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>