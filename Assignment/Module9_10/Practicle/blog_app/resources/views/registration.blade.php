<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/view_blogs')}}" class="btn btn-primary"><i class="fa fa-table"></i> View Blogs</a>
                @if(session()->get('userid'))
                    <a href="{{url('/logout')}}" class="btn btn-warning">Logout</a>
                @else
                    <a href="{{url('/login')}}" class="btn btn-warning">Login</a>
                @endif
            </div>
        </div>
        @if (session('register_error'))
        <span class="alert alert-danger">
            {{session('register_error')}}
        </span>
        @endif

        <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container col-md-6">
                <h3 class="text-center">Registration</span></h3>

                <div class="custom-file-upload">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter name">
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="username" class="form-label">User Name:</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}" placeholder="Enter username">
                    @error('username')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone')}}" placeholder="Enter phone">
                    @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter email">
                    @error('email')
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
                <div class="custom-file-upload">
                    <label for="cpassword" class="form-label">Confirm Password:</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Enter confirm password">
                    @error('cpassword')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="gender" class="form-label">Gender:</label>
                    <div class="form-control">
                        <input type="radio" name="gender" value="male" id="gender" @if (old('gender') == 'male') checked @endif>Male
                        <input type="radio" name="gender" value="female" id="gender" @if (old('gender') == 'female') checked @endif>Female
                    </div>
                    @error('gender')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="language" class="form-label">Language:</label>
                    <div class="form-control">
                        <input type="checkbox" name="language[]" value="English" id="language">English
                        <input type="checkbox" name="language[]" value="Hindi" id="language">Hindi
                        <input type="checkbox" name="language[]" value="Gujarati" id="language">Gujarati
                    </div>
                </div>
                <div class="custom-file-upload">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter address">{{old('address')}}</textarea>
                    @error('address')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="sign_up" class="btn btn-primary">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>