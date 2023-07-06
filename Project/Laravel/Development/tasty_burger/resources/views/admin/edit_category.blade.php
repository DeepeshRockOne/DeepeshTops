@extends('admin.layout.main')

@push('title')
    <title>Edit Category</title>
@endpush
@section('midsection')
<!--  page-wrapper -->
<div id="page-wrapper">
    <div class="row">
            <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit Category</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{url('/update_category/'.$data->id)}}" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input name="name" class="form-control" value="{{$data->name}}" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" name="image">
                                    <img src="{{url('admin/upload/categories/'.$data->image)}}" width="100px" alt="">
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{url('/manage_category')}}" class="btn btn-primary">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page-wrapper -->

</div>
<!-- end wrapper -->
@endsection