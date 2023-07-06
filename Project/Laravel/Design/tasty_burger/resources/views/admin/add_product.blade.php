@extends('admin.layout.main')

@push('title')
    <title>Add Product</title>
@endpush
@section('midsection')
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Add Product</h1>
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
                                    <form action="" method="post" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input name="name" class="form-control" placeholder="Enter Product Name">
                                            <!--<p class="help-block">Example block-level help text here.</p>-->
                                        </div>
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input name="price" class="form-control" placeholder="Enter Product Price">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Discription</label>
                                            <textarea name="description" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" name="image">
                                        </div>
                                        <div class="form-group">
                                            <label>Categories</label>
                                            <select name="category_id" class="form-control">
                                                <option value="#">---Select Category---</option>
                                                @if (!empty($categories))
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">Add</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
@endsection