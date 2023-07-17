<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <div class="container col-md-6 my-5 ">
    @if(session('sucess'))  
     <div class="alert alert-success">
     {{session('sucess')}}
     </div>
     @endif
          <h1 class="text-bg-primary">EMPLOYEE CRUD USING  Query Builder </h1>
        <form action="{{url('/updateprofile/'.$data->id)}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" id="" value="{{$data->name}}" placeholder="enter your name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" value="{{$data->email}}" placeholder="enter your email" class="form-control">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <textarea name="address" id="" cols="30" rows="5" class="form-control">{{$data->address}}</textarea>
            </div>
            <div class="form-group">
                <label>User name:</label>
                <input type="text" name="unm" class="form-control" value="{{$data->unm}}" placeholder="enter your username">
            </div>
            <div class="form-control">
                <label>Gender:</label>
                <input type="radio" name="gen" value="male"@if($data->gen == "male") {{ "checked=checked"}} @endif>Male
                <input type="radio" name="gen" value="female"@if($data->gen == "female") {{ "checked=checked"}} @endif>Female
            </div>
            <div class="form-group">
              <label>file:</label>
              <img src="{{url('upload/employee/'.$data->file)}}" width="100px" height="100px">
              <input type="file" name="file"  class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary my-3">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>