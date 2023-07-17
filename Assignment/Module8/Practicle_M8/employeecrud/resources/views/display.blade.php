<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>
  <div class="container col-md-12 my-5 ">
    <div class="row">
      <div class="col-md-12 text-right">
          <a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Employee Regisration</a>
      </div>
    </div>
    <br>
    <table class="table" border="2">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">file</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Unm</th>
          <th scope="col">Address</th>
          <th scope="col">Gender</th>
        </tr>
      </thead>
      <tbody>
        @if(count($data) > 0)
          @foreach($data as $d)
          <tr>
            <td>{{$d->id}}</td>
            <td><img src="{{url('upload/employee/'.$d->file)}}" width="100px" height="100px"></td>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->unm}}</td>
            <td>{{$d->address}}</td>
            <td>{{$d->gen}}</td>
            <td>
              <a href="{{url('/editprofile/'.$d->id)}}" class="btn btn-primary">EDIT</a>
              <a href="{{url('/display/'.$d->id)}}" class="btn btn-danger">delete</a>
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="8" class="text-center">No employees register. please add.</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>

</html>