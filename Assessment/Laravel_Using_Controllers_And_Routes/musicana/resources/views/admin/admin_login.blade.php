<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{url('admin/img/logo/logo.png')}}" rel="icon">
    <title>Admin Login</title>
    <link href="{{url('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('admin/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        @if (session('fail'))
                                            <div class="my-3 text-center">
                                                <span class="alert alert-danger">
                                                    {{session('fail')}}
                                                </span>
                                            </div>
                                        @endif
                                        @if (session('success'))
                                            <div class="my-3 text-center">
                                                <span class="alert alert-success">
                                                    {{session('success')}}
                                                </span>
                                            </div>
                                        @endif
                                        <h1 class="h4 text-gray-900 mb-4"><u>Admin Login</u></h1>
                                    </div>
                                    <form action="{{url('/admin_auth')}}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <label for="admin_uname">Usernanme:</label>
                                            <input type="text" name="admin_uname" class="form-control" id="admin_uname" aria-describedby="emailHelp" value="{{old('admin_uname')}}" placeholder="Enter username">
                                            @error('admin_uname')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="admin_password">Password:</label>
                                            <input type="password" name="admin_password" class="form-control" id="admin_password" placeholder="Enter password">
                                            @error('admin_password')
                                                <div class="my-3">
                                                    <span class="alert alert-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <a href="{{url('/index')}}" class="btn btn-primary btn-block">Login</a>
                                        </div>
                                        <hr>
                                        <a href="{{url('/index')}}" class="btn btn-google btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="{{url('/index')}}" class="btn btn-facebook btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Login</span>
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{url('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{url('admin/js/ruang-admin.min.js')}}"></script>
</body>

</html>