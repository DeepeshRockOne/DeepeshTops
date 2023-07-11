<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/view_employees')}}" class="btn btn-primary"><i class="fa fa-table"></i> View Employees</a>
            </div>
        </div>
        @if (session('register_success'))
        <span class="alert alert-success">
            {{session('register_success')}}
        </span>
        @endif
        @if (session('register_error'))
        <span class="alert alert-danger">
            {{session('register_error')}}
        </span>
        @endif

        <form action="{{url('/register_employee')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container col-md-6">
                <h3 class="text-center">Employee Registration</span></h3>

                <div class="custom-file-upload">
                    <label for="employeeName" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="employeeName" value="{{old('name')}}" placeholder="Enter name">
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="employeeUsername" class="form-label">User Name:</label>
                    <input type="text" name="username" class="form-control" id="employeeUsername" value="{{old('username')}}" placeholder="Enter username">
                    @error('username')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="employeePhone" class="form-label">Phone:</label>
                    <input type="text" name="phone" class="form-control" id="employeePhone" value="{{old('phone')}}" placeholder="Enter phone">
                    @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="employeeEmail" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="employeeEmail" value="{{old('email')}}" placeholder="Enter email">
                    @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="employeePassword" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="employeePassword" placeholder="Enter password">
                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="employeeCpassword" class="form-label">Confirm Password:</label>
                    <input type="password" name="cpassword" class="form-control" id="employeeCpassword" placeholder="Enter confirm password">
                    @error('cpassword')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="employeeGender" class="form-label">Gender:</label>
                    <div class="form-control">
                        <input type="radio" name="gender" value="male" id="employeeGender" @if (old('gender') == 'male') checked @endif>Male
                        <input type="radio" name="gender" value="female" id="employeeGender" @if (old('gender') == 'female') checked @endif>Female
                    </div>
                    @error('gender')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="employeeImage" class="form-label">Image:</label>
                    <input type="file" name="image" class="form-control" id="employeeImage">
                    @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="employeeAddress" class="form-label">Address:</label>
                    <textarea class="form-control" name="address" id="employeeAddress" rows="3" placeholder="Enter address">{{old('address')}}</textarea>
                    @error('address')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>