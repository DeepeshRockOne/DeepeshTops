<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/')}}" class="btn btn-primary">Employees</a>
            </div>
        </div>
        <h3 class="text-center">Departments With Paginaiton</span></h3>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                        @foreach ($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->name}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="2" class="text-center">There is no records, please run php artisan db:seed</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <span >{{$data->links()}}</span>
            </div>
        </div>
    </div>
</body>
</html>