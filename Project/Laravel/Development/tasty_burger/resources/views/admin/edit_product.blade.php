@extends('admin.layout.main')

@push('title')
    <title>Edit Product</title>
@endpush
@section('midsection')
<!--  page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
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
                            <form action="{{url('/update_product/'.$data->id)}}" method="post" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input name="name" class="form-control" value="{{$data->name}}" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input name="price" class="form-control" value="{{$data->price}}" placeholder="Enter Product Price">
                                </div>
                                <div class="form-group">
                                    <label>Product Discription</label>
                                    <textarea name="description" class="form-control" rows="3">{{$data->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Product Image</label>
                                    <input type="file" name="image">
                                    <img src="{{url('admin/upload/products/'.$data->image)}}" width="100px" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select name="category_id" class="form-control">
                                        <option value="#">---Select Category---</option>
                                        @if (!empty($categories))
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if ($data->cate_id == $category->id) {{" selected"}} @endif>{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{url('/manage_product')}}" class="btn btn-primary">Back</a>
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