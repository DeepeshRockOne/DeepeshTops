@extends('layout.main')
@section('main_section')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{url('/')}}" class="btn btn-primary">Upload New Image</a>
        </div>
    </div>
    @if (count($images) <= 0)
        <h3 class="text-center">There is no images in gallery, please upload</h3>
    @else
        <h3 class="text-center">Image Gallery</span></h3>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($images as $image)
                <div class="card" style="width:20rem; margin:20px 0 24px 25px">
                    <img class="card-img-top" src="{{url('upload/gallery/'.$image->img)}}" alt="{{$image->file}}" style="width:100%">
                    @if($image->img_description)
                        <div class="card-body">
                            <p class="card-text">{{$image->img_description}}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
</body>

</html>
@endsection