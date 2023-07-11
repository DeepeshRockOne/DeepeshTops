<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/')}}" class="btn btn-primary">Register Student</a>
            </div>
        </div>
        <h3 class="text-center">Student Records</span></h3>
        <br>
        @if (session('student_register_success'))
        <span class="alert alert-success">
            {{session('student_register_success')}}
        </span>
        @endif
        @if (session('record_deleted_success'))
        <span class="alert alert-success">
            {{session('record_deleted_success')}}
        </span>
        @endif
        @if (session('record_update_success'))
        <span class="alert alert-success">
            {{session('record_update_success')}}
        </span>
        @endif
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Roll Number</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Course</th>
                            <th>Address</th>
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
                            <td>{{$d->roll_number}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->phone}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->gender}}</td>
                            <td>{{$d->course_name}}</td>
                            <td width="180px">{{$d->address}}</td>
                            <td>
                                <a href="{{url('/view_records/'.$d->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('/delete_records/'.$d->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10" class="text-center">There is no records available.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>