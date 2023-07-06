@extends('admin.layout.main')

@push('title')
    <title>Add Category</title>
@endpush
@section('midsection')
<!--  page-wrapper -->
<div id="page-wrapper">
    <div class="row">
            <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Add Category</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="pull-right">
        <a href="{{url('/manage_category')}}" class="btn btn-primary"><i class="fa fa-table"> Manage category</i></a>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{url('/insert_category')}}" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input name="name" class="form-control" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" name="image">
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
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