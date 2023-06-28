@extends('layout.main')
@section('main_section')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{url('/img_gallery')}}" class="btn btn-primary">View Image Gallery</a>
        </div>
    </div>
    @if (session('img_upload_success'))
    <span class="alert alert-success text-center">
        {{session('img_upload_success')}}
    </span>
    @endif

    <form action="{{url('/img_upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container col-md-6">
            <h3 class="text-center">Image Upload</span></h3>

            <div class="custom-file-upload">
                <label for="formFile" class="form-label">Please select image</label>
                <input class="form-control" type="file" name="file" id="formFile" required>
                @error('file')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <label for="image_description" class="form-label">Image Description</label>
                <textarea class="form-control" name="image_description" id="image_description" rows="3" placeholder="Image description"></textarea>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" name="upload" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </form>
</div>
</body>

</html>
@endsection