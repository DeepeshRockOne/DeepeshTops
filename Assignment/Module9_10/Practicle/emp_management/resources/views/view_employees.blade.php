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
                <a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Employee Regisration</a>
            </div>
        </div>
        <h3 class="text-center">View Employees</span></h3>
        <br>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                        @foreach ($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>
                                <img src="{{url('images/employee/'.$d->image)}}" width="70px" alt="">
                            </td>
                            <td>{{$d->username}}</td>
                            <td>{{$d->phone}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->gender}}</td>
                            <td>{{$d->address}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">There is no Employees registered. Please add.</td>
                        </tr>
                        @endif  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>