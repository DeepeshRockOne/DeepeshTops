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
                <a href="{{url('/view_records')}}" class="btn btn-primary">View Records</a>
            </div>
        </div>
        @if (session('student_register_success'))
        <span class="alert alert-success text-center">
            {{session('student_register_success')}}
        </span>
        @endif

        <form action="{{url('/update_record/'.$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container col-md-6">
                <h3 class="text-center">Student Registration</span></h3>

                <div class="custom-file-upload">
                    <label for="studentName" class="form-label">Name:</label>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control" id="studentName" placeholder="Enter Name">
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="studentPhone" class="form-label">Phone:</label>
                    <input type="text" name="phone" value="{{$data->phone}}" class="form-control" id="studentPhone" placeholder="Enter Phone Number">
                    @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="studentEmail" class="form-label">Email:</label>
                    <input type="email" name="email" value="{{$data->email}}" class="form-control" id="studentEmail" placeholder="Enter Email">
                    @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label for="studentGender" class="form-label">Gender:</label>
                    <div class="form-control">
                        <input type="radio" name="gender" value="male" id="studentGender" @if ($data->gender == 'male') checked @endif>Male
                        <input type="radio" name="gender" value="female" id="studentGender" @if ($data->gender == 'female') checked @endif>Female
                    </div>
                    @error('gender')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="custom-file-upload">
                    <label class="mb-2">Course</label>
                    <select name="course" class="form-control">
                        <option value="">---Select Course---</option>
                        @if(!empty($courses))
                        @foreach($courses as $course)
                            <option value="{{$course->id}}" @if ($data->course_id == $course->id) selected @endif>{{$course->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('course')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
				</div>
                <div class="custom-file-upload">
                    <label for="studentImage" class="form-label">Student Image:</label>
                    <img src="{{url('images/upload/'.$data->image)}}" width="70px" alt="$data->image">
                    <input type="file" name="image" class="form-control" id="studentImage">
                    @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="studentAddress" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="studentAddress" rows="3" placeholder="Address">{{$data->address}}</textarea>
                    @error('address')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>