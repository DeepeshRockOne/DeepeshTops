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
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{url('/display')}}" class="btn btn-primary">View Employees</a>
            </div>
        </div>
        <br>
        <h2>Employee Crud Using Query Builder</h2>
        <form action="{{url('/index')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" id="" placeholder="enter your name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" placeholder="enter your email" class="form-control">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <textarea name="address" id="" cols="30" rows="3" class="form-control" placeholder="enter address"></textarea>
            </div>
            <div class="form-group">
                <label>User name:</label>
                <input type="text" name="unm" class="form-control" placeholder="enter your username">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="pass" class="form-control" placeholder="enter your password">
            </div>
            <label>Gender:</label>
            <div class="form-control">
                <input type="radio" name="gen" value="male">Male
                <input type="radio" name="gen" value="female">Female
            </div>
            <div class="form-group">
              <label>File:</label>
              <input type="file" name="file" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="submit" class="btn btn-primary my-3">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>